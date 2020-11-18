<?php

require_once("tokenlogin.php");

// $secret = "super_secret";
$secret = "B15m1ll4#";

$otl = new TokenLogin($secret);
$token = isset($_GET['token']) ? $_GET['token'] : ""; 
if($token!="")
{
   $payload = $otl->validate_token($token);

   try {
      if ($payload) {
          echo "<pre>Valid token! You are user #{$payload->uid}";
          // redirect
       } else {
          echo "<pre>Invalid token";
       }
   } catch (Exception $e) {
      echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}
else
{
   echo "Please Input Token!";
}

exit;