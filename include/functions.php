<?php


function getSVXLog()
{
    // Open Logfile and copy loglines into LogLines-Array()
    $logLines = array();
    $logLines1 = array();
    $logLines2 = array();
    //    if (file_exists(LOGPATH."/".SVXLOGPREFIX."-".gmdate("Y-m-d").".log")) {
    if (file_exists(SVXLOGPATH."/".SVXLOGPREFIX)) {
        $logPath = SVXLOGPATH."/".SVXLOGPREFIX;
        $logLines1 = explode("\n", `egrep -a -h "Talker start on|Talker stop on" $logPath | tail -500`);
    }
    $logLines1 = array_slice($logLines1, -500);
    if (sizeof($logLines1) < 250) {
        if (file_exists(SVXLOGPATH.".hdd/".SVXLOGPREFIX.".1")) {
            $logPath = SVXLOGPATH.".hdd/".SVXLOGPREFIX.".1";
            $logLines2 = explode("\n", `egrep -a -h "Talker start on|Talker stop on" $logPath | tail -500`);
        }
    }
    $logLines2 = array_slice($logLines2, -500);
    //    $logLines = $logLines1 + $logLines2;
    $logLines = array_merge($logLines1, $logLines2);
    $logLines = array_slice($logLines, -500);
    return $logLines;
}

function getSVXStatusLog()
{
    // Open Logfile and copy loglines into LogLines-Array()
    $logLines = array();
    $logLines1 = array();
    $logLines2 = array();
    if (file_exists(SVXLOGPATH."/".SVXLOGPREFIX)) {
        $logPath = SVXLOGPATH."/".SVXLOGPREFIX;
        $logLines1 = explode("\n", `egrep -a -h "EchoLink QSO|ransmitter|Selecting" $logPath | tail -500`);
    }
    $logLines1 = array_slice($logLines1, -500);
    if (sizeof($logLines1) < 250) {
        if (file_exists(SVXLOGPATH.".hdd/".SVXLOGPREFIX.".1")) {
            $logPath = SVXLOGPATH.".hdd/".SVXLOGPREFIX.".1";
            $logLines2 = explode("\n", `egrep -a -h "Talker start on|Talker stop on" $logPath | tail -500`);
        }
    }
    $logLines2 = array_slice($logLines2, -500);
    //    $logLines = $logLines1 + $logLines2;
    $logLines = array_merge($logLines1, $logLines2);
    $logLines = array_slice($logLines, -500);
    return $logLines;
}

// SVXReflector connections
//2021-07-22 18:57:03: RefLogic: Heartbeat timeout
//2021-07-22 18:57:03: RefLogic: Disconnected from 127.0.0.1:5300: Locally ordered disconnect
//2021-07-22 18:59:18: RefLogic: Disconnected from 127.0.0.1:5300: Connection timed out
//2021-07-25 16:30:35: RefLogic: Disconnected from 127.0.0.1:5300: Connection refused
//2021-07-25 16:31:46: RefLogic: Disconnected from 127.0.0.1:5300: No route to host
//2021-07-22 19:07:03: RefLogic: Connection established to 127.0.0.1:5300
//2021-07-22 19:07:03: RefLogic: Authentication OK

function getSVXRstatus()
{
    if (file_exists(SVXLOGPATH."/".SVXLOGPREFIX)) {
           $slogPath = SVXLOGPATH."/".SVXLOGPREFIX; 
           $svxrstat = `egrep -a -h "Authentication|Connection established|Heartbeat timeout|No route to host|Connection refused|Connection timed out|Locally ordered disconnect|Deactivating link|Activating link" $slogPath | tail -1`;
    }
    if ($svxrstat=="" &&  file_exists(SVXLOGPATH.".hdd/".SVXLOGPREFIX.".1")) {
           $slogPath = SVXLOGPATH.".hdd/".SVXLOGPREFIX.".1"; 
           $svxrstat = `egrep -a -h "Authentication|Connection established|Heartbeat timeout|No route to host|Connection refused|Connection timed out|Locally ordered disconnect|Deactivating link|Activating link" $slogPath | tail -1`;
    }
    if(strpos($svxrstat, "Authentication OK") || strpos($svxrstat, "Connection established") || strpos($svxrstat, "Activating link")) {
        $svxrstatus="Connected";
    }
    elseif (strpos($svxrstat, "Heartbeat timeout") || strpos($svxrstat, "No route to host") || strpos($svxrstat, "Connection refused") || strpos($svxrstat, "Connection timed out") || strpos($svxrstat, "Locally ordered disconnect") || strpos($svxrstat, "Deactivating link")) { $svxrstatus="Not connected";
    }
    else { $svxrstatus="No status";
    }
      return $svxrstatus;
}

