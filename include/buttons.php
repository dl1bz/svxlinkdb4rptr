<div class="content">
<?php
$ip = isset($_SERVER['HTTP_CLIENT_IP'])?$_SERVER['HTTP_CLIENT_IP']:isset($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR']; 
$net1= cidr_match($ip, "192.168.0.0/16");
$net2= cidr_match($ip, "172.16.0.0/12");
$net3= cidr_match($ip, "127.0.0.0/8");
$net4= cidr_match($ip, "10.0.0.0/8");

if ($net1 == true || $net2 == true || $net3 == true || $net4 == true || FULLACCESS_OUTSIDE == 1) {

    if(array_key_exists('button1', $_POST)) {
        $exec= "echo '" . KEY1[1] . "' > ".$dtmfctrl." 2>&1";
            exec($exec, $output);
            echo "<meta http-equiv='refresh' content='0'>";
    }
    if(array_key_exists('button2', $_POST)) {
        $exec= "echo '" . KEY2[1] . "' > ".$dtmfctrl." 2>&1";
            exec($exec, $output);
            echo "<meta http-equiv='refresh' content='0'>";
    }
    if(array_key_exists('button3', $_POST)) {
        $exec= "echo '" . KEY3[1] . "' > ".$dtmfctrl." 2>&1";
            exec($exec, $output);
            echo "<meta http-equiv='refresh' content='0'>";
    }
    if(array_key_exists('button4', $_POST)) {
        $exec= "echo '" . KEY4[1] . "' > ".$dtmfctrl." 2>&1";
            exec($exec, $output);
            echo "<meta http-equiv='refresh' content='0'>";
    }
    if(array_key_exists('button5', $_POST)) {
        $exec= "echo '" . KEY5[1] . "' > ".$dtmfctrl." 2>&1";
            exec($exec, $output);
            echo "<meta http-equiv='refresh' content='0'>";
    }
    if(array_key_exists('button6', $_POST)) {
        $exec= "echo '" . KEY6[1] . "' > ".$dtmfctrl." 2>&1";
            exec($exec, $output);
            echo "<meta http-equiv='refresh' content='0'>";
    }
    if(array_key_exists('button7', $_POST)) {
        $exec= "echo '" . KEY7[1] . "' > ".$dtmfctrl." 2>&1";
            exec($exec, $output);
            echo "<meta http-equiv='refresh' content='0'>";
    }
    if(array_key_exists('button8', $_POST)) {
        $exec= "echo '" . KEY8[1] . "' > ".$dtmfctrl." 2>&1";
            exec($exec, $output);
            echo "<meta http-equiv='refresh' content='0'>";
    }
    if(array_key_exists('button9', $_POST)) {
        $exec= "echo '" . KEY9[1] . "' > ".$dtmfctrl." 2>&1";
            exec($exec, $output);
            echo "<meta http-equiv='refresh' content='0'>";
    }
    if(array_key_exists('button10', $_POST)) {
        $exec= "echo '" . KEY10[1] . "' > ".$dtmfctrl." 2>&1";
            exec($exec, $output);
            echo "<meta http-equiv='refresh' content='0'>";
    }
    if(array_key_exists('button11', $_POST)) {
        $exec= "echo '" . KEY11[1] . "' > ".$dtmfctrl." 2>&1";
            exec($exec, $output);
            echo "<meta http-equiv='refresh' content='0'>";
    }
    if(array_key_exists('button12', $_POST)) {
        $exec= "echo '" . KEY12[1] . "' > ".$dtmfctrl." 2>&1";
            exec($exec, $output);
            echo "<meta http-equiv='refresh' content='0'>";
    }
    if(array_key_exists('button13', $_POST)) {
        $exec= "echo '" . KEY13[1] . "' > ".$dtmfctrl." 2>&1";
            exec($exec, $output);
            echo "<meta http-equiv='refresh' content='0'>";
    }
    if(array_key_exists('button14', $_POST)) {
        $exec= "echo '" . KEY14[1] . "' > ".$dtmfctrl." 2>&1";
            exec($exec, $output);
            echo "<meta http-equiv='refresh' content='0'>";
    }
    if(array_key_exists('button15', $_POST)) {
        $exec= "echo '" . KEY15[1] . "' > ".$dtmfctrl." 2>&1";
            exec($exec, $output);
            echo "<meta http-equiv='refresh' content='0'>";
    }
    if(array_key_exists('button16', $_POST)) {
        $exec= "echo '" . KEY16[1] . "' > ".$dtmfctrl." 2>&1";
            exec($exec, $output);
            echo "<meta http-equiv='refresh' content='0'>";
    }
    if(array_key_exists('button17', $_POST)) {
        $exec= "echo '" . KEY17[1] . "' > ".$dtmfctrl." 2>&1";
            exec($exec, $output);
            echo "<meta http-equiv='refresh' content='0'>";
    }
    if(array_key_exists('button18', $_POST)) {
        $exec= "echo '" . KEY18[1] . "' > ".$dtmfctrl." 2>&1";
            exec($exec, $output);
            echo "<meta http-equiv='refresh' content='0'>";
    }
    if(array_key_exists('button19', $_POST)) {
        $exec= "echo '" . KEY19[1] . "' > ".$dtmfctrl." 2>&1";
            exec($exec, $output);
            echo "<meta http-equiv='refresh' content='0'>";
    }
    if(array_key_exists('button20', $_POST)) {
        $exec= "echo '" . KEY20[1] . "' > ".$dtmfctrl." 2>&1";
            exec($exec, $output);
            echo "<meta http-equiv='refresh' content='0'>";
    }
    /*
    // if(array_key_exists('button8', $_POST)) {
    //        $exec="".KEY8[1]."";
    //            exec($exec,$output);
    //            echo "<meta http-equiv='refresh' content='0'>";
    //        }

    //if (SHOWPTT=="TRUE") {

    // if(array_key_exists('button9', $_POST)) {
    //        $exec="".KEY9[1]."";
    //            exec($exec,$output);
    //           echo "<meta http-equiv='refresh' content='0'>";
    //        }
    // if(array_key_exists('button10', $_POST)) {
    //        $exec="".KEY10[1]."";
    //            exec($exec,$output);
    //            echo "<meta http-equiv='refresh' content='0'>";
    //        }
    // }
    //
    //
    */
    ?>

<fieldset style="box-shadow:0 0 10px #999;background-color:#e8e8e8e8; width:855px;margin-top:5px;margin-bottom:14px;margin-left:6px;margin-right:0px;font-size:12px;border-top-left-radius: 10px; border-top-right-radius: 10px;border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
<div style="padding:0px;width:100%;background-image: linear-gradient(to bottom, #e9e9e9 50%, #bcbaba 100%);border-radius: 10px;-moz-border-radius:10px;-webkit-border-radius:10px;border: 1px solid LightGrey;margin-left:0px; margin-right:0px;margin-top:4px;margin-bottom:0px;white-space:normal;">
<p style="margin-bottom:0px;"></p>

    <?php

    if ($dtmfctrl!="/dev/null") {

        echo "<form method=\"post\">";
        echo "<center>";

        if (defined('KEY1') && KEY1[0]!="") { echo "<input type=\"submit\" name=\"button1\" class=".KEY1[2]." value='".KEY1[0]."' />"; 
        }
        if (defined('KEY2') && KEY2[0]!="") { echo "<input type=\"submit\" name=\"button2\" class=".KEY2[2]." value='".KEY2[0]."' />"; 
        }
        if (defined('KEY3') && KEY3[0]!="") { echo "<input type=\"submit\" name=\"button3\" class=".KEY3[2]." value='".KEY3[0]."' />"; 
        }
        if (defined('KEY4') && KEY4[0]!="") { echo "<input type=\"submit\" name=\"button4\" class=".KEY4[2]." value='".KEY4[0]."' />"; 
        }
        if (defined('KEY5') && KEY5[0]!="") { echo "<input type=\"submit\" name=\"button5\" class=".KEY5[2]." value='".KEY5[0]."' />"; 
        }
        if (defined('KEY6') && KEY6[0]!="") { echo "<input type=\"submit\" name=\"button6\" class=".KEY6[2]." value='".KEY6[0]."' />"; 
        }
        if (defined('KEY7') && KEY7[0]!="") { echo "<input type=\"submit\" name=\"button7\" class=".KEY7[2]." value='".KEY7[0]."' />"; 
        }
        if (defined('KEY8') && KEY8[0]!="") { echo "<input type=\"submit\" name=\"button8\" class=".KEY8[2]." value='".KEY8[0]."' />"; 
        }
        if (defined('KEY9') && KEY9[0]!="") { echo "<input type=\"submit\" name=\"button9\" class=".KEY9[2]." value='".KEY9[0]."' />"; 
        }
        if (defined('KEY10') && KEY10[0]!="") { echo "<input type=\"submit\" name=\"button10\" class=".KEY10[2]." value='".KEY10[0]."' />"; 
        }
        if (defined('ADD_BUTTONS') && ADD_BUTTONS == 1) {
            echo '<BR>';
            if (defined('KEY11') && KEY11[0]!="") { echo "<input type=\"submit\" name=\"button11\" class=".KEY11[2]." value='".KEY11[0]."' />"; 
            }
            if (defined('KEY12') && KEY12[0]!="") { echo "<input type=\"submit\" name=\"button12\" class=".KEY12[2]." value='".KEY12[0]."' />"; 
            }
            if (defined('KEY13') && KEY13[0]!="") { echo "<input type=\"submit\" name=\"button13\" class=".KEY13[2]." value='".KEY13[0]."' />"; 
            }
            if (defined('KEY14') && KEY14[0]!="") { echo "<input type=\"submit\" name=\"button14\" class=".KEY14[2]." value='".KEY14[0]."' />"; 
            }
            if (defined('KEY15') && KEY15[0]!="") { echo "<input type=\"submit\" name=\"button15\" class=".KEY15[2]." value='".KEY15[0]."' />"; 
            }
            if (defined('KEY16') && KEY16[0]!="") { echo "<input type=\"submit\" name=\"button16\" class=".KEY16[2]." value='".KEY16[0]."' />"; 
            }
            if (defined('KEY17') && KEY17[0]!="") { echo "<input type=\"submit\" name=\"button17\" class=".KEY17[2]." value='".KEY17[0]."' />"; 
            }
            if (defined('KEY18') && KEY18[0]!="") { echo "<input type=\"submit\" name=\"button18\" class=".KEY18[2]." value='".KEY18[0]."' />"; 
            }
            if (defined('KEY19') && KEY19[0]!="") { echo "<input type=\"submit\" name=\"button19\" class=".KEY19[2]." value='".KEY19[0]."' />"; 
            }
            if (defined('KEY20') && KEY20[0]!="") { echo "<input type=\"submit\" name=\"button20\" class=".KEY20[2]." value='".KEY20[0]."' />"; 
            }
        }

        //    if (KEY6[0]!="") {
        //        echo "<input type=\"submit\" name=\"button6\" class=".KEY6[2]." value='".KEY6[0]."' />";
        //        }

        //    if (KEY7[0]!="") {
        //        echo "<input type=\"submit\" name=\"button7\" class=".KEY7[2]."  value='".KEY7[0]."' />";
        //        }

        //  if (SHOWPTT=="TRUE") {
        //      echo "<input type=\"submit\" name=\"button9\" class=".KEY9[2]." value='".KEY9[0]."' />";
        //      echo "<input type=\"submit\" name=\"button10\" class=".KEY10[2]." value='".KEY10[0]."' />";
        //      }

        echo "</center>";
        echo "</form>";

        echo "<p style=\"margin: 0 auto;\"></p>";

        echo "<table style=\"border-collapse: collapse; border: none; background-color:#e8e8e8e8;\">";
        echo "<tr style=\"border: none;\">";

        echo "<td style=\"border: none; background-color:#e8e8e8e8;\">";
        echo "<form action=\"\" method=\"POST\" style=\"margin-top:4px;\">";
        echo "<label style=\"text-shadow: 1px 1px 1px Lightgrey, 0 0 0.5em LightGrey, 0 0 1em whitesmoke;font-weight:bold;color:#464646;\" for=\"dtmfsvx\">DTMF command (must end with #):<BR></label>";
        echo "<input type=\"text\" id=\"dtmfsvx\" name=\"dtmfsvx\">";
        echo "<input type=\"submit\" value=\"Send DTMF code\" class=\"green\">";
        echo "</form>";
        echo "</td>";

        if ($reflector_active) {
            echo "<td style=\"border: none; background-color:#e8e8e8e8;\">";
            echo "<form action=\"\" method=\"POST\" style=\"margin-top:4px;\">";
            echo "<label style=\"text-shadow: 1px 1px 1px Lightgrey, 0 0 0.5em LightGrey, 0 0 1em whitesmoke;font-weight:bold;color:#464646;\" for=\"jmpto\">Change active TG:<BR></label>";
            echo "<input type=\"text\" id=\"jmpto\" name=\"jmpto\">";
            echo "<input type=\"submit\" value=\"Select TG\" class=\"green\">";
            echo "</form>";
            echo "</td>";

            echo "<td style=\"border: none;  background-color:#e8e8e8e8;\">";
            echo "<form action=\"\" method=\"POST\" style=\"margin-top:4px;\">";
            echo "<label style=\"text-shadow: 1px 1px 1px Lightgrey, 0 0 0.5em LightGrey, 0 0 1em whitesmoke;font-weight:bold;color:#464646;\" for=\"addMonTG\">Add time-limited Monitor TG:<BR></label>";
            echo "<input type=\"text\" id=\"addMonTG\" name=\"addMonTG\">";
            echo "<input type=\"submit\" value=\"Add Monitor TG\" class=\"green\"><br>";
            echo "</form>";
            echo "</td>";
        }

        echo "</tr>";
        echo "</table>";
    }
    if ((isset($_POST["dtmfsvx"]) == true) && (trim($_POST["dtmfsvx"]) !=='')) {
        $exec= "echo '" . $_POST['dtmfsvx'] . "' > ".$dtmfctrl." 2>&1";
        exec($exec, $output);
        echo "<meta http-equiv='refresh' content='0'>";
    }
    if ((isset($_POST["jmpto"]) == true) && (trim($_POST["jmpto"]) !=='') && (preg_match('/^\d+$/', $_POST["jmpto"]))) {
        $exec= "echo '*91" . $_POST['jmpto'] . "#' > ".$dtmfctrl." 2>&1";
        exec($exec, $output);
        echo "<meta http-equiv='refresh' content='0'>";
    }
    if ((isset($_POST["jmptoA"]) == true) && (trim($_POST["jmptoA"]) !=='') && (preg_match('/^\d+$/', $_POST["jmptoA"]))) {
        $exec= "echo '91" . $_POST['jmptoA'] . "#' > ".$dtmfctrl." 2>&1";
        exec($exec, $output);
        echo "<meta http-equiv='refresh' content='0'>";
    }
    if ((isset($_POST["addMonTG"]) == true) && (trim($_POST["addMonTG"]) !=='') && (preg_match('/^\d+$/', $_POST["addMonTG"]))) {
        $exec= "echo '*94" . $_POST['addMonTG'] . "#' > ".$dtmfctrl." 2>&1";
        exec($exec, $output);
        echo "<meta http-equiv='refresh' content='0'>";
    }
    ?>

<p style="margin-bottom:-9px;"></p>
</div>
</fieldset>
    <?php
} else {
    ?>

<fieldset style="box-shadow:0 0 10px #999;background-color:#e8e8e8e8; width:855px;margin-top:5px;margin-bottom:14px;margin-left:6px;margin-right:0px;font-size:12px;border-top-left-radius: 10px; border-top-right-radius: 10px;border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
<div style="padding:0px;width:100%;background-image: linear-gradient(to bottom, #e9e9e9 50%, #bcbaba 100%);border-radius: 10px;-moz-border-radius:10px;-webkit-border-radius:10px;border: 1px solid LightGrey;margin-left:0px; margin-right:0px;margin-top:4px;margin-bottom:0px;white-space:normal;">
<p style="margin: 0 auto;"></p>
<form action="" method="POST" style="margin-top:4px;">
  <center>
  <label style="text-shadow: 1px 1px 1px Lightgrey, 0 0 0.5em LightGrey, 0 0 1em whitesmoke;font-weight:bold;color:#464646;" for="dtmfsvx">Select Talkgroup # : </label>
  <input type="text" id="dtmfsvx" name="dtmfsvx">
  <input type="submit" value="Activate" class="green"><br>
  </center>
</form>
    <?php
    if ((isset($_POST["dtmfsvx"]) == true) && (trim($_POST["dtmfsvx"]) !=='') && (preg_match('/^\d+$/', $_POST["dtmfsvx"]))) {
        $exec= "echo '*91" . $_POST['dtmfsvx'] . "#' > ".$dtmfctrl." 2>&1";
        exec($exec, $output);
        echo "<meta http-equiv='refresh' content='0'>";
    }
    ?>
<p style="margin-bottom:-2px;"></p>
</div>
</fieldset>
    <?php
}
?>
