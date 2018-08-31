<?php
header('Content-Type:text/html; charset=utf-8');
function SaveTime($jsonDate){
    preg_match('/\d{10}/',$jsonDate,$matches);
    return (date('Y-m-d H:i:s',$matches[0]));
}

$time=time();
$S_time=$time-60*60;
$E_time=$time;
$limit=100;
$PageIndex=0;
$service = new \App\Services\OgService();
$api = \App\Models\Api::where('api_name', 'OG')->where('type', 2)->first();
$rowid = \App\Models\GameRecord::where('api_type', $api->id)->max('rowid');
$rowid = $rowid >0 ?$rowid:'1423921395708';

$res = $service->getBettingRecord($rowid);
$res = json_decode($res, TRUE);
$count=0;
if ($res['Code'] == 0)
{
    $data = $res['Data']['BetRecord'];
    if (count($data) > 0)
    {
        foreach ($data as $value)
        {
            if (!\App\Models\GameRecord::where('api_type', $this->api->id)->where('rowid', $value["VendorId"])->first()) {
                $l = strlen($this->api->prefix);
                $PlayerName = $value["UserName"];
                $name = substr($PlayerName, $l);
                $m = \App\Models\Member::where('name', $name)->first();

                \App\Models\GameRecord::create([
                    'rowid' => $value["VendorId"],
                    'billNo' => $value["OrderNumber"],
                    'playerName' => $PlayerName,
                    'betAmount' => $value["BettingAmount"],
                    'validBetAmount' => $value["ValidAmount"],
                    'betTime' => date('Y-m-d H:i:s', strtotime($value["AddTime"])),
                    'gameType' =>1,//真人
                    'netAmount' => $value["WinLoseAmount"] + $value["BettingAmount"],
                    'flag' => $value['ResultType'],
                    'api_type' => $this->api->id,
                    'name' => $name,
                    'member_id' => $m?$m->id:0,
                    'result' => json_encode($value),

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
            OG:成功采集到<?=$count?>条数据
            <span id="timeinfo"></span>
        </td>
    </tr>
</table>
</body>
</html>
