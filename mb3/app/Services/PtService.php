<?php
namespace App\Services;

use App\Models\Api;
use App\Services\CurlService;
class PtService{
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
        $mod = Api::where('api_name', 'PT')->where('type', 2)->first();
        $this->pre = $mod->prefix;// 玩家前缀
        $this->domain = $mod->api_domain;
        $this->comId = $mod->api_id;
        $this->comKey = $mod->api_key;
        $this->gamePlatform = $mod->api_name;
        $this->debug = 0;
        $this->salt = $this->salt(5);
        $this->betLimitCode = 'A';
        $this->currencyCode = 'CNY';
        $this->isspeed = 0;
        $this->isdemo = 0;
    }

    public function register($username,$password){
        $code = $this->salt.md5($this->comKey.$this->comId.$username.$password.$this->currencyCode.$this->salt);
        $url = "http://".$this->domain."/api/GDPT/Register.ashx";
        $post_data = array('apiAccount'=>$this->comId,'userName'=>$username,'password'=>$password,'currencyCode'=>$this->currencyCode,'code'=>$code);

        $receive = $this->send_post($url,$post_data);
        return $receive;
    }

    public function validate()
    {
        return $return = [
            'Data' => null,
            'TotalCount' => "0",
            'PageIndex' => "0",
            'PageSize' => '0',
            'Success' => 'true',
            'Code' => '0',
            'Message' => 'Success',
            'Exception' => null
        ];
    }

    /*
     * 登录视讯 http://<domain>/api/ag/login.ashx
     */
    public function login($username,$password,$gameCode){
        $lang = "zh-CN";
        $code = $this->salt.md5($this->comKey.$this->comId.$username.$password.$lang.$gameCode.$this->currencyCode.$this->salt);
        $url = "http://".$this->domain."/api/GDPT/login.ashx";
        $post_data = array('apiAccount'=>$this->comId,'userName'=>$username,'password'=>$password,'languageCode'=>$lang,'gameCode'=>$gameCode,'currencyCode'=>$this->currencyCode,'code'=>$code);

        $receive = $this->send_post($url,$post_data);
        return $receive;
    }


    /*
     * 存款 http://<domain>/api/ag/deposit.ashx
     */
    public function deposit($username,$amount,$transSN){
        $code = $this->salt.md5($this->comKey.$this->comId.$username.$transSN.$amount.$this->currencyCode.$this->salt);
        $url = "http://".$this->domain."/api/GDPT/deposit.ashx";
        $post_data = array('apiAccount'=>$this->comId,'userName'=>$username,'transSN'=>$transSN,'amount'=>$amount,'currencyCode'=>$this->currencyCode,'code'=>$code);
        $receive = $this->send_post($url,$post_data);
        return $receive;
    }

    /*
     * 提款 http://<domain>/api/ag/withdrawal.ashx
     */
    public function withdrawal($username,$amount,$transSN){
        $code = $this->salt.md5($this->comKey.$this->comId.$username.$transSN.$amount.$this->currencyCode.$this->salt);
        $url = "http://".$this->domain."/api/GDPT/withdrawal.ashx";
        $post_data = array('apiAccount'=>$this->comId,'userName'=>$username,'transSN'=>$transSN,'amount'=>$amount,'currencyCode'=>$this->currencyCode,'code'=>$code);
        $receive = $this->send_post($url,$post_data);
        return $receive;
    }

    public function balance($username){
        $code = $this->salt.md5($this->comKey.$this->comId.$username.$this->currencyCode.$this->salt);
        $url = "http://".$this->domain."/api/GDPT/balance.ashx";
        $post_data = array('apiAccount'=>$this->comId,'userName'=>$username,'currencyCode'=>$this->currencyCode,'code'=>$code);

        $receive = $this->send_post($url,$post_data);
        return $receive;
    }


    /*
    * 游戏记录 http://<domain>/api/ag/betrecord.ashx
    */
    public function betrecord($username,$startDate,$endDate,$page,$pagesize){

        $code = $this->salt.md5($this->comKey.$this->comId.$username.$startDate.$endDate.$page.$pagesize.$this->currencyCode.$this->salt);
        $url = "http://".$this->domain."/api/GDPT/BetRecord.ashx";
        $post_data = array('apiAccount'=>$this->comId,'username'=>$username,'startDate'=>$startDate,'endDate'=>$endDate,'pageIndex'=>$page,'pageSize'=>$pagesize,'currencyCode'=>$this->currencyCode,'code'=>$code);
        $receive = $this->send_post($url,$post_data);
        return $receive;
    }

    /*
    * 商户余额查询
    */
    public function credit(){
        $code = $this->salt.md5($this->comKey.$this->comId.$this->salt);
        $url = "http://".$this->domain."/api/gdpt/credit.ashx";
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