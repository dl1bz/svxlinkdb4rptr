<p style="padding-right: 5px; text-align: right; color: #000000;"> 
	<a href="/" style="color: #0000ff; font-family: 'Oswald', sans-serif; font-size: 14pt;">Dashboard</a> |
	<a href="/tg.php" style="color: #0000ff; font-family: 'Oswald', sans-serif; font-size: 14pt;">Talk Groups</a> |
	<a href="/node.php" style="color: #0000ff; font-family: 'Oswald', sans-serif;font-size: 14pt;">Nodes</a> |

<?php
$ip = isset($_SERVER['HTTP_CLIENT_IP'])?$_SERVER['HTTP_CLIENT_IP']:isset($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR'];
$net1= cidr_match($ip,"192.168.0.0/16");
$net2= cidr_match($ip,"172.16.0.0/12");
$net3= cidr_match($ip,"127.0.0.0/8");
$net4= cidr_match($ip,"10.0.0.0/8");

if ($net1 == TRUE || $net2 == TRUE || $net3 == TRUE || $net4 == TRUE || FULLACCESS_OUTSIDE == 1) {
	echo "<a href=\"/nodeInfo.php\" style=\"color: #0000ff; font-family: 'Oswald', sans-serif; font-size: 14pt;\"> NodeInfo</a> |";
	echo "<a href=\"/dtmf.php\" style=\"color: #0000ff; font-family: 'Oswald', sans-serif; font-size: 14pt;\"> DTMF</a> |";
	echo "<a href=\"/log.php\" style=\"color: #0000ff; font-family: 'Oswald', sans-serif; font-size: 14pt;\"> Log</a> |" ;
	echo "<a href=\"/power.php\" style=\"color: #0000ff;font-family: 'Oswald', sans-serif; font-size: 14pt;\"> Power</a>" ;
}
?>
</p>
