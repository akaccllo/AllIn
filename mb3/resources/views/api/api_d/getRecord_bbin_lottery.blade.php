<?php
header('Content-Type:text/html; charset=utf-8');
function SaveTime($jsonDate){
    preg_match('/\d{10}/',$jsonDate,$matches);
    return (date('Y-m-d H:i:s',$matches[0]));
}
set_time_limit(0);
$service = new \App\Services\BbinService();
$api = \App\Models\Api::where('api_name', 'BBIN')->first();
$roundDate = date("Y-m-d");//$roundDate = '2016-03-13';
//$gameKind = 3; // （0:AG  1：球类，3：视讯，5：机率，12：彩票，15：3D 厅）
$time = time();
$startTimeSearch = $startTime = date("H:i:s", strtotime("-18 minutes"));
$endTimeSearch = $endTime = date('H:i:s');
if($endTime <= '12:00:00') {
    $roundDate = date("Y-m-d", strtotime("-1 days"));//昨天
    $endTimeSearch = date('H:i:s', $time + 12 * 60 * 60);
    $startTimeSearch = date('H:i:s', $time + 12 * 60 * 60 - 18 * 60);

} elseif('12:00:00' < $endTime && $endTime <= "12:18:00"){
    $startTimeSearch = '00:00:00';
    $endTimeSearch = date("H:i:s", $time - 12*60*60);

} elseif ($endTime > "12:18:00") {

    $startTimeSearch = date("H:i:s", $time - 12*60*60 - 18*60);
    $endTimeSearch = date("H:i:s", $time - 12*60*60);
}

$page0 = 1;
$pageLimit = 500;// 每页最大记录数 最多500
$TotalCount = 0;
$username = '';
$list = [
    'LT',
    'BJ3D',
    'PL3D',
    'BBPK',
    'BB3D',
    'BBKN',
    'BBRB',
    'SH3D',
    'CQSC',
    'TJSC',
    'JXSC',
    'XJSC',
    'CQSF',
    'GXSF',
    'GDSF',
    'TJSF',
    'BJPK',
    'BJKN',
    'CAKN',
    'AUKN',
    'GDE5',
    'JXE5',
    'SDE5',
    'JLQ3',
    'JSQ3',
    'AHQ3',
    'OTHER',
];
foreach ($list as $item)
{
    $res = json_decode($service->betrecord($username, $roundDate,12,$startTimeSearch,$endTimeSearch,$page0,$pageLimit,$subGameKind =1,$item), TRUE);

    if ($res['Code'] ==0)
    {
        $data = $res['Data'];
        $PageCount = $res['PageCount'];
        $TotalCount += $res['TotalCount'];
        if (count($data) > 0)
        {
            foreach ($data as $value)
            {
                $m = \App\Models\GameRecord::where('api_type', $api->id)->where('billNo', $value['WagersID'])->first();
                if (!$m)
                {
                    $l = strlen($api->prefix);
                    $PlayerName = $value["UserName"];
                    $name = substr($PlayerName, $l);
                    $m = \App\Models\Member::where('name', $name)->first();

                    \App\Models\GameRecord::create([
                        'billNo' => $value['WagersID'],
                        'playerName' => $value['UserName'],
                        'netAmount' => $value['Payoff'] + $value['BetAmount'],
                        'betTime' => date("Y-m-d H:i:s",  strtotime($value['WagersDate']) + 12*60*60),
                        'betAmount' => $value['BetAmount'],
                        'validBetAmount' => $value['BetAmount'],
                        'gameType' => 4,
                        'platformType' => 'BBIN',
                        'tableCode' => isset($value['GameCode'])?$value['GameCode']:'',
                        'api_type' => $api->id,
                        'name' => $name,
                        'member_id' => $m?$m->id:0,
                        'result' => json_encode($value)
                    ]);
                } else {
                    $m->update([
                        'netAmount' => $value['Payoff'],
                        'remark' => json_encode($value)
                    ]);
                }
            }


            //第二页
            if ($PageCount > 1)
            {
                for ($i =2 ;$i<=$PageCount;$i++)
                {
                    $res = json_decode($service->betrecord($username, $roundDate,12,$startTimeSearch,$endTimeSearch,$i,$pageLimit,$subGameKind =1,$item), TRUE);
                    $data = $res['Data'];
                    foreach ($data as $value)
                    {
                        $m = \App\Models\GameRecord::where('api_type', $api->id)->where('billNo', $value['WagersID'])->first();
                        if (!$m)
                        {
                            $l = strlen($api->prefix);
                            $PlayerName = $value["UserName"];
                            $name = substr($PlayerName, $l);
                            $m = \App\Models\Member::where('name', $name)->first();

                            \App\Models\GameRecord::create([
                                'billNo' => $value['WagersID'],
                                'playerName' => $value['UserName'],
                                'netAmount' => $value['Payoff'] + $value['BetAmount'],
                                'betTime' => date("Y-m-d H:i:s",  strtotime($value['WagersDate']) + 12*60*60),
                                'betAmount' => $value['BetAmount'],
                                'validBetAmount' => $value['BetAmount'],
                                'gameType' => 4,
                                'platformType' => 'BBIN',
                                'tableCode' => isset($value['GameCode'])?$value['GameCode']:'',
                                'api_type' => $api->id,
                                'name' => $name,
                                'member_id' => $m?$m->id:0,
                                'result' => json_encode($value)
                            ]);
                        } else {
                            $m->update([
                                'netAmount' => $value['Payoff'],
                                'remark' => json_encode($value)
                            ]);
                        }
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
            BBIN彩票:成功采集到<?=$TotalCount?>条数据
            <span id="timeinfo"></span>
        </td>
    </tr>
</table>
</body>
</html>
