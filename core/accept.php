<?php
session_start();
include 'config.php';
$user = $_GET['user'];
$parcel_id = $_GET['package_id'];


$sql="SELECT * FROM  porlt_users WHERE  email='$user'";
$result=$con->query($sql) or die ("error: Server error ".mysqli_error($con));
if($result)
{
$count = mysqli_num_rows($result);
if($count == 1)
{
$rows = mysqli_fetch_array($result);
$email = $rows['email'];
$carrier = $rows['fulname'];
$phone = $rows['phone'];




$update2=$con->query("UPDATE drop_offs SET carrier = '$carrier', carrier_id = '$user', carrier_phone = '$phone', status = 'Accepted' WHERE parcel_id = '$parcel_id' AND status='Pending'") or die ("error: Server error ".mysqli_error($con));


if($update2)
{
$suc = "Yes";
}
else
{
$suc = "No";
}
}
}

$output = array('success'=>$suc);
echo $_GET['callback']."(".json_encode($output).")"; //output JSON data
//mysql_close($con);
?>