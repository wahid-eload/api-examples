<?php
  require_once("init.php");
  $we = new WeConnect();
  $we->debug(True); //This is just for testing, please do not add such a line in production mode.
  $xml = $we->request("25", array('number'=>3122244506));
?>
