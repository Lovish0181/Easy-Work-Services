<?php
session_start();
include_once("Connection.php");
include_once("SMS_OK_sms.php");
$check=$_GET["check"];
if($check=="signup")
    dosignup($dbcon);
else
    if($check=="validateuid")
        dovalidateuid($dbcon);
else
    if($check=="validatemob")
        dovalidatemob($dbcon);
else
    if($check=="login")
        dologin($dbcon);
else 
    if($check=="forgotpass")
        doforgotpass($dbcon);
function dosignup($dbcon)
{

    $uid=$_GET["uid"];
    $pwd=$_GET["pwd"];
    $mob=$_GET["mob"];
    $dos=date('y-m-d');
    $category=$_GET["category"];
    $status=1;
    $query="insert into users value('$uid','$pwd','$mob','$dos','$category','$status')";
    mysqli_query($dbcon,$query);
    $msg=mysqli_error($dbcon);
    if($msg=="")
        echo "Signedup Sucessfully";
    else
        echo"Something went wrong";
    }
function dovalidateuid($dbcon)
{
    $uid=$_GET["uid"];
    $query="select * from users where uid='$uid'";
    $table=mysqli_query($dbcon,$query);
if(mysqli_num_rows($table)==1)
    echo "Not Available";
    else
        echo"Available";
}
function dovalidatemob($dbcon)
{
    $mob=$_GET["mob"];
    $query="select * from users where mob='$mob'";
    $table=mysqli_query($dbcon,$query);
if(mysqli_num_rows($table)==1)
    echo "Mobile Number is Already Registered";
    else
        echo"Available";
}
function dologin($dbcon)
{
    $uid=$_GET["uid"];
$pwd=$_GET["pwd"];
$query="select * from users where uid='$uid' and pwd='$pwd'" ;
$table=mysqli_query($dbcon,$query);
$count=mysqli_num_rows($table);
if($count==1)
{
    $row=mysqli_fetch_array($table);
    $category=$row["category"];
    $_SESSION["activeuser"]=$uid;
    echo $category;
}
else
{
    echo "Someting Went Wrong";
}
}
function doforgotpass($dbcon)
{ 
    $uid=$_GET["uid"];
    $query="select * from users where uid='$uid'";
    $table=mysqli_query($dbcon,$query);
    if($row=mysqli_fetch_array($table))
    {
        $pwd=$row["pwd"];
        $mob=$row["mob"];
        $msg=SendSMS($mob,$pwd);
        echo "Password has been sent to your Mobile Number";
    }
    else 
    {
        $pwd="";
        echo "Invalid User Id";
    }
}
?>