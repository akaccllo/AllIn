<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Web\WebBaseController;
use App\Models\Api;
use App\Models\GameRecord;
use App\Models\Member;
use App\Models\MemberAPi;
use App\Models\Transfer;
use App\Services\BiService;
use App\Services\TcgService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class TcgController extends WebBaseController
{
    protected $service,$api,$p_type;
    public function __construct()
    {
        $this->service = new TcgService();
        $this->api = Api::where('api_name', 'TCG')->first();
        $this->p_type = config('platform.tcg_product_type');
    }

    public function register($platformCode, $username)
    {
        $res = $this->service->register($platformCode , $username);
    }

    public function balance($platformCode, $username, $password)
    {
        //检查账号是否注册
        $member = Member::where('name', $username)->first();
        $api = Api::where('api_name', $platformCode)->first();
        $member_api = $member->apis()->where('api_id', $api->id)->first();

        $return = [
            'Code' => 0,
            'Message' => 'success',
            'url' => '',
            'Data' => '',
        ];

        if (!$member_api)
        {
            $res = json_decode($this->service->register($username, $password), TRUE);
            if ($res['status'] != 0)
            {
                $return['Code'] = $res['status'];
                $return['Message'] = '开通失败！错误代码 '.$res['status'].' 请联系客服';

                return $return;
            }

            //创建api账号
            $member_api = MemberAPi::create([
                'member_id' => $member->id,
                'api_id' => $api->id,
                'username' => $this->api->prefix.$member->name,
                'password' => $member->original_password
            ]);
        }

        $p_type = $this->p_type[$platformCode];
        $res = json_decode($this->service->balance($username,$p_type), TRUE);

        if ($res['status'] == 0)
        {
            $member_api->update([
                'money' => $res['balance']
            ]);
            $return['Data'] = $res['balance']> 0?$res['balance']:0;
        } else {
            $return['Data'] = 0;
        }

        return $return;
    }

    //存钱
    public function deposit($platformCode,$username,$password, $amount, $amount_type = 'money')
    {
        //检查账号是否注册
        $member = Member::where('name', $username)->first();
        $api = Api::where('api_name', $platformCode)->first();
        $member_api = $member->apis()->where('api_id', $api->id)->first();

        $return = [
            'Code' => 0,
            'Message' => 'success',
            'url' => '',
            'Data' => '',
        ];

        if (!$member_api)
        {
            $res = json_decode($this->service->register($username, $password), TRUE);
            if ($res['status'] != 0)
            {
                $return['Code'] = $res['status'];
                $return['Message'] = '开通失败！错误代码 '.$res['status'].' 请联系客服';

                return $return;
            }

            //创建api账号
            $member_api = MemberAPi::create([
                'member_id' => $member->id,
                'api_id' => $api->id,
                'username' => $this->api->prefix.$member->name,
                'password' => $member->original_password
            ]);
        }
        //判断余额
        if ($amount_type == 'money')
        {
            if ($member->money < $amount)
            {
                $return['Code'] = -1;
                $return['Message'] = '账户余额不足';
                return $return;
            }
        } else {
            if ($member->fs_money < $amount)
            {
                $return['Code'] = -1;
                $return['Message'] = '账户余额不足';
                return $return;
            }
        }

        //先扣除用户余额
        $member->decrement($amount_type , $amount);

        $bill_no = getBillNo();
        $p_type = $this->p_type[$platformCode];
        $result = $this->service->transfer($username,$p_type, 1,$amount,$bill_no);
        $res = json_decode($result, TRUE);


        if (is_array($res) && $res['status'] == 0)
        {
            try{
                DB::transaction(function() use($member_api, $res,$amount_type,$amount,$member,$result,$bill_no,$api) {
                    //平台账户
                    $member_api->increment('money', $amount);
                    //个人账户
                    //$member->decrement($amount_type , $amount);
                    //额度转换记录
                    Transfer::create([
                        'bill_no' => $bill_no,
                        'api_type' => $member_api->api_id,
                        'member_id' => $member->id,
                        'transfer_type' => 0,
                        'money' => $amount,
                        'transfer_in_account' => $member_api->api->api_name.'账户',
                        'transfer_out_account' => $amount_type == 'money'?'中心账户':'返水账户',
                        'result' => $result
                    ]);
                    //修改api账号余额
                    $api->decrement('api_money' , $amount);
                });
            }catch(\Exception $e){
                DB::rollback();
                //退回用户
                $member->increment($amount_type , $amount);
            }
        }else {
            //退回用户
            $member->increment($amount_type , $amount);
            $return['Code'] = $res['status'];
            $return['Message'] = '错误代码 '.$res['status'].' 请联系客服';
        }

        return $return;
    }

    public function withdrawal($platformCode,$username, $password,$amount, $amount_type = 'money')
    {
        //检查账号是否注册
        $member = $this->getMember();
        $api = Api::where('api_name', $platformCode)->first();
        $member_api = $member->apis()->where('api_id', $api->id)->first();

        $return = [
            'Code' => 0,
            'Message' => 'success',
            'url' => '',
            'Data' => '',
        ];

        if (!$member_api)
        {
            $res = json_decode($this->service->register($username, $password), TRUE);
            if ($res['status'] != 0)
            {
                $return['Code'] = $res['status'];
                $return['Message'] = '开通失败！错误代码 '.$res['status'].' 请联系客服';

                return $return;
            }

            //创建api账号
            $member_api = MemberAPi::create([
                'member_id' => $member->id,
                'api_id' => $api->id,
                'username' => $this->api->prefix.$member->name,
                'password' => $member->original_password
            ]);
        }

        if ($member_api->money < $amount)
        {
            $return['Code'] = -1;
            $return['Message'] = '余额不足';
            return $return;
        }

        $bill_no = getBillNo();
        $p_type = $this->p_type[$platformCode];
        $result = $this->service->transfer($username,$p_type, 2,$amount,$bill_no);
        $res = json_decode($result, TRUE);

        if (is_array($res) && $res['status'] == 0)
        {
            try{
                DB::transaction(function() use($member_api, $res,$amount_type,$amount,$member,$result,$bill_no,$api) {
                    //平台账户
                    $member_api->decrement('money' , $amount);
                    //个人账户
                    $member->increment($amount_type , $amount);
                    //额度转换记录
                    Transfer::create([
                        'bill_no' => $bill_no,
                        'api_type' => $member_api->api_id,
                        'member_id' => $member->id,
                        'transfer_type' => 1,
                        'money' => $amount,
                        'transfer_in_account' => $amount_type == 'money'?'中心账户':'返水账户',
                        'transfer_out_account' => $member_api->api->api_name.'账户',
                        'result' => $result
                    ]);
                    //修改api账号余额
                    $api->increment('api_money' , $amount);
                });
            }catch(\Exception $e){
                DB::rollback();
            }
        }else {
            $return['Code'] = $res['status'];
            $return['Message'] = '错误代码 '.$res['status'].' 请联系客服';
        }

        return $return;
    }

    public function login(Request $request)
    {
        //检查账号是否注册
        $member = $this->getMember();
        $username = $member->name;
        $platformCode = $request->get('pCode')?:'AG';

        //检查账号是否注册
        $api = Api::where('api_name', $platformCode)->first();
        $member_api = $member->apis()->where('api_id', $api->id)->first();

        if (!$member_api)
        {
            $res = json_decode($this->service->register($username, $member->original_password), TRUE);
            if ($res['status'] != 0)
            {
                $return['Code'] = $res['status'];
                $return['Message'] = '开通失败！错误代码 '.$res['status'].' 请联系客服';

                return $return;
            }

            //创建api账号
            $member_api = MemberAPi::create([
                'member_id' => $member->id,
                'api_id' => $api->id,
                'username' => $this->api->prefix.$member->name,
                'password' => $member->original_password
            ]);
        }


        $gametype = $request->get('gametype')?:null;
        $platform = $request->get('platform')?:'flash';
        $game_mode = $request->get('game_mode')?:1;
        $p_type = $this->p_type[$platformCode];
        $res = json_decode($this->service->login($username,$p_type,$gametype,$platform,$game_mode), TRUE);
            if (is_array($res) )
            {
                if ($res['status'] == 0)
                {
                    $u = $res['game_url'];
                    return redirect()->to($u);

                }
                echo $res['error_desc'];
            }
            echo '网络错误';exit;
    }

    public function credit($api_name)
    {

        $api = Api::where('api_name', $api_name)->first();

        $return = [
            'Code' => 0,
            'Message' => 'success',
            'url' => '',
            'Data' => '',
        ];

        $res = json_decode($this->service->BusinessBalance(), TRUE);

        //暂时只接YC接口
        if ($res['retCode'] == 0)
        {
            $api_name = $api_name == 'BBIN'?'BB':$api_name;
            $money = $res['retMsg'][0][$api_name];
            $api->update([
                'api_money' => $money
            ]);
            $return['Data'] = $money;
        } else {
            $return['Code'] = $res['retCode'];
            $return['Message'] = '查询商户余额失败！错误代码 '.$res['retCode'].' 请联系客服';
        }

        return $return;
    }

    public function getGameRecord($platformCode, $startTime, $endTime, $PageIndex, $limit, $time)
    {
        $platformCode = $platformCode == 'BBIN'?'BB':$platformCode;
        $res = $this->service->GetMerchantReport($platformCode, $startTime, $endTime, $PageIndex, $limit, $time);

        return json_decode($res, TRUE);
    }
}