// SVXLink proxy public log lines
//2021-06-19 20:45:16: Connected to EchoLink proxy 51.83.134.252:8100
//2021-06-19 20:45:16: *** ERROR: Access denied to EchoLink proxy
//2021-06-19 20:45:16: Disconnected from EchoLink proxy 51.83.134.252:8100
//2021-06-19 20:53:19: Connected to EchoLink proxy 44.137.75.82:8100

function getEchoLinkProxy()
{
    if (file_exists(SVXLOGPATH."/".SVXLOGPREFIX)) {
           $elogPath = SVXLOGPATH."/".SVXLOGPREFIX; 
           $echoproxy = `grep -a -h "EchoLink proxy" $elogPath | tail -1`;
    }
    if ($echoproxy=="" && file_exists(SVXLOGPATH.".hdd/".SVXLOGPREFIX.".1")) {
           $elogPath = SVXLOGPATH.".hdd/".SVXLOGPREFIX.".1"; 
           $echoproxy = `grep -a -h "EchoLink proxy" $elogPath | tail -1`;
    }
    if(strpos($echoproxy, "Connected to EchoLink proxy")) {
        $proxy=substr($echoproxy, strpos($echoproxy, "Connected to EchoLink proxy")+27);
        $eproxy="Connected to proxy<br><span style=\"color:brown;font-weight:bold;\">".$proxy."</span>";
    }
    elseif(strpos($echoproxy, "Disconnected from EchoLink proxy")) {
        $proxy=substr($echoproxy, strpos($echoproxy, "Disconnected from EchoLink proxy")+32);
        $eproxy="<span style=\"color:red;font-weight:bold;\">Disconnected proxy</span><br><span style=\"color:brown;font-weight:bold;\">".$proxy."</span>";
    }
    elseif(strpos($echoproxy, "Access denied to EchoLink proxy")) {
        $eproxy="Access denied to proxy";
    }
    else { $eproxy="";
    }

      return $eproxy;
}


function getEchoLog()
{
    if (file_exists(SVXLOGPATH."/".SVXLOGPREFIX)) {
           $elogPath = SVXLOGPATH."/".SVXLOGPREFIX; 
           $echolog = explode("\n", `grep -a -h "EchoLink QSO" $elogPath`);
    }
           $echolog = array_slice($echolog, -500);
      return $echolog;
}

function getConnectedEcholink($echolog)
{
        $users = Array();
    foreach ($echolog as $ElogLine) {
            //if(strpos($ElogLine,"EchoLink QSO")){
                    //$users = Array();
            //}
        if(strpos($ElogLine, "state changed to CONNECTED")) {
                $lineParts = explode(" ", $ElogLine);
                $t_EL_KeyPos = array_search('QSO', $lineParts)-2;
            if (!in_array(substr($lineParts[$t_EL_Key_Pos], 0, -1), $users)) {
                                array_push($users, trim(substr($lineParts[$t_EL_Key_Pos], 0, -1)));
            }
        }
        if(strpos($ElogLine, "state changed to DISCONNECTED")) {
            $lineParts = explode(" ", $ElogLine);
            $t_EL_Key_Pos = array_search('QSO', $lineParts)-2;
            $call=substr($lineParts[$t_EL_Key_Pos], 0, -1);
            $pos = array_search($call, $users);
            array_splice($users, $pos, 1);
        }
    }
        return $users;
}

// check callsign EchoLink talker TXing form log line
// ### EchoLink talker stop SP2ABC
// ### EchoLink talker start SP2ABC


function getEchoLinkTX()
{
        $logPath = SVXLOGPATH."/".SVXLOGPREFIX;
        $echotxing="";
        $logLine = `egrep -a -h "### EchoLink" $logPath | tail -1`;
    if (strpos($logLine, "### EchoLink talker start")) {
        $echotxing=substr($logLine, strpos($logLine, "start")+6, 12);
        trim($echotxing);
    }
        return $echotxing;
}

function getSVXTGSelect()
{
        $logPath = SVXLOGPATH."/".SVXLOGPREFIX;
        $tgselect="0";
        $logLine = `egrep -a -h "Selecting" $logPath | tail -1`;
    if (strpos($logLine, "TG #")) {
        $tgselect=substr($logLine, strpos($logLine, "#")+1, 12);
    }
        return $tgselect;
}

function getSVXTGTMP()
{
        $logPath = SVXLOGPATH."/".SVXLOGPREFIX;
        $tgselect="0";
        $logLine = `egrep -a -h "emporary monitor" $logPath | tail -1`;
    if ((strpos($logLine, "Add")) || (strpos($logLine, "Refresh"))) {
        $tgselect=substr($logLine, strpos($logLine, "#")+1, 12);
    }
    else {$tgselect=""; 
    }
        return $tgselect;
}

