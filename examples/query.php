<?php
  $data = array();
  $webid=$argv[1];
  if (!preg_match("/^[1-9][0-9]+$/",$webid)){print "ERROR: Wrong WebID provided: $webid\n"; return;}
  $data{'webid'}=$webid;

  require_once("init.php");
  $we = new WeConnect();
  $we->debug(True);
  $xml = $we->request("0",$data);
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
