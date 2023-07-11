<?php
$progname = basename($_SERVER['SCRIPT_FILENAME'], ".php");

// pre-check environment

echo '<pre>';

echo 'Running '.$progname.'.php for Systemcheck SVXLINK Dashboard for Repeater by Heiko/DL1BZ<BR><BR>';

echo 'Webserver: '.$_SERVER['SERVER_SOFTWARE'].'<BR>';
echo 'Root Document Folder of httpd: '.$_SERVER['DOCUMENT_ROOT'].'<BR>';

echo 'PHP-Version is: '.phpversion().'<BR>';

echo '<br>STEP 1:<br>';

if (DIRECTORY_SEPARATOR !== '/') { die("ERROR: This SVXLINK Dashboard runs only with UNIX-like OS (Linux,BSD,macOS)...exiting"); 
}
else { echo 'Looks like a UNIX-style system...OK'; 
}

echo '<BR><BR>STEP 2:<BR>';

if (!file_exists('/etc/default/svxlink') ) { die("ERROR: File /etc/default/svxlink not found => SVXLINK not or not complete installed...exiting"); 
}
else { echo '/etc/default/svxlink found...OK'; 
}

echo '<BR><BR>STEP 3:<BR>';

if (!fopen('/etc/default/svxlink', 'r') ) { die("ERROR: File /etc/default/svxlink not readable => check permissions of /etc/default/svxlink...exiting"); 
}
else { echo '/etc/default/svxlink is readable...OK'; 
}

echo '<BR><BR>STEP 4:<BR>';
$svxConfigFile = trim(substr(shell_exec("grep CFGFILE /etc/default/svxlink"), strrpos(shell_exec("grep CFGFILE /etc/default/svxlink"), "=")+1));
if (!file_exists($svxConfigFile) ) { die("ERROR: File ".$svxConfigFile." not found => SVXLINK not or not complete installed...exiting"); 
}
else { echo $svxConfigFile.' found...OK'; 
}

echo '<BR><BR>STEP 5:<BR>';
if (!fopen($svxConfigFile, 'r') ) { die("ERROR: File ".$svxConfigFile."not readable => check permissions of ".$svxConfigFile."...exiting"); 
}
else { echo $svxConfigFile." is readable...OK"; 
}

echo '<BR><BR>STEP 6:<BR>';
$svxconfig = parse_ini_file($svxConfigFile, true, INI_SCANNER_RAW);
if ($svxconfig !== false ) { echo 'Parsing '.$svxConfigFile.':<br>'; print_r($svxconfig); 
}
else { echo "ERROR:".$svxConfigFile." can NOT be parsed...check the content of ".$svxConfigFile." for syntax errors...exiting"; 
}

echo '<BR><BR>STEP 7:<BR>';
if  (!file_exists('include/config.inc.php') ) { die("ERROR: File include/config.inc.php not found => SVXLINK Dashboard not or not complete installed...exiting"); 
}
else { echo 'include/config.inc.php found OK'; 
}

echo '</PRE>';
?>