function initModuleArray()
{
    $modules = Array();
    foreach (SVXMODULES as $enabled) {
                $modules[$enabled] = 'Off';
    }
    return $modules;
}

function getActiveModules()
{
    $logLines = array();
    $logPath = SVXLOGPATH."/".SVXLOGPREFIX;
    $logLines = explode("\n", `egrep -a -h "Activating module|Deactivating module" $logPath`);
    $logLines = array_slice($logLines, -500);
    $modules = array();
    foreach ($logLines as $logLine) {
        if(strpos($logLine, "Activating module")) {
                $lineParts = explode(" ", $logLine);
                $t_MOD_KeyPos = array_search('module', $lineParts)+1;
            $modul = substr($lineParts[$t_MOD_KeyPos], 0, -3);
            if (!array_search($modul, $modules)) {
                $modules[$modul] = 'On';
            }
            if (array_search($modul, $modules)) {
                $modules[$modul] = 'On';
            }
        }
        if(strpos($logLine, "Deactivating module")) {
                $lineParts = explode(" ", $logLine);
                $t_MOD_KeyPos = array_search('module', $lineParts)+1;
            $modul = substr($lineParts[$t_MOD_KeyPos], 0, -3);
            $modules[$modul] = 'Off';
        }

    }
        return $modules;
}



//SVXLink log line
//14.06.2021 16:00:00: Tx1: Turning the transmitter ON
//14.06.2021 16:00:44: Tx1: Turning the transmitter OFF
//14.06.2021 16:57:27: RefLogic: Talker start on TG #7: DMR-Bridge
//14.06.2021 16:57:27: RefLogic: Selecting TG #7
//14.06.2021 16:57:27: Transmission starts (TG# 0)
//14.06.2021 16:57:28: Tx1: Turning the transmitter ON
//14.06.2021 16:57:33: Transmission stops (TG# 0)
//14.06.2021 16:57:33: RefLogic: Talker stop on TG #7: DMR-Bridge
//14.06.2021 16:57:33: Tx1: Turning the transmitter OFF

function getHeardList($logLines)
{
    //array_multisort($logLines,SORT_DESC);
    $heardList = array();
        //print_r($logLines);
    foreach ($logLines as $logLine) {
        if(strpos($logLine, "Tx1") || strpos($logLine, "Rx1") || strpos($logLine, ": Talker start on") || strpos($logLine, ": Talker stop on")) {
            if (strpos($logLine, ": Talker stop on")) {
                $calltemp = substr($logLine, strpos($logLine, "TG")+4, 27);
                $callsign = substr($calltemp, strpos($calltemp, ":")+1, 27);
                $callsign = trim($callsign);
                $target = "TG ".trim(get_string_between($logLine, "#", ":"));
                $source = "SVXRef";
                $timestamp = substr($logLine, 0, 19);
                $tx="OFF";
            } 
            if (strpos($logLine, ": Talker start on")) {
                 $calltemp = substr($logLine, strpos($logLine, "TG")+4, 27);
                $callsign = substr($calltemp, strpos($calltemp, ":")+1, 27);
                $callsign = trim($callsign);
                 $target = "TG ".trim(get_string_between($logLine, "#", ":"));
                $source = "SVXRef";
                $timestamp = substr($logLine, 0, 19);
                 $tmss=strtotime($timestamp);
                 $tmst=strtotime('now');
                $diff=$tmst-$tmss;
                if ($diff>300) {
                    $tx="OFF"; 
                } else { $tx="ON";
                }
            } 
            // Callsign should be less than 16 chars long, otherwise it could be errorneous
            if (strlen($callsign) < 16 ) {
                array_push($heardList, array($timestamp, $callsign, $target, $tx, $source));
            }
        }
    }
    return $heardList;
}

function getLastHeard($logLines)
{
    $lastHeard = array();
    $heardCalls = array();
    $heardList = getHeardList($logLines);
    $counter = 0;
    foreach ($heardList as $listElem) {
        if ($listElem[4] == "SVXRef" ) {
            $callUuid = $listElem[1]."#".$listElem[2];
            if(!(array_search($callUuid, $heardCalls) > -1)) {
                array_push($heardCalls, $callUuid);
                array_push($lastHeard, $listElem);
                $counter++;
            }
        }
    }
    return $lastHeard;
}

//14.06.2021 16:57:33: Rx1: The squelch is OPEN (2.07523)
//14.06.2021 16:57:33: Rx1: The squelch is CLOSED (4.43843)
//14.06.2021 16:57:33: Tx1: Turning the transmitter ON
//14.06.2021 16:57:33: Tx1: Turning the transmitter OFF

