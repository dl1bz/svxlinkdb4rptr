<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Audio Peak Meter</title>
    <meta name="Author" content="Waldek SP2ONG" />
    <meta name="Description" content="Audio Test Peak Meter for SVXLink by SP2ONG 2022" />
    <meta name="KeyWords" content="SVXLink, SVXRelector,SP2ONG" />
    <link href="/css/css.php" type="text/css" rel="stylesheet" />
<style type="text/css">

body {
  background-color: #eee;
  font-size: 18px;
  font-family: Arial;
  font-weight: 300;
  margin: 2em auto;
  max-width: 40em;
  line-height: 1.5;
  color: #444;
  padding: 0 0.5em;
}
h1, h2, h3 {
  line-height: 1.2;
}
a {
  color: #607d8b;
}
.highlighter-rouge {
  background-color: #fff;
  border: 1px solid #ccc;
  border-radius: .2em;
  font-size: .8em;
  overflow-x: auto;
  padding: .2em .4em;
}
pre {
  margin: 0;
  padding: .6em;
  overflow-x: auto;
}

#player {
    position:relative;
    width:205px;
    overflow: hidden;
    direction: ltl;
}

textarea {
    background-color: #111;
    border: 1px solid #000;
    color: #ffffff;
    padding: 1px;
    font-family: courier new;
    font-size:10px;
}




</style>
</head>
<body style="background-color: #e1e1e1;font: 11pt arial, sans-serif;">
<center>
<fieldset style="border:#3083b8 2px groove;box-shadow:0 0 10px #999; background-color:#f1f1f1; width:555px;margin-top:15px;margin-left:0px;margin-right:5px;font-size:13px;border-top-left-radius: 10px; border-top-right-radius: 10px;border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
<div style="padding:0px;width:550px;background-image: linear-gradient(to bottom, #e9e9e9 50%, #bcbaba 100%);border-radius: 10px;-moz-border-radius:10px;-webkit-border-radius:10px;border: 1px solid LightGrey;margin-left:0px; margin-right:0px;margin-top:4px;margin-bottom:0px;line-height:1.6;white-space:normal;">
<center>
<h1 id="web-audio-peak-meters" style="color:#00aee8;font: 18pt arial, sans-serif;font-weight:bold; text-shadow: 0.25px 0.25px gray;">Node Info Configurator</h1>


<?php

include '../include/parse_svxconf.php';

//sp0dz based on
//https://programmierfrage.com/items/convert-array-to-an-ini-file
function build_ini_string(array $a) {
    $out = '';
    $sectionless = '';
    foreach($a as $rootkey => $rootvalue) {
        if(is_array($rootvalue)){
            // find out if the root-level item is an indexed or associative array
            $indexed_root = array_keys($rootvalue) == range(0, count($rootvalue) - 1);
            // associative arrays at the root level have a section heading
            if(!$indexed_root) $out .= PHP_EOL."[$rootkey]".PHP_EOL;
            // loop through items under a section heading
            foreach($rootvalue as $key => $value){
                if(is_array($value)){
                    // indexed arrays under a section heading will have their key omitted
                    $indexed_item = array_keys($value) == range(0, count($value) - 1);
                    foreach($value as $subkey=>$subvalue){
                        // omit subkey for indexed arrays
                        if($indexed_item) $subkey = "";
                        // add this line under the section heading
                        $out .= "{$key}[$subkey] = $subvalue" . PHP_EOL;
                    }
                }else{
                    if($indexed_root){
                        // root level indexed array becomes sectionless
                        $sectionless .= "{$rootkey}[] = $value" . PHP_EOL;
                    }else{
                        // plain values within root level sections
                        $out .= "$key = $value" . PHP_EOL;
                    }
                }
            }

        } else {
            // root level sectionless values
            $sectionless .= "$rootkey = $rootvalue" . PHP_EOL;
        }
    }
    return $sectionless.$out;
}


if (fopen($nodeInfoFile,'r'))
{
	$filedata = file_get_contents($nodeInfoFile);
	$nodeInfo = json_decode($filedata,true);
	//print_r($nodeInfo);
};

