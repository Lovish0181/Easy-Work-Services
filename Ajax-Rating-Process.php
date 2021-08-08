<?php
include_once("Connection.php");
$cid=$_GET["cid"];
$wid=$_GET["wid"];

$query="insert into ratings values(default,'$cid','$wid')";
mysqli_query($dbcon,$query);
$msg=mysqli_error($dbcon);
if($msg=="")
{
    echo "Successfully Requested";
    
}
else
{
    echo $msg;
}
?>