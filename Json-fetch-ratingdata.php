<?php
include_once("Connection.php");
$query="select * from ratings";
$table=mysqli_query($dbcon,$query);
$ary=array();
while($row=mysqli_fetch_array($table))
{
    $ary[]=$row;
    
}
echo json_encode($ary);
?>