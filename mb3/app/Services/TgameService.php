<?php
namespace App\Services;

use App\Models\Api;
class TgameService{

    protected $url;
    protected $encode_url;
    protected $password;
    protected $prefix;
    protected $cagent;
    protected $key;

    public function __construct()
    {
        $mod = Api::where('api_name', 'TGAME')->first();
        $this->url = $mod->api_domain;
        $this->key = $mod->api_key;
        $this->encode_url= $mod->api_username;
        $this->prefix = $mod->prefix;
        $this->cagent = $mod->api_id;
        $this->desKey = $mod->api_token;

    }

    public function register($username, $password)
    {
        $username = $this->prefix.$username;
        $str_check = "cagent=" . $this->cagent . '/\\\\/loginname=' . $username .'/\\\\/method=lg/\\\\/password='.$password.'/\\\\/prefix='.$this->prefix;

        $des = new DesService($this->desKey);
        $str_encheck = $des->encrypt($str_check);

        $input = [
            'params' => $str_encheck,
            'key' => strtolower(MD5($str_encheck.$this->key))
        ];

        $res = $this->request_post('http://'.$this->url.'/doAction.do', $input);

        return $res;
    }

    //查询余额
    public function balances($username,$password, $api_name)
    {
        $username = $this->prefix.$username;
        $api_name = strtolower($api_name);
        $str_check = 'cagent='.$this->cagent.'/\\\\/loginname='.$username.'/\\\\/method=gb/\\\\/password='.$password.'/\\\\/game='.$api_name;

        $des = new DesService($this->desKey);
        $str_encheck = $des->encrypt($str_check);

        $input = [
            'params' => $str_encheck,
            'key' => strtolower(MD5($str_encheck.$this->key))
        ];

        $res = $this->request_post('http://'.$this->url.'/doAction.do', $input);

        return $res;
    }

    public function transfer($api_name,$username,$password,$money,$billno,$type = 'IN')
    {
        $username = $this->prefix.$username;
        $api_name = strtolower($api_name);
        $str_check = "cagent=" . $this->cagent . '/\\\\/loginname=' . $username . '/\\\\/method=tc/\\\\/billno=' . $billno.'/\\\\/type='.$type.'/\\\\/credit='.$money.'/\\\\/password='.$password.'/\\\\/game='.$api_name;

        $des = new DesService($this->desKey);
        $str_encheck = $des->encrypt($str_check);

        $input = [
            'params' => $str_encheck,
            'key' => strtolower(MD5($str_encheck.$this->key))
        ];

        $res = $this->request_post('http://'.$this->url.'/doAction.do', $input);

        return $res;
    }

    //登录
    public function login($game,$username,$password, $domain,$gametype=0,$gamecode=null,$pagesite = null)
    {
        $username = $this->prefix.$username;
        $game = strtolower($game);
        $t= time();
        $sid = $this->cagent.$t;
        $gameType = in_array(strtolower($game), ['ag'])?$gametype:0;

        $str_check = 'cagent='.$this->cagent.'/\\\\/loginname='.$username.'/\\\\/password='.$password.'/\\\\/dm='.$domain.'/\\\\/sid='.$sid.'/\\\\/gameType='.$gameType.'/\\\\/game='.$game.'/\\\\/prefix='.$this->prefix.'/\\\\/gamecode='.$gamecode;
        //
        if ($pagesite && $gametype != null)
            $str_check .= '/\\\\/pagesite='.$pagesite;

        $des = new DesService($this->desKey);
        $str_encheck = $des->encrypt($str_check);

        $input = [
            'params' => $str_encheck,
            'key' => strtolower(MD5($str_encheck.$this->key))
        ];

        $res = $this->request_post('http://'.$this->url.'/forwardGame.do', $input);

        return $res;
    }

    //下注记录
    public function gameRecord($username = '',$game, $StartTime, $EndTime, $page,$PageSize = 100, $type = null ) {

        $username = $this->prefix.$username;
        $fromdate = date('Y-m-dTH:i:s', strtotime($StartTime));
        $todate = date('Y-m-dTH:i:s', strtotime($EndTime));

        $str_check = "cagent=" . $this->cagent . '/\\\\/loginname=' . $username  .'/\\\\/fromdate='.$fromdate.'/\\\\/todate='.$todate.'/\\\\/game='.$game.'/\\\\/type='.$type.'/\\\\/size='.$PageSize.'/\\\\/page='.$page;

        $des = new DesService($this->desKey);
        $str_encheck = $des->encrypt($str_check);
        $input = [
            'params' => $str_encheck,
            'key' => strtolower(MD5($str_encheck.$this->key))
        ];

        $res = $this->request_post('http://'.$this->url.'/transactionRecord.do', $input);

        return $res;
    }

    // 商户余额
    public function BusinessBalance(){
        $url='http://'.$this->url.'/Api/BusinessBalance?WebSiteCode='.$this->signKey;
        $Business_data= $this->https_request($url);
        return $Business_data;
    }

    protected function buildData($data)
    {
        $key = $data['key'];
        $str = $data['str'];
        $des_mod = new DesService($key);

        $str_encheck = $des_mod->encrypt($str);

        return $str_encheck;
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


    protected function send_post($url,$post_data=[]) {
        $result = (new CurlService())->post($url, $post_data);

        return $result;
    }

    protected function request_post($url = '', $post_data = []) {
        if (empty($url) || empty($post_data)) {
            return false;
        }
        $o = "";
        foreach ( $post_data as $k => $v )
        {
            $o.= "$k=" . urlencode( $v ). "&" ;
        }
        $post_data = substr($o,0,-1);

        $postUrl = $url;
        $curlPost = $post_data;
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
        $data = curl_exec($ch);//运行curl
        curl_close($ch);

        return $data;
    }

}