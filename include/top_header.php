<center>
<fieldset style="box-shadow:0 0 10px #999; background-color:#f1f1f1; width:0px;margin-top:15px;margin-left:0px;margin-right:5px;font-size:13px;border-top-left-radius: 10px; border-top-right-radius: 10px;border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
<div class="container"> 
<div class="header">
<div class="parent">
    <div class="img" style="padding-left:30px"><img src="images/tower-rpt.png" /></div>
    <div class="text"style="padding-right:30px">
<center><p style="margin-top:5px;margin-bottom:0px;">
<span style="font-size: 24px;letter-spacing:4px;font-family: &quot;Fredoka One&quot;, sans-serif;font-weight:500;color:DarkOrange">

<?php 
if ($ctcss >= 67) {
echo $callsign," ",HEADER_CAT," ",HEADER_QTH,"<br>",HEADER_QRG," CTCSS ",$ctcss,"Hz ",HEADER_SYSOP; }
// echo $callsign," ",$dtmfctrl; }
else {
echo $callsign," ",HEADER_CAT," ",HEADER_QTH,"<br>",HEADER_QRG," ",HEADER_SYSOP; }
?>

</span>
<p style="margin-top:0px;margin-bottom:0px;">

<span style="font-size: 20px;font-family: 'Architects Daughter', 'Helvetica Neue', Helvetica, Arial, sans-serif;letter-spacing: 3px;font-weight: 600;background: #3083b8;">
<?php 
if (FMNETWORK_EXTRA !== "") {
echo FMNETWORK_EXTRA." & ".$fmnetwork;
} else {
echo $fmnetwork;
}
?></span>
</p></center>
