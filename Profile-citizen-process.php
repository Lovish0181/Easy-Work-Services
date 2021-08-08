<?php
include_once("Connection.php");
$check=$_POST["check"];
if($check=="save")
    dosave($dbcon);
else
    doupdate($dbcon);
function doupdate($dbcon)
{
    $uid=$_POST["txtuid"];
    $cname=$_POST["txtcname"];
    $phone=$_POST["txtphone"];
    $address=$_POST["txtaddress"];
    $city=$_POST["txtcity"];
    $state=$_POST["txtstate"];
    $email=$_POST["txtemail"];
    $hdn=$_POST["hdn"];
    
    $orgname=$_FILES["profilepic"]["name"];
    $tmpname=$_FILES["profilepic"]["tmp_name"];
    if($orgname=="")
        $filename=$hdn;
    else
        $filename=$orgname;
        move_uploaded_file($tmpname,"uploads/".$orgname);
    $query="update citizens set cname='$cname',phone='$phone',address='$address',city='$city',state='$state',orgname='$filename',email='$email' where uid='$uid'";
    mysqli_query($dbcon,$query);
    $msg=mysqli_error($dbcon);
    if($msg=="")
        echo "Record Updated Sucessfully....";
    else
        echo $msg;
}
function dosave($dbcon)
{
    $uid=$_POST["txtuid"];
    $cname=$_POST["txtcname"];
    $phone=$_POST["txtphone"];
    $address=$_POST["txtaddress"];
    $city=$_POST["txtcity"];
    $state=$_POST["txtstate"];
    $email=$_POST["txtemail"];
    
    $orgname=$_FILES["profilepic"]["name"];
    $tmpname=$_FILES["profilepic"]["tmp_name"];
    $query="insert into citizens values('$uid','$cname','$phone','$address','$city','$state','$email','$orgname')";
    mysqli_query($dbcon,$query);
    $msg=mysqli_error($dbcon);
    if($msg=="")
    { move_uploaded_file($tmpname,"uploads/".$orgname);
    echo "Record Submit Successfully";
    }
        else
            echo $msg;
    
}
?>