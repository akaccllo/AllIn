<?php
header('Content-Type:text/html; charset=utf-8');
function SaveTime($jsonDate){
    preg_match('/\d{10}/',$jsonDate,$matches);
    return (date('Y-m-d H:i:s',$matches[0]));
}

$time=time();
$S_time=$time-2*60*60;
$E_time=$time;
$limit=50;
$PageIndex=0;
$platformCode='IBC';
$api_mod = \App\Models\Api::where('api_name', $platformCode)->where('type', 1)->first();
$api_bi = \App\Models\Api::where('api_name', 'BI')->first();
$api=new \App\Http\Controllers\Api\BiController();
$data=$api->getGameRecord($platformCode,$S_time,$E_time,$PageIndex,$limit,$time);
$count=0;
if(!empty($data['data'])){
    $count=$data['TotalCount'];
    $data =$data['data'];
    $data =array_reverse($data);
    foreach($data as $k=>$v){

        $r_mod = \App\Models\GameRecord::where('billNo', $v['TransId'])->where('api_type', $api_mod->id)->first();

        if($r_mod){
            if($r_mod->netAmount != $v['WinLoseAmount'] + $v['Stake']){

                $r_mod->update([
                    'netAmount' => $v['WinLoseAmount'] + $v['Stake']
                ]);
            }
        }else{
            if($v['SportType'] == 1){
                $gameType ='足球';
            }elseif($v['SportType'] == 2){
                $gameType  ='篮球';
            }elseif($v['SportType'] == 3){
                $gameType  ='足球';
            }elseif($v['SportType'] == 5){
                $gameType  ='网球';
            }elseif($v['SportType'] == 8){
                $gameType  ='棒球';
            }elseif($v['SportType'] == 10){
                $gameType  ='高尔夫';
            }elseif($v['SportType'] == 11){
                $gameType  ='赛车';
            }else{
                $gameType  ='其他体育';
            }
            //
            //$l = strlen($api_bi->prefix);
            $ctime = SaveTime($v['TransactionTime']);
            $l = 0;
            $PlayerName = $v["PlayerName"];
            $name = substr($PlayerName, $l);
            $m = \App\Models\Member::where('name', $name)->first();

            \App\Models\GameRecord::create([
                'billNo' => $v['TransId'],
                'playerName' => $PlayerName,
                'betAmount' => $v['Stake'],
                'netAmount' => $v['WinLoseAmount'] +$v['Stake'] ,
                'validBetAmount' => $v['Stake'],
                'betTime' => $ctime,
                'playType' => $gameType,
                'gameType' => 5,

                'api_type' => $api_mod->id,
                'name' => $name,
                'member_id' => $m?$m->id:0,
                'result' => json_encode($v)
            ]);

            //$mysqli->query($sql);
        }

    }

    if ($count > $limit)
    {
        for ($i=1;$i < ceil($count/$limit);$i++)
        {
            $p = $i*$limit;
            $time = time();
            $data=$api->getGameRecord($platformCode,$S_time,$E_time,$p,$limit,$time);
            if (!empty($data['data']))
            {
                $data =$data['data'];
                foreach($data as $k=>$v){

                    $r_mod = \App\Models\GameRecord::where('billNo', $v['TransId'])->where('api_type', $api_mod->id)->first();

                    if($r_mod){
                        if($r_mod->netAmount != $v['WinLoseAmount'] + $v['Stake']){

                            $r_mod->update([
                                'netAmount' => $v['WinLoseAmount'] + $v['Stake']
                            ]);
                        }
                    }else{
                        if($v['SportType'] == 1){
                            $gameType ='足球';
                        }elseif($v['SportType'] == 2){
                            $gameType  ='篮球';
                        }elseif($v['SportType'] == 3){
                            $gameType  ='足球';
                        }elseif($v['SportType'] == 5){
                            $gameType  ='网球';
                        }elseif($v['SportType'] == 8){
                            $gameType  ='棒球';
                        }elseif($v['SportType'] == 10){
                            $gameType  ='高尔夫';
                        }elseif($v['SportType'] == 11){
                            $gameType  ='赛车';
                        }else{
                            $gameType  ='其他体育';
                        }
                        //
                        //$l = strlen($api_bi->prefix);
                        $ctime = SaveTime($v['TransactionTime']);
                        $l = 0;
                        $PlayerName = $v["PlayerName"];
                        $name = substr($PlayerName, $l);
                        $m = \App\Models\Member::where('name', $name)->first();

                        \App\Models\GameRecord::create([
                            'billNo' => $v['TransId'],
                            'playerName' => $PlayerName,
                            'betAmount' => $v['Stake'],
                            'netAmount' => $v['WinLoseAmount']+$v['Stake'],
                            'validBetAmount' => $v['Stake'],
                            'betTime' => $ctime,
                            'playType' => $gameType,
                            'gameType' => 5,

                            'api_type' => $api_mod->id,
                            'name' => $name,
                            'member_id' => $m?$m->id:0,
                            'result' => json_encode($v)
                        ]);

                        //$mysqli->query($sql);
                    }

                }
            }
        }
    }
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>
    <style type="text/css">
        body,td,th {
            font-size: 12px;
        }
        body {
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
        }
    </style>
</head>
<body>
<script>
    var limit="300"
    if (document.images){
        var parselimit=limit
    }
    function beginrefresh(){
        if (!document.images)
            return
        if (parselimit==1)
            window.location.reload()
        else{
            parselimit-=1
            curmin=Math.floor(parselimit)
            if (curmin!=0)
                curtime=curmin+"秒后自动获取!"
            else
                curtime=cursec+"秒后自动获取!"
            timeinfo.innerText=curtime
            setTimeout("beginrefresh()",1000)
        }
    }

    window. onload=beginrefresh
</script>
<table width="100%"border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td align="left">
            <input type=button name=button value="刷新" onClick="window.location.reload()">
            IBC:成功采集到<?=$count?>条数据
            <span id="timeinfo"></span>
        </td>
    </tr>
</table>
</body>
</html>
