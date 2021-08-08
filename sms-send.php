<?php
include_once("SMS_OK_sms.php");

$mobile="9041274851";
$msg="can we meet together if yes then call me on my no.";

$msg=SendSMS($mobile,$msg);
echo $msg;
?>