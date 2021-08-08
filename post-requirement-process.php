<?php
include_once("Connection.php");
 $uid=$_GET["uid"];
    $category=$_GET["category"];
$date=date('Y-m-d');
    $problem=$_GET["problem"];
    $location=$_GET["location"];
    $city=$_GET["city"];

$query="insert into requirements values(default,'$uid','$category','$date','$problem','$location','$city')";
mysqli_query($dbcon,$query);
    $msg=mysqli_error($dbcon);
    if($msg=="")
    {
        echo "Requirement is Posted..!!";
    }
    else
    {
        echo $msg;
    }

?>