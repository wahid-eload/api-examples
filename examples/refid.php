<?php
  $data = array();
  $tid=$argv[1];

  if (!preg_match("/^[0-9]{1,10}$/",$tid,$ms)){print "ERROR: Wrong tid provied: $tid\n"; return;}
  $data{'tid'}=$tid;

  require_once("init.php");
  $we = new WeConnect();
  $we->debug(True); //This is just for testing, please do not add such a line in production mode.
  $xml=$we->request("refid", $data, 1, 1);

  if (isset($xml->error))
  {
    foreach ($xml->error as $e){print "Error:".$e['value']."\n";}
  }
  if (isset($xml->warning))
  {
    foreach ($xml->warning as $e){print "Warning:".$e['value']."\n";}
  }
  if (isset($xml->message))
  {
    foreach ($xml->message as $e){print "".$e['value']."\n";}
  }
  print "status code : ".$xml->status[0]['code']."\n";
  print "status value: ".$xml->status[0]['value']."\n";
?>
