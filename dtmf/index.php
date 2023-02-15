<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" lang="en">


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


.button {
  border: none;
  color: #454545;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}
.buttonh {
  background-image: linear-gradient(to bottom, #337ab7 0%, #265a88 100%);color:#454545;
  color: #454545;
}

.buttonh:hover {
  background-color: #4CAF50;
  color: #454545;
}
.green
{
  background-color: #448f47;
  border: none;
  color: white;
  font-weight: 600;
  font-size: 13px;
  padding: 4px 12px;
  text-decoration: none;
  margin: 4px 4px;
  cursor: pointer;
  border-radius: 4px;

}

.blue
{
  background-image: linear-gradient(to bottom, #337ab7 0%, #265a88 100%);color:#454545;
  border: none;
  color: white;
  font-weight: 600;
  font-size: 16px;
  padding: 4px 12px;
  text-decoration: none;
  margin: 4px 4px;
  cursor: pointer;
  border-radius: 4px;
  height:80px;
  width:150px;
}

.red
{
  background-color: #b00;
  border: none;
  color: white;
  font-weight: 600;
  font-size: 13px;
  padding: 4px 12px;
  text-decoration: none;
  margin: 4px 4px;
  cursor: pointer;
  border-radius: 4px;
}
.orange
{
  background-color: DarkOrange;
  border: none;
  color: white;
  font-weight: 600;
  font-size: 13px;
  padding: 4px 12px;
  text-decoration: none;
  margin: 4px 4px;
  cursor: pointer;
  border-radius: 4px;
}
.purple
{
  background-color: #800080;
  border: none;
  color: white;
  font-weight: 600;
  font-size: 13px;
  padding: 4px 12px;
  text-decoration: none;
  margin: 4px 4px;
  cursor: pointer;
  border-radius: 4px;
}

</style>
</head>

<body style="background-color: #e1e1e1;font: 11pt arial, sans-serif;">
<center>
<fieldset style="border:#3083b8 2px groove;box-shadow:0 0 10px #999; background-color:#f1f1f1; width:500px;margin-top:15px;margin-left:0px;margin-right$<div style="padding:0px;width:495px;background-image: linear-gradient(to bottom, #e9e9e9 50%, #bcbaba 100%);border-radius: 10px;-moz-border-radius:10px$<center>
<h1 id="web-audio-peak-meters" style="color:#00aee8;font: 18pt arial, sans-serif;font-weight:bold; text-shadow: 0.25px 0.25px gray;">DTMF Keyboard</h1>
<?php

// Keyboard
 if (isset($_POST['button20']))
    {
        shell_exec('echo "0" > ".$dtmfctrl." 2>&1');
    }

 if (isset($_POST['button21']))
    {
        shell_exec('echo "1" > ".$dtmfctrl." 2>&1');
    }

 if (isset($_POST['button22']))
    {
        shell_exec('echo "2" > ".$dtmfctrl." 2>&1');
    }

 if (isset($_POST['button23']))
    {
        shell_exec('echo "3" > ".$dtmfctrl." 2>&1');
    }

 if (isset($_POST['button24']))
    {
        shell_exec('echo "4" > ".$dtmfctrl." 2>&1');
    }

 if (isset($_POST['button25']))
    {
        shell_exec('echo "5" > ".$dtmfctrl." 2>&1');
    }

 if (isset($_POST['button26']))
    {
        shell_exec('echo "6" > ".$dtmfctrl." 2>&1');
    }

 if (isset($_POST['button27']))
    {
        shell_exec('echo "7" > ".$dtmfctrl." 2>&1');
    }

 if (isset($_POST['button28']))
    {
        shell_exec('echo "8" > ".$dtmfctrl." 2>&1');
    }

 if (isset($_POST['button29']))
    {
        shell_exec('echo "9" > ".$dtmfctrl." 2>&1');
    }

 if (isset($_POST['button30']))
    {
        shell_exec('echo "*" > ".$dtmfctrl." 2>&1');
    }

if (isset($_POST['button31']))
    {
        shell_exec('echo "#" > ".$dtmfctrl." 2>&1');
    }

if (isset($_POST['buttonAA']))
    {
        shell_exec('echo "A" > ".$dtmfctrl." 2>&1');
}
if (isset($_POST['buttonBB']))
    {
        shell_exec('echo "B" > ".$dtmfctrl." 2>&1');
}

if (isset($_POST['buttonCC']))
    {
        shell_exec('echo "C" > ".$dtmfctrl." 2>&1');
}

if (isset($_POST['buttonDD']))
    {
        shell_exec('echo "D" > ".$dtmfctrl." 2>&1');
}

?>

<form method="post">
    <p>
         <center><button style="height: 60px; width: 100px;font-size:25px;" button name="button21">1</button><button style="height: 60px; width: 100px;font-size:25px;" button name="button22">2</button><button style="height: 60px; width: 100px;font-size:25px;" button name="button23">3</button><button style="height: 60px; width: 100px;font-size:25px;" button name="buttonAA">A</button></center>
         <center><button style="height: 60px; width: 100px;font-size:25px;" button name="button24">4</button><button style="height: 60px; width: 100px;font-size:25px;" button name="button25">5</button><button style="height: 60px; width: 100px;font-size:25px;" button name="button26">6</button><button style="height: 60px; width: 100px;font-size:25px;" button name="buttonBB">B</button></center>
         <center><button style="height: 60px; width: 100px;font-size:25px;" button name="button27">7</button><button style="height: 60px; width: 100px;font-size:25px;" button name="button28">8</button><button style="height: 60px; width: 100px;font-size:25px;" button name="button29">9</button><button style="height: 60px; width: 100px;font-size:25px;" button name="buttonCC">C</button></center>
         <center><button style="height: 60px; width: 100px;font-size:25px;" button name="button30">*</button><button style="height: 60px; width: 100px;font-size:25px;" button name="button20">0</button><button style="height: 60px; width: 100px;font-size:25px;" button name="button31">#</button><button style="height: 60px; width: 100px;font-size:25px;" button name="buttonDD">D</button></center>
    </p>
    </form>
</fieldset>
</body>
</html>
