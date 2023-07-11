<?php
$progname = basename($_SERVER['SCRIPT_FILENAME'], ".php");
require_once 'include/config.php';
require_once 'include/tools.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" lang="en">
<head>
    <meta name="robots" content="index" />
    <meta name="robots" content="follow" />
    <meta name="language" content="English" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="generator" content="SVXLink" />
    <meta name="Author" content="SP2ONG, SP0DZ" />
    <meta name="Description" content="Dashboard for SVXLink by SP2ONG, SP0DZ" />
    <meta name="KeyWords" content="SVXLink, SP2ONG, SP0DZ" />
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="pragma" content="no-cache" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Fredoka+One&family=Tourney&family=Oswald&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="images/favicon.ico" sizes="16x16 32x32" type="image/png">

<?php echo ("<title>" . $callsign ." ". $fmnetwork . " Dashboard</title>"); ?>

<?php require_once "include/browserdetect.php"; ?>
    <script type="text/javascript" src="scripts/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/functions.js"></script>
    <script type="text/javascript" src="scripts/pcm-player.min.js"></script>
    <script type="text/javascript">
      $.ajaxSetup({ cache: false });
    </script>
    <link href="css/featherlight.css" type="text/css" rel="stylesheet" />
    <script src="scripts/featherlight.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body style="background-color: #e1e1e1;font: 11pt arial, sans-serif;">

<?php require "./include/top_header.php" ?>

</div></div>
</div>

<?php require_once __DIR__."/include/top_menu.php"; ?>

<div class="content"><center>
<div style="margin-top:8px;">
</div></center>
</div>
<?php
if (MENUBUTTON=="TOP") {
    include_once __DIR__."/include/buttons.php"; 
}
?>
<?php
    echo '<table style="margin-bottom:0px;border:0; border-collapse:collapse; cellspacing:0; cellpadding:0; background-color:#f1f1f1;"><tr style="border:none;background-color:#f1f1f1;">';
    echo '<td width="200px" valign="top" class="hide" style="height:auto;border:0;background-color:#f1f1f1;">';
    echo '<div class="nav" style="margin-bottom:1px;margin-top:1px;">'."\n";

    echo '<script type="text/javascript">'."\n";
    echo 'function reloadStatusInfo(){'."\n";
    echo '  $("#statusInfo").load("include/status.php",function(){ setTimeout(reloadStatusInfo,3000) });'."\n";
    echo '}'."\n";
    echo 'setTimeout(reloadStatusInfo,3000);'."\n";
    echo '$(window).trigger(\'resize\');'."\n";
    echo '</script>'."\n";
    echo '<div id="statusInfo" style="margin-bottom:30px;">'."\n";
    require 'include/status.php';
    echo '</div>'."\n";
    echo '</div>'."\n";
    echo '</td>'."\n";

    echo '<td valign="middle"  style="height:495px; width=620px; text-align: center; border:none;  background-color:#f1f1f1;">';
    echo '<iframe src="/log"  style="width:615px; height:490px"></iframe>';
    echo '</td>';
?>
</tr></table>
<?php
    echo '<div class="content2">'."\n";
    echo '<script type="text/javascript">'."\n";
    echo 'function reloadSysInfo(){'."\n";
    echo '  $("#sysInfo").load("include/system.php",function(){ setTimeout(reloadSysInfo,15000) });'."\n";
    echo '}'."\n";
    echo 'setTimeout(reloadSysInfo,15000);'."\n";
    echo '$(window).trigger(\'resize\');'."\n";
    echo '</script>'."\n";
    echo '<div id="sysInfo">'."\n";
    require 'include/system.php';
    echo '</div>'."\n";
    echo '</div>'."\n";
?>
<?php
if (MENUBUTTON=="BOTTOM") {
    include_once __DIR__."/include/buttons.php"; 
}
?>
<?php require "./include/footer.php" ?>
</div>
</div>
</fieldset>
<br>
</body>
</html>
