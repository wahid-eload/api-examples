<?php
  require_once("init.php");
  $we = new WeConnect();
  $we->debug(True);
  $xml = $we->request("25", array('number'=>3122244506),1);
?>
