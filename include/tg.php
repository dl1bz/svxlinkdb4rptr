<?php
include_once __DIR__.'/config.php';         
include_once __DIR__.'/tools.php';        
include_once __DIR__.'/functions.php';    

if (file_exists(__DIR__.'/tgdb.inc.php')) {
   include_once __DIR__.'/tgdb.inc.php'; }
else {
   include_once __DIR__.'/tgdb.php'; }


   if (isset($fmnetwork))
   {
      $tg_counter = count($tgdb_array);
      echo "<span style=\"font-weight: bold;font-size:14px;\">:: ".$tg_counter." Talkgroups @ SVXReflector ".$fmnetwork." ::";
   } else
   {
      echo "<span style=\"font-weight: bold;font-size:14px;\">:: Talkgroup List ::";
   }
?>
</span>

<fieldset style=" width:620px;box-shadow:0 0 10px #999;background-color:#e8e8e8e8;margin-top:10px;margin-left:0px;margin-right:0px;font-size:12px;border-top-left-radius: 10px; border-top-right-radius: 10px;border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
  <form method="post">

<?php
echo "<table style=\"margin-top:3px;\">";
echo "<tr height=25px>";
echo "<th width=100px>TG #</th>";
echo "<th>TG Name</th>";
echo "</tr>";

foreach ($tgdb_array as $tg => $tgname)
{ 
		echo "<td align=\"center\">&nbsp;<span style=\"color:#b5651d;font-weight:bold;\">$tg</span></td>";
		echo "<td style=\"font-weight:bold;color:#464646;\">&nbsp;<b>".$tgname."</b></td>";
		echo"</tr>\n";
};

echo "</table>";
?>

</form>
</fieldset>
