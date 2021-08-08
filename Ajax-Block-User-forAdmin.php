<?php
include_once("Connection.php");
$check=$_GET["check"];
if($check=="Block")
{
    doblock($dbcon);
}
else
    if($check=="Resume")
{
    doresume($dbcon);
}
else
    if($check=="Delete")
{
    dodelete($dbcon);
}
function doblock($dbcon)
{
    $uid=$_GET["uid"];
    $query="update users set status=0 where uid='$uid'";
    mysqli_query($dbcon,$query);
    $msg=mysqli_error($dbcon);
if($msg=="")
{
    echo "Blocked Succesfully";
}
    else
    {    echo $msg;
}
}
function doresume($dbcon)
{
    $uid=$_GET["uid"];
    $query="update users set status=1 where uid='$uid'";
    mysqli_query($dbcon,$query);
    $msg=mysqli_error($dbcon);  
if($msg=="")
{
    echo "Resumed Succesfully";
}
    else
    {
        echo $msg;
    }
}
function dodelete($dbcon)
{
    $uid=$_GET["uid"];
    $query="delete from users  where uid='$uid'";
    mysqli_query($dbcon,$query);
    $msg=mysqli_error($dbcon);
if($msg=="")
{
    echo "Deleted Succesfully";
}
    else
    {    echo $msg;
}
}
?>
