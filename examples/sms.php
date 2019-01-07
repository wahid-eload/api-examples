<?php
  require_once("init.php");
  $we = new WeConnect();
  $we->debug(True); //This is just for testing, please do not add such a line in production mode.
  $xml = $we->request("sms", array('text'=>'*222*0000*41*1*19*3001234567*23*34*2#'), $detail=0, $test=0);
?>
