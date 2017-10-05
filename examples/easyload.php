<?php
  $data = array();
  $company=$argv[1];
  $number=$argv[2];
  $amount=$argv[3];

  if (preg_match("/^(0|)(3[0-4][0-9]{8})$/",$number,$ms)){$number=$ms[2];}
  else{print "ERROR: Wrong number provied: $number\n"; return;}
  if (!preg_match("/^3[0-4]$/",$company,$ms)){print "ERROR: Wrong company code provied: $company\n"; return;}
  if (!preg_match("/^([2-9][0-9]|[1-9][0-9]{2,3})$/",$amount,$ms)){print "ERROR: Wrong amount provied: $amount\n"; return;}
  $data{'number'}=$number;
  $data{'company'}=$company;
  $data{'amount'}=$amount;

  require_once("init.php");
  $we = new WeConnect();
  $we->debug(True); //This is just for testing, please do not add such a line in production mode.
  $xml=$we->request("easyload", $data);

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

  $id=0;
  if ($xml->status[0]['code']=="1")
  {
    if (isset($xml->webid) && ($xml->webid[0]['value']>1))
    {
      $id=$xml->webid[0]['value'];
    }
  }
  if ($id>0){print "Request successfully registered: $id\n";}
  else{print "Error: Unable to register the request, please fix the error and try again.\n";}
?>
