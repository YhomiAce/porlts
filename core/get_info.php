<?php
session_start();
include 'config.php';
$user=$_GET['user'];
$date_t = date("Y-m-d");

$sql="SELECT * FROM porlt_users WHERE email='$user'";
$result=$con->query($sql) or die ("error: Server error ".mysqli_error($con));

if($result)
{
 
$rows=mysqli_fetch_array($result);

$id = $rows['id'];
$fname = $rows['fulname'];
$phone = $rows['phone'];
$email = $rows['email'];

$address = $rows['address'];

$fulname = $rows['fulname'];

$date_t = $rows['date_t'];
$fulname = substr($fulname, 0, 10);
$fulname = $fulname."...";

}


$output = array('fname'=>$fname, 'email'=> $email, 'phone'=> $phone, 'address'=> $address, 'fulname'=> $fulname);
echo $_GET['callback']."(".json_encode($output).")"; //output JSON data
//mysql_close($con);
?>