function getTXInfo()
{
    $logPath = SVXLOGPATH."/".SVXLOGPREFIX;
    if (file_exists(SVXLOGPATH."/".SVXLOGPREFIX)) { $txstat = exec('egrep -a -h "Tx1: Turning the transmitter|squelch is|squelch for" '.$logPath.' | tail -1');
    }
    if (strpos($txstat, 'ON') !== false) {
                // entferne Zeitcheck von 250s, macht nur Probleme
        // $timestamp = substr($txstat, 0, 19);
                // $tmss=strtotime($timestamp);
                // $tmst=strtotime('now');
        // $diff=$tmst-$tmss;
        // if ($diff>250) { $txs="<td style=\"background:#c3e5cc;\"><div style=\"margin-top:2px;margin-bottom:2px;color:#464646;font-weight:bold;\">TX OFF</div></td></tr>\n"; }
        // else { 
        $txs="<tr><td style=\"background:#ff6600;color:white;\"><div style=\"margin-top:2px;margin-bottom:2px;font-weight:bold;\">TX ON</div></td></tr>\n"; 
        //    }
        return $txs;
    }
    elseif (strpos($txstat, 'OPEN') !== false) { return "<tr><td style=\"background:#4aa361;color:black;\"><div style=\"margin-top:2px;margin-bottom:2px;font-weight:bold;\">RX-SQL Open - TX ON</div></td></tr>\n"; 
    }
    elseif (strpos($txstat, 'CLOSED') !== false) { return "<tr><td style=\"background:#ff6600;color:white;\"><div style=\"margin-top:2px;margin-bottom:2px;font-weight:bold;\">RX-SQL Closed - TX ON</div></td></tr>\n"; 
    }
    else { return "<td style=\"background:#c3e5cc;\"><div style=\"margin-top:2px;margin-bottom:2px;color:#464646;font-weight:bold;\">TX OFF</div></td></tr>\n"; 
    }
}

function getConfigItem($section, $key, $configs)
{
    // retrieves the corresponding config-entry within a [section]
    $sectionpos = array_search("[" . $section . "]", $configs) + 1;
    $len = count($configs);
    while(startsWith($configs[$sectionpos], $key."=") === false && $sectionpos <= ($len) ) {
        if (startsWith($configs[$sectionpos], "[")) {
            return null;
        }
        $sectionpos++;
    }

    return substr($configs[$sectionpos], strlen($key) + 1);
}

function get_string_between($string, $start, $end)
{
    $string = " ".$string;
    $ini = strpos($string, $start);
    if ($ini == 0) {
        return "";
    }
    $ini += strlen($start);   
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

// we need to convert the German date format to YYYY.MM.DD for sorting the LH list
// otherwise we have a sort problem if the month was changing, e.g. 31.5. to 1.6.
function sort_datum_deu($logdata_array)
{
    // intermediate array for sorting
    $sort_array = array();
    // return array from function call
    $sort_result = array();
    // we change the date format to YYYY.MM.DD
    foreach ($logdata_array as $line) {
        $values = explode(": ", $line);
        $date_deu = date_create_from_format('d.m.Y H:i:s', $values[0]);
        $values[0] = date_format($date_deu, 'Y.m.d H:i:s');
        $sort_array[] = implode(": ", $values);
    }
    // sorting the array date and time descending after change date format to YYYY.MM.DD like 2023.6.1
    array_multisort($sort_array, SORT_DESC);
    // change the date format back to German syntax 1.6.2023 after sorting descendig
    foreach ($sort_array as $line) {
        $values = explode(": ", $line);
        $date_engl = date_create_from_format('Y.m.d H:i:s', $values[0]);
        $values[0] = date_format($date_engl, 'd.m.Y H:i:s');
        $sort_result[] = implode(": ", $values);
    }
    // return the whole array after sorting
    return $sort_result;
}

$logLinesSVX = getSVXLog();

// check if using German date format like 1.1.2023 in svxlink.conf GLOBAL/TIMESTAMP_FORMAT="%d.%m.%Y %H:%M:%S"
if ($svxconfig['GLOBAL']['TIMESTAMP_FORMAT'] == "%d.%m.%Y %H:%M:%S") {
      $reverseLogLinesSVX = sort_datum_deu($logLinesSVX);
} else {
    // if other time format we leave it like it is
    $reverseLogLinesSVX = $logLinesSVX;
    array_multisort($reverseLogLinesSVX, SORT_DESC);
}

$lastHeard = getLastHeard($reverseLogLinesSVX);

?>
