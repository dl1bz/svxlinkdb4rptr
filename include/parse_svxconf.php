<?php
// Report all errors except E_NOTICE
// error_reporting(E_ALL & ~E_NOTICE);
// disable all.

if ((defined('SVXCONFIG')) && (defined('SVXCONFPATH')) ) { $svxConfigFile = SVXCONFPATH."/".SVXCONFIG ; 
}
else { $svxConfigFile = trim(substr(shell_exec("grep CFGFILE /etc/default/svxlink"), strrpos(shell_exec("grep CFGFILE /etc/default/svxlink"), "=")+1)); 
}
if (fopen($svxConfigFile, 'r')) { $svxconfig = parse_ini_file($svxConfigFile, true, INI_SCANNER_RAW);
     $check_logics = explode(",", $svxconfig['GLOBAL']['LOGICS']);
    foreach ($check_logics as $logic_key) {

        if (strpos($logic_key, 'ReflectorLogic') !== false) {
            $reflector_active=1;
            // additional variables need to define in svxlink.conf in stanza [ReflectorLogic]: API, FMNET
            // FMNET - Name of FM-Network
            // API - URI for access the status of SVXReflector you are connected
            if (isset($svxconfig['ReflectorLogic']['CALLSIGN'])) { $callsign = $svxconfig['ReflectorLogic']['CALLSIGN']; 
            }
            if (isset($svxconfig['ReflectorLogic']['API'])) { $refApi = $svxconfig['ReflectorLogic']['API']; 
            }
            if (isset($svxconfig['ReflectorLogic']['FMNET'])) { $fmnetwork =$svxconfig['ReflectorLogic']['FMNET']; 
            }
            if (isset($svxconfig['ReflectorLogic']['NODE_INFO_FILE'])) {
                $nodeInfoFile = $svxconfig['ReflectorLogic']['NODE_INFO_FILE'];
                if (!is_readable($nodeInfoFile)) { $nodeInfoFile="none"; 
                }
            }
        }  else {
             $refApi="";
             $fmnetwork="no active Reflector";
             $nodeInfoFile="none";
        }

          // check if we are a repeater
        if (strpos($logic_key, 'RepeaterLogic') !== false) {
            if (!isset($callsign)) { $callsign = $svxconfig['RepeaterLogic']['CALLSIGN']; 
            }
              // if we work with CTCSS please set REPORT_CTCSS with correct value in svxlink.conf
            if (isset($svxconfig['RepeaterLogic']['REPORT_CTCSS'])) { $ctcss = $svxconfig['RepeaterLogic']['REPORT_CTCSS']; 
            } 
            else { $ctcss = 0; 
            }
              $system_type="IS_DUPLEX"; // if repeater
            if (isset($svxconfig['RepeaterLogic']['DTMF_CTRL_PTY'])) { $dtmfctrl = $svxconfig['RepeaterLogic']['DTMF_CTRL_PTY']; 
            }
            else { $dtmfctrl="/dev/null"; 
            }
        }

          // check if we are a simplex system
        if (strpos($logic_key, 'SimplexLogic') !== false) {
            if (!isset($callsign)) { $callsign = $svxconfig['SimplexLogic']['CALLSIGN']; 
            }
            // if we work with CTCSS please set REPORT_CTCSS with correct value in svxlink.conf
            if (isset($svxconfig['SimplexLogic']['REPORT_CTCSS'])) { $ctcss = $svxconfig['SimplexLogic']['REPORT_CTCSS']; 
            }
            else { $ctcss = 0; 
            }
            $system_type="IS_SIMPLEX"; // if simplex
            if (isset($svxconfig['SimplexLogic']['DTMF_CTRL_PTY'])) { $dtmfctrl = $svxconfig['SimplexLogic']['DTMF_CTRL_PTY']; 
            }
            else { $dtmfctrl="/dev/null"; 
            }
        }
    }
}
else { $callsign="N0CALL";
       $fmnetwork="no Network";
       $refApi="";
       $dtmfctrl="/dev/null";
       $nodeInfoFile="none";
}
?>
