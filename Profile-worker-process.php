<?php 
include_once("Connection.php");
$check=$_POST["check"];
if($check=="save")
    dosave($dbcon);
else
    doupdate($dbcon);
function dosave($dbcon)
{
     $uid=$_POST["txtuid"];
     $email=$_POST["txtemail"];
    $wname=$_POST["txtwname"];
    $phone=$_POST["txtphone"];
    $firm=$_POST["txtfirm"];
    $city=$_POST["txtcity"];
    $address=$_POST["txtaddress"];
    $state=$_POST["txtstate"];
    $category=$_POST["txtcategory"];
    $spl=$_POST["txtspl"];
    $exp=$_POST["txtexp"];
    $info=$_POST["txtinfo"];
    $orgnameaadhar=$_FILES["aadharpic"]["name"];
    $tmpnameaadhar=$_FILES["aadharpic"]["tmp_name"]; 
    $orgnameprofile=$_FILES["profilepic"]["name"];
    $tmpnameprofile=$_FILES["profilepic"]["tmp_name"]; 
    $query="insert into workers values(default,'$uid','$email','$wname','$phone','$firm','$city','$address','$state','$category','$spl','$exp','$orgnameaadhar','$orgnameprofile','$info',0,0)";
    mysqli_query($dbcon,$query);
    $msg=mysqli_error($dbcon);
    if($msg=="")
    {
        echo "Changes Saved..";
        move_uploaded_file($tmpnameaadhar,"uploads/".$orgnameaadhar);
        move_uploaded_file($tmpnameprofile,"uploads/".$orgnameprofile);
    }
    else
    {
        echo $msg;
    }
   
    
}
function doupdate($dbcon)
{
    $uid=$_POST["txtuid"];
    $email=$_POST["txtemail"];
    $wname=$_POST["txtwname"];
    $phone=$_POST["txtphone"];
    $firm=$_POST["txtfirm"];
    $city=$_POST["txtcity"];
    $address=$_POST["txtaddress"];
    $state=$_POST["txtstate"];
    $category=$_POST["txtcategory"];
    $spl=$_POST["txtspl"];
    $exp=$_POST["txtexp"];
    $info=$_POST["txtinfo"];
    $hdn1=$_POST["hdn1"];
    $hdn2=$_POST["hdn2"];
    $orgnameaadhar=$_FILES["aadharpic"]["name"];
    $tmpnameaadhar=$_FILES["aadharpic"]["tmp_name"]; 
    $orgnameprofile=$_FILES["profilepic"]["name"];
    $tmpnameprofile=$_FILES["profilepic"]["tmp_name"]; 
    if($orgnameprofile=="")
        $filenameprofile=$hdn2;
    else
    { $filenameprofile=$orgnameprofile; move_uploaded_file($tmpnameprofile,"uploads/".$orgnameprofile);
    }
    if($orgnameaadhar=="")
        $filenameaadhar=$hdn1;
    else
    { $filenameaadhar=$orgnameaadhar; move_uploaded_file($tmpnameaadhar,"uploads/".$orgnameaadhar);
    }
    $query="update workers set email='$email',wname='$wname',phone='$phone',firm='$firm',city='$city',address='$address',state='$state',category='$category',spl='$spl',exp='$exp',orgnameaadhar='$filenameaadhar',orgnameprofile='$filenameprofile',info='$info'";
    mysqli_query($dbcon,$query);
    $msg=mysqli_error($dbcon);
    if($msg=="")
        echo "Updated Successfully...!";
else
    echo $msg;
}
?>