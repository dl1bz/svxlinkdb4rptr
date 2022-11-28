<?php

if ( file_exists(__DIR__.'/config.inc.php') ) { include_once __DIR__.'/config.inc.php'; }
else {
// header lines for information
define("HEADER_CAT","FM-Relais");
define("HEADER_QTH","Somewhere JO01AA 500m NHN");
define("HEADER_QRG","439.000 MHz");
define("HEADER_SYSOP","Sysop: DL1ABC");
define("FMNETWORK_EXTRA","");
// define("EL_NODE_NR","123456");
//
// Button keys define: description button, DTMF command or command, color of button
//
// DTMF keys
// syntax: 'KEY number,'Description','DTMF code','color button'.
//
define("KEY1", array(' D1 ','*D1#','green'));
define("KEY2", array(' D2 ','*D2#','orange'));
define("KEY3", array(' D3 ','*D3#','orange'));
define("KEY4", array(' D4 ','*D4#','orange'));
define("KEY5", array(' D5', '*D5#','purple'));
define("KEY6", array(' D6 ','*D6#','purple'));
define("KEY7", array(' D7 ','*D7#','purple'));
define("KEY8", array(' D8 ','*D8#','blue'));
define("KEY9", array(' D9 ','*D9#','blue'));
define("KEY10", array(' D10 ','*D10#','red'));
// additional DTMF keys
define("KEY11", array(' D11 ','*D11#','green'));
define("KEY12", array(' D12 ','*D12#','orange'));
define("KEY13", array(' D13 ','*D13#','orange'));
define("KEY14", array(' D14 ','*D14#','orange'));
define("KEY15", array(' D15 ','*D15#','purple'));
define("KEY16", array(' D16 ','*D16#','purple'));
define("KEY17", array(' D17 ','*D17#','orange'));
define("KEY18", array(' D18 ','*D18#','blue'));
define("KEY19", array(' D19 ','*D19#','blue'));
define("KEY20", array(' D20 ','*D20#','red'));
}

$t_svxConfigFile = trim(substr(shell_exec("grep CFGFILE /etc/default/svxlink"), strrpos(shell_exec("grep CFGFILE /etc/default/svxlink"), "=")+1));
$t_svxLogFile = trim(substr(shell_exec("grep LOGFILE /etc/default/svxlink"), strrpos(shell_exec("grep LOGFILE /etc/default/svxlink"), "=")+1));
define("SVXCONFPATH", substr($t_svxConfigFile,0, strrpos($t_svxConfigFile,"/")));
define("SVXCONFIG", substr($t_svxConfigFile, strrpos($t_svxConfigFile,"/")+1));
define("SVXLOGPATH", substr($t_svxLogFile,0, strrpos($t_svxLogFile,"/")));
define("SVXLOGPREFIX", substr($t_svxLogFile, strrpos($t_svxLogFile,"/")+1));

include_once 'parse_svxconf.php';

error_reporting(0);

// Define name of your FM Network
define("FMNETWORK", $fmnetwork);
//
// Select only one URL for SVXReflector API to get connected Nodes
//
// set SVXReflector API URL from svxlink.conf
define("URLSVXRAPI", $refApi);
//
// Empty address API do not show connected nodes to svxreflector 
// define("URLSVXRAPI", "");
//
// Put url address to your svxreflector wihc offer information of status
// define("URLSVXRAPI", "https://status.thueringen.link");
//
//
// Orange Pi Zero LTS version requires CPU_TEMP_OFFSET value 30 
// to display CPU TEMPERATURE correctly
define("CPU_TEMP_OFFSET","0");
//
// Define where is located menu wit buttons TOP or BOTTOM
define("MENUBUTTON", "BOTTOM");
//
// Set SHOWPTT to TRUE if you want use microphone connected
// to sound card and use buttons on dashboard PTT ON & PTT OFF
// Set SHOWPTT to FALSE to disable display PTT buttons
// In most cases you can switch to FALSE
// define("SHOWPTT","TRUE"); 
?>