if (isset($_POST['btnSave']))
    {
	$nodeInfo["Location"] = $_POST['inLocation'];
	$nodeInfo["Locator"] = $_POST['inLocator'];
	$nodeInfo["SysOp"] = $_POST['inSysOp'];
	$nodeInfo["LAT"] = $_POST['inLAT'];
	$nodeInfo["LONG"] = $_POST['inLONG'];
	$nodeInfo["RXFREQ"] = $_POST['inRXFREQ'];
	$nodeInfo["TXFREQ"] = $_POST['inTXFREQ'];
	$nodeInfo["Website"] = $_POST['inWebsite'];
	$nodeInfo["Mode"] = $_POST['inMode'];
	$nodeInfo["Type"] = $_POST['inType'];
	$nodeInfo["Echolink"] = $_POST['inEcholink'];
	$nodeInfo["nodeLocation"] = $_POST['innodeLocation'];
	$nodeInfo["Sysop"] = $_POST['inSysop'];
	$nodeInfo["Verbund"] = $_POST['inVerbund'];
	$nodeInfo["CTCSS"] = $_POST['inCTCSS'];
	$nodeInfo["DefaultTG"] = $_POST['inDefaultTG'];

	$jsonNodeInfo = json_encode($nodeInfo);
	file_put_contents("/var/www/html/nodeInfo/node_info.json", $jsonNodeInfo ,FILE_USE_INCLUDE_PATH);

        $retval = null;
        $screen = null;


	///file manipulation section
		//archive the current config
		exec('sudo cp /etc/svxlink/node_info.json /etc/svxlink/node_info.json.' .date("YmdThis") ,$screen,$retval);
		//move generated file to current config
		exec('sudo mv /var/www/html/nodeInfo/node_info.json /etc/svxlink/node_info.json', $screen, $retval);
        	//Service SVXlink restart
       		exec('sudo service svxlink restart 2>&1',$screen,$retval);

};

	$inLocation = $nodeInfo["Location"];
	$inLocator = $nodeInfo["Locator"];
	$inSysOp = $nodeInfo["SysOp"];
	$inLAT = $nodeInfo["LAT"];
	$inLONG = $nodeInfo["LONG"];
	$inRXFREQ = $nodeInfo["RXFREQ"];
	$inTXFREQ = $nodeInfo["TXFREQ"];
	$inWebsite = $nodeInfo["Website"];
	$inMode = $nodeInfo["Mode"];
	$inType = $nodeInfo["Type"];
	$inEcholink = $nodeInfo["Echolink"];
	$innodeLocation = $nodeInfo["nodeLocation"];
	$inSysop = $nodeInfo["Sysop"];
	$inVerbund = $nodeInfo["Verbund"];
	$inCTCSS = $nodeInfo["CTCSS"];
	$inDefaultTG = $nodeInfo["DefaultTG"];

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<table>
        <tr>
        <th width = "380px">Node Info Input <?php echo "File: ".$nodeInfoFile ; ?></th>
	<th width = "100px">Action</th>
        </tr>
<tr>
<TD>
	Location: <input type="text" name="inLocation" style="width: 150px;" value="<?php echo $inLocation;?>">
<BR>
        Locator: <input type="text" name="inLocator" style="width: 150px;" value="<?php echo $inLocator;?>">
<BR> 
       	SysOp: <input type="text" name="inSysOp" style="width: 150px;" value="<?php echo $inSysOp;?>">
<BR>
	Lat: <input type="text" name="inLAT" style="width: 150px;" value="<?php echo $inLAT;?>">
<BR>
	Long: <input type="text" name="inLONG" style="width: 150px;" value="<?php echo $inLONG;?>">
<BR>
	Rq Freq: <input type="text" name="inRXFREQ" style="width: 150px;" value="<?php echo $inRXFREQ;?>">
<BR>
	Tx Freq: <input type="text" name="inTXFREQ" style="width: 150px;" value="<?php echo $inTXFREQ;?>">
<BR>
        Website: <input type="text" name="inWebsite" style="width: 150px;" value="<?php echo $inWebsite;?>">
<BR>
        Mode: <input type="text" name="inMode" style="width: 150px;" value="<?php echo $inMode;?>">
<BR>
        Type: <input type="text" name="inType" style="width: 150px;" value="<?php echo $inType;?>">
<BR>
        EchoLink: <input type="text" name="inEcholink" style="width: 150px;" value="<?php echo $inEcholink;?>">
<BR>
        Node Location: <input type="text" name="innodeLocation" style="width: 150px;" value="<?php echo $innodeLocation;?>">
<BR>
        Sysop: <input type="text" name="inSysop" style="width: 150px;" value="<?php echo $inSysop;?>">
<BR>
        Verbund: <input type="text" name="inVerbund" style="width: 150px;" value="<?php echo $inVerbund;?>">
<BR>
        DefaultTG: <input type="text" name="inDefaultTG" style="width: 150px;" value="<?php echo $inDefaultTG;?>">
<BR>
        CTCSS: <input type="text" name="inCTCSS" style="width: 150px;" value="<?php echo $inCTCSS;?>">



</td>
<td> 
	<button name="btnSave" type="submit" class="red" style="height:100px; width:105px; font-size:12px;">Save <BR><Br> & <BR><BR> ReLoad</button>
</td>
</tr>
</table>


</form>

<p style="margin: 0 auto;"></p>
<p style="margin-bottom:-2px;"></p>

</body>
</html>
