<?php
header('Content-Type:text/html; charset=utf-8');
function SaveTime($jsonDate){
    preg_match('/\d{10}/',$jsonDate,$matches);
    return (date('Y-m-d H:i:s',$matches[0]));
}
set_time_limit(0);
$end_date = date('Y-m-d H:i:s');
$start_time = date('Y-m-d H:i:s', strtotime('-1 day'));
$page = 1;
$pagesize = 5000;
$service = new \App\Services\AgService();
$api = \App\Models\Api::where('api_name', 'AG')->first();
$username = '';
$TotalNumber = 0;
$res = json_decode($service->betrecord($username, $start_time, $end_date,$page, $pagesize), TRUE);

if ($res['Code'] == 0)
{
    $data = $res["Data"]["Records"];
    $Page        = $res["PageIndex"];
    $PageLimit   = $res["PageSize"];
    $TotalNumber = $res["TotalCount"];
    $TotalPage   = $res["PageCount"];

    if (count($data) > 0)
    {
        foreach($data as $value)
        {
            //捕鱼
            if ($value["SceneID"])
            {
                if (!\App\Models\GameRecord::where('BillNo', $value["SceneID"])->where('api_type', $api->id)->first())
                {
                    $l = strlen($api->prefix);
                    $PlayerName = $value["PlayerName"];
                    $name = substr($PlayerName, $l);
                    $m = \App\Models\Member::where('name', $name)->first();
                    switch ($value['PlatformType']) {
                        case 'AGIN':
                            $gameType = 1;
                            break;
                        case 'HUNTER':
                            $gameType = 2;
                            break;
                        case 'AGTEX':
                            $gameType = 6;
                            break;
                        case 'XIN':
                            $gameType = 3;
                            break;
                        default :
                            $gameType = 7;
                    }
                    \App\Models\GameRecord::create([
                        'billNo' => $value["SceneID"],
                        'playerName' => $PlayerName,
                        'agentCode' => $value["AgentCode"],
                        'gameCode' => $value["GameCode"],
                        'netAmount' => $value["TransferAmount"] + $value["Cost"],
                        'betTime' => date('Y-m-d H:i:s', strtotime($value["CreateDate"])),
                        'gameType' => $gameType,
                        'betAmount' => $value["Cost"],
                        'validBetAmount' => $value["ValidBetAmount"],
                        'flag' => $value["Flag"],
                        'playType' => $value["PlayType"],
                        'currency' => $value["Currency"],
                        'tableCode' => $value["TableCode"],
                        'loginIP' => $value["LoginIP"],
                        'recalcuTime' => $value["RecalcuTime"],
                        'platformID' => $value["PlatformID"],
                        'platformType' => $value["PlatformType"],
                        'stringEx' => $value["StringEx"],
                        'remark' => $value["Remark"],
                        'round' => $value["Round"],
                        'api_type' => $api->id,
                        'name' => $name,
                        'member_id' => $m->id,
                        'result' => json_encode($value)
                    ]);
                }

            } else {
                if (!\App\Models\GameRecord::where('BillNo', $value["BillNo"])->where('api_type', $api->id)->first()) {
                    $l = strlen($api->prefix);
                    $PlayerName = $value["PlayerName"];
                    $name = substr($PlayerName, $l);
                    $m = \App\Models\Member::where('name', $name)->first();

                    switch ($value['PlatformType']) {
                        case 'AGIN':
                            $gameType = 1;
                            break;
                        case 'HUNTER':
                            $gameType = 2;
                            break;
                        case 'AGTEX':
                            $gameType = 6;
                            break;
                        case 'XIN':
                            $gameType = 3;
                            break;
                        default :
                            $gameType = 7;
                    }

                    \App\Models\GameRecord::create([
                        'billNo' => $value["BillNo"],
                        'playerName' => $PlayerName,
                        'agentCode' => $value["AgentCode"],
                        'gameCode' => $value["GameCode"],
                        'netAmount' => $value["NetAmount"] + $value["BetAmount"],
                        'betTime' => date('Y-m-d H:i:s', strtotime($value["BetTime"]) + 12 * 60 * 60),
                        'gameType' => $gameType,
                        'betAmount' => $value["BetAmount"],
                        'validBetAmount' => $value["ValidBetAmount"],
                        'flag' => $value["Flag"],
                        'playType' => $value["PlayType"],
                        'currency' => $value["Currency"],
                        'tableCode' => $value["TableCode"],
                        'loginIP' => $value["LoginIP"],
                        'recalcuTime' => $value["RecalcuTime"],
                        'platformID' => $value["PlatformID"],
                        'platformType' => $value["PlatformType"],
                        'stringEx' => $value["StringEx"],
                        'remark' => $value["Remark"],
                        'round' => $value["Round"],
                        'api_type' => $api->id,
                        'name' => $name,
                        'member_id' => $m?$m->id:0,
                        'result' => json_encode($value)
                    ]);
                }
            }

        }

    }

    //第二页
    if ($TotalPage > 1)
    {
        for ($i=2;$i<=$TotalPage;$i++)
        {
            $res = json_decode($service->betrecord($username, $start_time, $end_date,$i, $pagesize), TRUE);
            if ($res['Code'] == 0)
            {
                $data = $res["Data"]["Records"];
                $Page        = $res["PageIndex"];
                $PageLimit   = $res["PageSize"];
                $TotalNumber = $res["TotalCount"];
                $TotalPage   = $res["PageCount"];

                if (count($data) > 0)
                {
                    foreach($data as $value)
                    {
                        //捕鱼
                        if ($value["SceneID"])
                        {
                            if (!\App\Models\GameRecord::where('BillNo', $value["SceneID"])->where('api_type', $this->api->id)->first())
                            {
                                $l = strlen($api->prefix);
                                $PlayerName = $value["PlayerName"];
                                $name = substr($PlayerName, $l);
                                $m = \App\Models\Member::where('name', $name)->first();
                                switch ($value['PlatformType']) {
                                    case 'AGIN':
                                        $gameType = 1;
                                        break;
                                    case 'HUNTER':
                                        $gameType = 2;
                                        break;
                                    case 'AGTEX':
                                        $gameType = 6;
                                        break;
                                    case 'XIN':
                                        $gameType = 3;
                                        break;
                                    default :
                                        $gameType = 7;
                                }
                                \App\Models\GameRecord::create([
                                    'billNo' => $value["SceneID"],
                                    'playerName' => $PlayerName,
                                    'agentCode' => $value["AgentCode"],
                                    'gameCode' => $value["GameCode"],
                                    'netAmount' => $value["TransferAmount"],
                                    'betTime' => date('Y-m-d H:i:s', strtotime($value["CreateDate"])),
                                    'gameType' => $gameType,
                                    'betAmount' => $value["Cost"],
                                    'validBetAmount' => $value["ValidBetAmount"],
                                    'flag' => $value["Flag"],
                                    'playType' => $value["PlayType"],
                                    'currency' => $value["Currency"],
                                    'tableCode' => $value["TableCode"],
                                    'loginIP' => $value["LoginIP"],
                                    'recalcuTime' => $value["RecalcuTime"],
                                    'platformID' => $value["PlatformID"],
                                    'platformType' => $value["PlatformType"],
                                    'stringEx' => $value["StringEx"],
                                    'remark' => $value["Remark"],
                                    'round' => $value["Round"],
                                    'api_type' => $api->id,
                                    'name' => $name,
                                    'member_id' => $m->id,
                                    'result' => json_encode($value)
                                ]);
                            }

                        } else {
                            if (!\App\Models\GameRecord::where('BillNo', $value["BillNo"])->where('api_type', $this->api->id)->first()) {
                                $l = strlen($api->prefix);
                                $PlayerName = $value["PlayerName"];
                                $name = substr($PlayerName, $l);
                                $m = \App\Models\Member::where('name', $name)->first();

                                switch ($value['PlatformType']) {
                                    case 'AGIN':
                                        $gameType = 1;
                                        break;
                                    case 'HUNTER':
                                        $gameType = 2;
                                        break;
                                    case 'AGTEX':
                                        $gameType = 6;
                                        break;
                                    case 'XIN':
                                        $gameType = 3;
                                        break;
                                    default :
                                        $gameType = 7;
                                }

                                \App\Models\GameRecord::create([
                                    'billNo' => $value["BillNo"],
                                    'playerName' => $PlayerName,
                                    'agentCode' => $value["AgentCode"],
                                    'gameCode' => $value["GameCode"],
                                    'netAmount' => $value["NetAmount"],
                                    'betTime' => date('Y-m-d H:i:s', strtotime($value["BetTime"]) + 12 * 60 * 60),
                                    'gameType' => $gameType,
                                    'betAmount' => $value["BetAmount"],
                                    'validBetAmount' => $value["ValidBetAmount"],
                                    'flag' => $value["Flag"],
                                    'playType' => $value["PlayType"],
                                    'currency' => $value["Currency"],
                                    'tableCode' => $value["TableCode"],
                                    'loginIP' => $value["LoginIP"],
                                    'recalcuTime' => $value["RecalcuTime"],
                                    'platformID' => $value["PlatformID"],
                                    'platformType' => $value["PlatformType"],
                                    'stringEx' => $value["StringEx"],
                                    'remark' => $value["Remark"],
                                    'round' => $value["Round"],
                                    'api_type' => $api->id,
                                    'name' => $name,
                                    'member_id' => $m?$m->id:0,
                                    'result' => json_encode($value)
                                ]);
                            }
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
            AG视讯:成功采集到<?=$TotalNumber?>条数据
            <span id="timeinfo"></span>
        </td>
    </tr>
</table>
</body>
</html>
