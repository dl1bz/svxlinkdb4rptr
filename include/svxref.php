<?php
include_once __DIR__.'/config.php';          
include_once __DIR__.'/tools.php';       
include_once __DIR__.'/functions.php';    

$url=URLSVXRAPI;
// echo $url;
if ($url!="") {
//  Initiate curl
$ch = curl_init();
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// fix SSL verification
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);
// Execute
$result=curl_exec($ch);
// Closing
curl_close($ch);
$nodes = json_decode($result, true);
 } else { $nodes="";}
if ($nodes!="") {
if(array_key_exists('Name', $nodes)) {
    $name=$nodes['Name'];
} else { $name="";}
?>
<!--

<span style="font-weight: bold;font-size:14px;">SVXReflector Nodes</span>

<br>

-->
<fieldset style="width:620px;border:rgb(255, 156, 42) 2px groove; box-shadow: 5px 5px 20px rgb(255, 236, 214); background-color:#f1f1f1;margin-left:0px;margin-right:0px;border-top-left-radius: 10px; border-top-right-radius: 10px;border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
<div style="padding:0px;width:620px;background-image: linear-gradient(to bottom, #e9e9e9 50%, #bcbaba 100%);border-radius: 10px;-moz-border-radius:10px;-webkit-border-radius:10px;border: 1px solid LightGrey;margin-left:0px; margin-right:0px;margin-top:4px;margin-bottom:0px;line-height:1.6;white-space:normal;">
<center>
<p id="rcornerh" style="margin-bottom:35px;"><span style="font-weight: 580;font-size:18px;">Connected Nodes to: </span><span style="font-weight: 580;font-size:16px;color:red;"><?php echo FMNETWORK; ?></span><br>
<?php
$count=0;
foreach ($nodes['nodes'] as $key =>$value)
 { $count=$count+1;}
echo "<span style=\"line-height:1.8;font-weight:600;font-size:16px;color:black;\">Number of connected nodes:&nbsp;&nbsp;</span>
      <span style=\"line-height:1.8;font-weight:600;font-size:15px;color:brown;\">";
echo $count;
echo "</span></p>";
?>
</center>
<div style="text-align:left;font:9pt arial,sans-serif;margin-left:25px; margin-right:25px;margin-top:15px;margin-bottom:30px;line-height:1.6;white-space:normal;">
<center>
<?php
foreach ($nodes['nodes'] as $key =>$value)
 { 
   echo "<span class=\"tooltip\" style=\"border-bottom: 1px dotted white;\">";
   if (isset($nodes['nodes'][$key]['isTalker']) && ($nodes['nodes'][$key]['isTalker'] ==1)) {
   echo "<span class=\"node\" style=\"color:blue\"><img src=images/talk.gif height=12 alt='TXing' title='TXing' style=\"vertical-align: text-top;\">&nbsp;&nbsp;".$key." (".trim($nodes['nodes'][$key]['tg']).")<span class=\"tooltiptext\" style=\"top:100%;left:25%;margin-left:-50%;max-width:200px;width:195px;word-wrap: break-word;white-space: pre-wrap; padding: 3px 0;\">"; }
   else {
   echo "<span class=\"node\" style=\"color:black\">".$key."<span class=\"tooltiptext\" style=\"top:100%;left:25%;margin-left:-50%;max-width:200px;width:195px;word-wrap: break-word;white-space: pre-wrap; padding: 3px 0;\">"; }
   if ($nodes['nodes'][$key]['nodeLocation']!=""){
   echo "&nbsp;&nbsp;Location:<br><span style=\"color:gold;margin-left:10px;margin-right:10px;\"><b>";
   if (isset($nodes['nodes'][$key]['TXFREQ'])) {
   echo trim($nodes['nodes'][$key]['nodeLocation'])."</b><br>TX: ".trim($nodes['nodes'][$key]['TXFREQ'])." MHz";

   if (isset($nodes['nodes'][$key]['CTCSS']) && (strpos($nodes['nodes'][$key]['CTCSS'],"0") !== 0) && (strpos(strtoupper($nodes['nodes'][$key]['CTCSS']),"NONE") !== 0) ) {
   $fq_CTCSS = str_replace(',','.',$nodes['nodes'][$key]['CTCSS']);
   $SQL_mode = "CTCSS :";
   if ((strpos(strtoupper($fq_CTCSS),"HZ") == false) && (strpos(strtoupper(trim($fq_CTCSS)),"D") !== 0))  { $fq_CTCSS .= " Hz"; }
   if (strpos(trim($fq_CTCSS),"D") === 0) { $SQL_mode = "DCS :"; }
   echo "<br>".$SQL_mode." ".trim($fq_CTCSS)."" ; }
   echo "</span><br>"; }
   else {
   echo trim($nodes['nodes'][$key]['nodeLocation'])."</b></span><br>"; }
      }
   if (isset($nodes['nodes'][$key]['DefaultTG'])) {
   echo "<span style=\"color:white;margin-left:10px;margin-right:10px;\">Default TG:</span>";
   echo "<span style=\"color:gold;margin-left:10px;margin-right:10px;\">".trim($nodes['nodes'][$key]['DefaultTG'])."</span><br>"; }

   echo "<span style=\"color:white;margin-left:10px;margin-right:10px;\">Active TG:</span>";
   if ($nodes['nodes'][$key]['tg'] !== 0) {
   echo "<span style=\"color:gold;margin-left:10px;margin-right:10px;\">".trim($nodes['nodes'][$key]['tg'])."</span><br>"; }
   else {
   echo "<span style=\"color:white;margin-left:10px;margin-right:10px;\"> Idle</span><br>"; }
   echo "&nbsp;&nbsp;Monitored TGs:<span style='color:yellow;margin-left:10px;margin-right:10px;'>";
   echo "<center>";
   echo "<table style=\"width:150px\" >";
   echo"<tr height=15px>";
	echo "<th >TG#</th>";
   echo"</tr>";
   foreach ($nodes['nodes'][$key]['monitoredTGs'] as $item)
     {  
	
	echo "<tr><td align=\"center\">";
	echo "<span style=\"color:#b5651d;font-weight:bold; padding:1px 10px;\">$item</span>";
	echo "</td></Tr>";
}
echo "</table>";
echo "<br></center>";
   echo "</span></span></span></span>";
 }
?>
</center>
</div><br></div></fieldset>
<?php 
}
?>
