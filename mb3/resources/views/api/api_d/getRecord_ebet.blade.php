<?php
header('Content-Type:text/html; charset=utf-8');
function SaveTime($jsonDate){
    preg_match('/\d{10}/',$jsonDate,$matches);
    return (date('Y-m-d H:i:s',$matches[0]));
}
set_time_limit(0);
$end_date = date('Y-m-d H:i:s');
$start_time = date('Y-m-d H:i:s', strtotime('-10 minutes'));
$page = 1;
$pagesize = 100;
$service = new \App\Services\EbetService();
$api = \App\Models\Api::where('api_name', 'EBET')->where('type', 2)->first();
$username = '';
$TotalNumber = 0;
$res = json_decode($service->betrecord($username, $start_time, $end_date,$page, $pagesize), TRUE);

if ($res['Code'] == 0)
{
    $data = $res['Data']['Records'];
    $Page        = $res["PageIndex"];
    $PageLimit   = $res["PageSize"];
    $TotalNumber = $res["TotalCount"];
    $TotalPage   = $res["PageCount"];

    if (count($data) > 0)
    {
        foreach($data as $value)
        {
            if (!\App\Models\GameRecord::where('BillNo', $value["betHistoryId"])->where('api_type', $api->id)->first())
            {
                $l = strlen($api->prefix);
                $PlayerName = $value["username"];
                $name = substr($PlayerName, $l);
                $m = \App\Models\Member::where('name', $name)->first();
                \App\Models\GameRecord::create([
                    'billNo' => $value["betHistoryId"],
                    'playerName' => $PlayerName,
                    'netAmount' => $value["payout"] + $value["betMap"][0]['betMoney'],
                    'betTime' => date('Y-m-d H:i:s', $value['payoutTime']),
                    'gameType' => 1,
                    'betAmount' => $value["betMap"][0]['betMoney'],
                    'validBetAmount' => $value["validBet"],
                    'api_type' => $api->id,
                    'name' => $name,
                    'member_id' => $m->id,
                    'result' => json_encode($value)
                ]);
            }

        }

    }

    //第二页
    if ($TotalPage > 1)
    {
        for ($i=2;$i<=$TotalPage;$i++)
        {
            $res = json_decode($service->betrecord($start_time, $end_date), TRUE);
            if ($res['Code'] == 0)
            {
                $data = $res['Data']['Records'];
                $Page        = $res["PageIndex"];
                $PageLimit   = $res["PageSize"];
                $TotalNumber = $res["TotalCount"];
                $TotalPage   = $res["PageCount"];

                if (count($data) > 0)
                {
                    foreach ($data as  $value)
                    {
                        if (!\App\Models\GameRecord::where('BillNo', $value["betHistoryId"])->where('api_type', $api->id)->first())
                        {
                            $l = strlen($api->prefix);
                            $PlayerName = $value["username"];
                            $name = substr($PlayerName, $l);
                            $m = \App\Models\Member::where('name', $name)->first();
                            \App\Models\GameRecord::create([
                                'billNo' => $value["betHistoryId"],
                                'playerName' => $PlayerName,
                                'netAmount' => $value["payout"] + $value["betMap"][0]['betMoney'],
                                'betTime' => date('Y-m-d H:i:s', $value['payoutTime']),
                                'gameType' => 1,
                                'betAmount' => $value["betMap"][0]['betMoney'],
                                'validBetAmount' => $value["validBet"],
                                'api_type' => $api->id,
                                'name' => $name,
                                'member_id' => $m->id,
                                'result' => json_encode($value)
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
            EBET视讯:成功采集到<?=$TotalNumber?>条数据
            <span id="timeinfo"></span>
        </td>
    </tr>
</table>
</body>
</html>
