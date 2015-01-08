<?php
  require_once("init.php");
  $we = new WeConnect();
  $we->debug(True);
  $xml = $we->request("weconnect", array('command'=>25, 'number'=>3122244506),1);
?>
