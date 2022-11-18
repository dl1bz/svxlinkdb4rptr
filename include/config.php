<?php
// set correct Path and file name of configuration
define("SVXCONFPATH", "/etc/svxlink");
define("SVXCONFIG", "svxlink.conf");

// set correct Path and file name of log
define("SVXLOGPATH", "/var/log");
define("SVXLOGPREFIX", "svxlink");

// header lines for information
define("HEADER_CAT","FM-Relais");
define("HEADER_QTH","Somewhere JO01AA 500m NHN");
define("HEADER_QRG","439.000 MHz");
define("HEADER_SYSOP","Sysop: DL1ABC");
define("FMNETWORK_EXTRA","");
// define("EL_NODE_NR","123456");

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
// Button keys define: description button, DTMF command or command, color of button
//
// DTMF keys
// syntax: 'KEY number,'Description','DTMF code','color button' 
//
define("KEY1", array(' Refl ON ','*D1#','green'));
define("KEY2", array(' TG7 ','*917#','orange'));
define("KEY3", array(' TG1 ','*911#','orange'));
define("KEY4", array(' TG 777 ','*91777#','orange'));
define("KEY5", array(' EL-SP ','*D2#','purple'));
// additional DTMF keys
define("KEY6", array(' EL-TUD ','*D3#','purple'));
define("KEY7", array(' D7 ','D7#','purple'));
define("KEY8", array(' D8 ','D8#','purple'));
//
// Set SHOWPTT to TRUE if you want use microphone connected
// to sound card and use buttons on dashboard PTT ON & PTT OFF
// Set SHOWPTT to FALSE to disable display PTT buttons
// In most cases you can switch to FALSE
//define("SHOWPTT","TRUE");
//
define("KEY9", array(' ECHO ','D9#','blue'));
define("KEY10", array(' Refl OFF ','*D0#','red'));
//
?>
