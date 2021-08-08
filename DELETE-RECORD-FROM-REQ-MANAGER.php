<?php
include_once("Connection.php");
$rid=$_GET["rid"];
$query="delete from requirements where rid='$rid'";
$msg=mysqli_query($dbcon,$query);
if($msg=="")
{
echo "Record Deleted";
}
else
{
    echo $msg;
}
?>