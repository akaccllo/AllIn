<?php
namespace App\Services;

use App\Models\Api;
use App\Services\CurlService;
class YcService{
    protected $url;
    protected $merchant_code;
    protected $desKey;
    protected $signKey;
    protected $platformCode;
    protected $encode_url;
    protected $password;
    protected $pc_uri;
    protected $wap_uri;
    protected $api_uri;

    public function __construct()
    {
        $mod = Api::where('api_name', 'YC')->first();
        $this->pre = $mod->prefix;// 玩家前缀
        $this->domain = $mod->api_domain;
        $this->desKey = $mod->api_id;
        $this->aa = $mod->api_key;
        $this->encode_url= $mod->api_username;
        $this->pc_uri = "http://ycpc.gebbs.net";
        $this->wap_uri = "http://app.gebbs.net";
        $this->api_uri = "http://ycapi01.gebbs.net";
    }


    public function login($username,$password,$playdirectory = 'Credit'){
        $t = time();
        $str = "UserAccount=$username|Pwd=$password|t=$t";

        $data = [
            'str' => $str,
            'key' => $this->desKey,
            'yc' => 1
        ];

        $des_param = $this->send_post($this->encode_url, $data);

        $q_param = "param=$des_param&aa=".$this->aa."&sign=".strtoupper(md5($this->aa.$this->desKey.$t))."&playdirectory=".$playdirectory;

        if (is_Mobile()){
            $q_param = "param=$des_param&aa=".$this->aa."&sign=".strtoupper(md5($this->aa.$this->desKey.$t))."&playdirectory=".$playdirectory."&t=".$t;
            $q_url = $this->wap_uri."/Home/CashXian?".$q_param;
        } else {
            $q_url = $this->pc_uri."/Business/CashXian?".$q_param;
        }

        return $q_url;
    }

    //查询余额
    public function balances($username, $password)
    {
        $t=time();
        $s = 'ActionType=balance|UserAccount='.$username.'|Pwd='.$password.'|t='.$t;

        $data = [
            'str' => $s,
            'key' => $this->desKey,
            'yc' => 1
        ];
        $des_param = $this->send_post($this->encode_url, $data);

        $q_param = "param=$des_param&aa=".$this->aa."&sign=".strtoupper(md5($this->aa.$this->desKey.$t));

        $url = $this->api_uri."/Boing.svc/BoingAPI?".$q_param;

        $res=$this->https_request($url);

        return $res;
    }

    public function transfer($username, $password, $amount, $orderno, $type= 'plus')
    {
        $t=time();
        $s = 'ActionType='.$type.'|UserAccount='.$username.'|Pwd='.$password.'|VirtualMoney='.$amount.'|OrderID='.$orderno.'|t='.$t;

        $data = [
            'str' => $s,
            'key' => $this->desKey,
            'yc' => 1
        ];
        $des_param = $this->send_post($this->encode_url, $data);

        $q_param = "param=$des_param&aa=".$this->aa."&sign=".strtoupper(md5($this->aa.$this->desKey.$t));

        $url = $this->api_uri."/Boing.svc/BoingAPI?".$q_param;

        $res=$this->https_request($url);

        return $res;
    }

    //下注记录
    public function GetMerchantReport($StartTime, $EndTime,$PageIndex, $PageSize, $type = 'bethistory')
    {
        $t=time();
        $Str = "ActionType=" . $type . "|SelectAll=1|PageIndex=".$PageIndex."|PageCount=".$PageSize."|StartTime=" . $StartTime . "|EndTime=" . $EndTime . "|t=" . $t;

        $data = [
            'str' => $Str,
            'key' => $this->desKey,
            'yc' => 1
        ];
        $des_param = $this->send_post($this->encode_url, $data);

        $q_param = "param=$des_param&aa=".$this->aa."&sign=".strtoupper(md5($this->aa.$this->desKey.$t));

        $url = $this->api_uri."/Boing.svc/BoingAPI?".$q_param;

        $res=$this->https_request($url);

        return $res;
    }

//    public function GetMerchantReport($StartTime, $EndTime,$PageIndex, $PageSize, $type = 'bethistory')
//    {
//        $t=time();
//        $Str = "ActionType=" . $type . "|PageIndex=".$PageIndex."|PageCount=".$PageSize."|StartTime=" . $StartTime . "|EndTime=" . $EndTime . "|t=" . $t;
//
//        $data = [
//            'str' => $Str,
//            'key' => $this->desKey,
//            'yc' => 1
//        ];
//        $des_param = $this->send_post($this->encode_url, $data);
//
//        $q_param = "param=$des_param&aa=".$this->aa."&sign=".strtoupper(md5($this->aa.$this->desKey.$t));
//
//        $url = $this->api_uri."/Boing.svc/BoingAPI?".$q_param;
//
//        $res=$this->https_request($url);
//
//        return $res;
//    }




    protected function send_post($url,$post_data) {
        $result = (new CurlService())->post($url, $post_data);

        return $result;
    }

    public function https_request($url,$data = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

        if (!empty($data))
        {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($curl);

        curl_close($curl);
        //$output=json_decode($output,true);
        return $output;
    }
}