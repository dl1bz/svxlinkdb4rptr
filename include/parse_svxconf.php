<?php
// Report all errors except E_NOTICE
// error_reporting(E_ALL & ~E_NOTICE);
// disable all.

if ( (defined('SVXCONFIG')) && (defined('SVXCONFPATH')) ) { $svxConfigFile = SVXCONFPATH."/".SVXCONFIG ; }
else { $svxConfigFile = trim(substr(shell_exec("grep CFGFILE /etc/default/svxlink"), strrpos(shell_exec("grep CFGFILE /etc/default/svxlink"), "=")+1)); }
    if (fopen($svxConfigFile,'r'))
       { $svxconfig = parse_ini_file($svxConfigFile,true,INI_SCANNER_RAW);
         if (isset($svxconfig['ReflectorLogic']['CALLSIGN'])) { $callsign = $svxconfig['ReflectorLogic']['CALLSIGN']; }
         else { $callsign="N0CALL"; }
         // $callsign = $svxconfig['ReflectorLogic']['CALLSIGN'];
         // check if we are a repeater or a simplex system
         $check_logics = explode(",",$svxconfig['GLOBAL']['LOGICS']);
         foreach ($check_logics as $logic_key) {

            if (strpos($logic_key, 'RepeaterLogic') !== false) {
              // if we work with CTCSS please set REPORT_CTCSS with correct value in svxlink.conf
              if (isset($svxconfig['RepeaterLogic']['REPORT_CTCSS'])) { $ctcss = $svxconfig['RepeaterLogic']['REPORT_CTCSS']; } 
              else { $ctcss = 0; }
              // $ctcss = $svxconfig['RepeaterLogic']['REPORT_CTCSS'];
              $system_type="IS_DUPLEX"; // if repeater
              if (isset($svxconfig['RepeaterLogic']['REPORT_CTCSS'])) { $dtmfctrl = $svxconfig['RepeaterLogic']['DTMF_CTRL_PTY']; }
              else { $dtmfctrl="/dev/null"; }
              // $dtmfctrl = $svxconfig['RepeaterLogic']['DTMF_CTRL_PTY'];
            }

            if (strpos($logic_key, 'SimplexLogic') !== false) {
              // if we work with CTCSS please set REPORT_CTCSS with correct value in svxlink.conf
              if (isset($svxconfig['SimplexLogic']['REPORT_CTCSS'])) { $ctcss = $svxconfig['SimplexLogic']['REPORT_CTCSS']; }
              else { $ctcss = 0; }
              // $ctcss = $svxconfig['SimplexLogic']['REPORT_CTCSS'];
              $system_type="IS_SIMPLEX"; // if simplex
              if (isset($svxconfig['SimplexLogic']['REPORT_CTCSS'])) { $dtmfctrl = $svxconfig['SimplexLogic']['DTMF_CTRL_PTY']; }
              else { $dtmfctrl="/dev/null"; }
              // $dtmfctrl = $svxconfig['SimplexLogic']['DTMF_CTRL_PTY'];
            }
         }
         // additional variables need to define in svxlink.conf in stanza [ReflectorLogic]: API, FMNET
         // FMNET - Name of FM-Network
         // API - URI for access the status of SVXReflector you are connected
         // TG_URI ??? I don't know...
         if (isset($svxconfig['ReflectorLogic']['API'])) { $refApi = $svxconfig['ReflectorLogic']['API']; }
         else { $refApi=""; }
         // $refApi = $svxconfig['ReflectorLogic']['API'];
         if (isset($svxconfig['ReflectorLogic']['FMNET'])) { $fmnetwork =$svxconfig['ReflectorLogic']['FMNET']; }
         else { $fmnetwork="no registered"; }
         // $fmnetwork =$svxconfig['ReflectorLogic']['FMNET'];
         $nodeInfoFile = $svxconfig['ReflectorLogic']['NODE_INFO_FILE'];
       }
else { $callsign="N0CALL";
       $fmnetwork="no registered";
       $refApi="";
     }
?>
