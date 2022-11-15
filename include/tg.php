<?php
include_once __DIR__.'/config.php';         
include_once __DIR__.'/tools.php';        
include_once __DIR__.'/functions.php';    
include_once __DIR__.'/tgdb.php';    
?>

<span style="font-weight: bold;font-size:14px;">Description of some Talkgroups</span>
<fieldset style=" width:620px;box-shadow:0 0 10px #999;background-color:#e8e8e8e8;margin-top:10px;margin-left:0px;margin-right:0px;font-size:12px;border-top-left-radius: 10px; border-top-right-radius: 10px;border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
  <form method="post">
  <table style="margin-top:3px;">
    <tr height=25px>
      <th width=100px>TG #</th>
      <th>TG Name</th>
    </tr>

<?php
foreach ($tgdb_array as $tg => $tgname)
{ 

		echo "<td align=\"center\">&nbsp;<span style=\"color:#b5651d;font-weight:bold;\">$tg</span></td>";
		echo "<td style=\"font-weight:bold;color:#464646;\">&nbsp;<b>".$tgname."</b></td>";
		echo"</tr>\n";
};

?>
  </table>
</form>
</fieldset>
