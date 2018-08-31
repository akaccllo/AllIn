<?php
header('Content-Type:text/html; charset=utf-8');
function SaveTime($jsonDate){
    preg_match('/\d{10}/',$jsonDate,$matches);
    return (date('Y-m-d H:i:s',$matches[0]));
}
set_time_limit(0);
$totalCount = 0;
$service = new \App\Services\MgService();
$api = \App\Models\Api::where('api_name', 'MG')->first();
$rowid = \App\Models\GameRecord::where('api_type', $api->id)->max('rowid');
$rowid = $rowid >0 ?$rowid:0;
$res = json_decode($service->getspinbyspindata($rowid), TRUE);

if ($res['Code'] == 0)
{

    $data = $res['Data'];
    $totalCount =count($data);
    if ($totalCount > 0)
    {
        foreach ($data as $value)
        {
            if (!\App\Models\GameRecord::where('api_type', $api->id)->where('rowid', $value["RowId"])->first())
            {
                $l = strlen($api->prefix);
                $PlayerName = $value["AccountNumber"];
                $name = substr($PlayerName, $l);
                $m = \App\Models\Member::where('name', $name)->first();

                \App\Models\GameRecord::create([
                    'rowid' => $value["RowId"],
                    'playerName' => $PlayerName,
                    'betAmount' => $value["TotalWager"]/100,
                    'validBetAmount' => $value["TotalWager"]/100,
                    'betTime' => date('Y-m-d H:i:s', strtotime($value["GameEndTime"]) + 8*60*60),
                    'gameType' => 3,
                    'netAmount' => $value["TotalPayout"]/100,
                    'platformType' => $value['GamePlatform'],
                    'api_type' => $api->id,
                    'name' => $name,
                    'member_id' => $m?$m->id:0,
                    'result' => json_encode($value)

                ]);

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
            MG:成功采集到<?=$totalCount?>条数据
            <span id="timeinfo"></span>
        </td>
    </tr>
</table>
</body>
</html>
