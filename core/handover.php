<?php
session_start();
include 'config.php';
$user = $_GET['user'];
$parcel_id = $_GET['package_id'];
$code = $_GET['code'];



$sql="SELECT * FROM  drop_offs WHERE  parcel_id='$parcel_id'";
$result=$con->query($sql) or die ("error: Server error ".mysqli_error($con));
if($result)
{
$count = mysqli_num_rows($result);
if($count == 1)
{
$rows = mysqli_fetch_array($result);
$confirm_code = $rows['parcel_code'];
$earned = $rows['earned'];


$sqlx="SELECT * FROM  porlt_users WHERE  email = '$user'";
$resultx=$con->query($sqlx) or die ("error: Server error ".mysqli_error($con));
$rowsx = mysqli_fetch_array($resultx);
$wallet = $rowsx['wallet'];
$new_bal = $wallet+$earned;


if($code == $confirm_code)
{
$update2=$con->query("UPDATE drop_offs SET  status = 'Delivered' WHERE parcel_id = '$parcel_id' AND status='Picked Up' AND carrier_id = '$user'") or die ("error: Server error ".mysqli_error($con));
$update2x=$con->query("UPDATE porlt_users SET   wallet = '$new_bal' WHERE email = '$user'") or die ("error: Server error ".mysqli_error($con));

}
else
{
$suc = "code";    
}
if($update2)
{
$suc = "Yes";
}
}
}

$output = array('success'=>$suc);
echo $_GET['callback']."(".json_encode($output).")"; //output JSON data
//mysql_close($con);
?>