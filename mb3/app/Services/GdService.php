<?php
namespace App\Services;

use App\Models\Api;
use App\Services\CurlService;
class GdService{
    public $pre;   // 玩家前缀
    public  $domain;
    public  $comId;
    public $comKey;
    public $gamePlatform;
    public $debug;
    public $salt ;
    public $betLimitCode;
    public $currencyCode;
    public $isspeed;
    public $isdemo;

    public function __construct()
    {
        $mod = Api::where('api_name', 'GD')->where('type', 2)->first();
        $this->pre = $mod->prefix;// 玩家前缀
        $this->domain = $mod->api_domain;
        $this->comId = $mod->api_id;
        $this->comKey = $mod->api_key;
        $this->gamePlatform = $mod->api_name;
        $this->debug = 0;
        $this->salt = $this->salt(5);
        $this->betLimitCode = 'A';
        $this->currencyCode = 'CNY';
        $this->isdemo = 0;
    }

    public function register($username){
        $code = $this->salt.md5($this->comKey.$this->comId.$username.$this->isdemo.$this->salt);
        $url = "http://".$this->domain."/api/gd/register.ashx";
        $post_data = array('apiAccount'=>$this->comId,'userName'=>$username,'currencyCode'=>$this->currencyCode,'isDemo'=>$this->isdemo,'code'=>$code);

        $receive = $this->send_post($url,$post_data);
        return $receive;
    }

    /*
     * 登录视讯 http://<domain>/api/ag/login.ashx
     */
    public function login($username,$gameType = 'N',$is_mobile = 0){
        $token = date("YmdHms").mt_rand(100,999).$this->salt;//交易编号
        $lang = "zh-CN";
        $code = $this->salt.md5($this->comKey.$this->comId.$username.$token.$lang.$this->isdemo.$this->salt);
        $url = "http://".$this->domain."/api/gd/login.ashx";
        $post_data = array('apiAccount'=>$this->comId,'userName'=>$username,'token' => $token,'lang'=>$lang,'currencyCode'=>$this->currencyCode,'view' => $gameType,'isMobile'=>$is_mobile,'isDemo'=>$this->isdemo,'code'=>$code);

        $receive = $this->send_post($url,$post_data);
        return $receive;
    }


    /*
     * 存款 http://<domain>/api/ag/deposit.ashx
     */
    public function deposit($username,$amount,$transSN){
        $code = $this->salt.md5($this->comKey.$this->comId.$username.$transSN.$amount.$this->isdemo.$this->salt);
        $url = "http://".$this->domain."/api/gd/deposit.ashx";
        $post_data = array('apiAccount'=>$this->comId,'userName'=>$username,'transSN'=>$transSN,'amount'=>$amount,'currencyCode'=>$this->currencyCode,'isDemo'=>$this->isdemo,'code'=>$code);
        $receive = $this->send_post($url,$post_data);
        return $receive;
    }

    /*
     * 提款 http://<domain>/api/ag/withdrawal.ashx
     */
    public function withdrawal($username,$amount,$transSN){

        $code = $this->salt.md5($this->comKey.$this->comId.$username.$transSN.$amount.$this->isdemo.$this->salt);
        $url = "http://".$this->domain."/api/gd/withdrawal.ashx";
        $post_data = array('apiAccount'=>$this->comId,'userName'=>$username,'transSN'=>$transSN,'amount'=>$amount,'currencyCode'=>$this->currencyCode,'isDemo'=>$this->isdemo,'code'=>$code);
        $receive = $this->send_post($url,$post_data);
        return $receive;
    }

    /*
     * 查询余额 http://<domain>/api/ag/balance.ashx
     */
    public function balance($username){
        $code = $this->salt.md5($this->comKey.$this->comId.$username.$this->isspeed.$this->isdemo.$this->salt);
        $url = "http://".$this->domain."/api/gd/balance.ashx";
        $post_data = array('apiAccount'=>$this->comId,'userName'=>$username,'currencyCode'=>$this->currencyCode,'isDemo'=>$this->isdemo,'code'=>$code);

        $receive = $this->send_post($url,$post_data);
        return $receive;
    }


    /*
    * 游戏记录 http://<domain>/api/ag/betrecord.ashx
    */
    public function betrecord($username,$index,$startDate,$endDate,$gameType = 1){

        $code = $this->salt.md5($this->comKey.$this->comId.$index.$startDate.$endDate.$gameType.$this->isdemo.$this->salt);
        $url = "http://".$this->domain."/api/gd/betrecord.ashx";
        $post_data = array('apiAccount'=>$this->comId,'username'=>$username,'index'=>$index,'fromTime'=>$startDate,'toTime'=>$endDate,'gameType'=>$gameType,'isDemo'=>$this->isdemo,'code'=>$code);
        $receive = $this->send_post($url,$post_data);
        return $receive;
    }

    /*
    * 商户余额查询
    */
    public function credit(){
        $code = $this->salt.md5($this->comKey.$this->comId.$this->salt);
        $url = "http://".$this->domain."/api/gd/credit.ashx";
        $post_data = array('apiAccount'=>$this->comId,'code'=>$code);

        $receive = $this->send_post($url,$post_data);
        return $receive;
    }

    protected function send_post($url,$post_data) {
        $result = (new CurlService())->post($url, $post_data);

        return $result;
    }

    protected function salt($length)
    {
        $key="";
        $pattern='1234567890abcdefghijklmnopqrstuvwxyz';
        for($i=0;$i<$length;$i++)
        {
            $key .= $pattern{mt_rand(0,35)};
        }
        return $key;
    }
}