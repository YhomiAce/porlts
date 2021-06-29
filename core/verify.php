<?php
session_start();
include 'config.php';
$user=$_GET['user'];
$user=stripslashes($user);

$code=$_GET['code'];
$code=stripslashes($code);


$sql="SELECT * FROM porlt_users WHERE email='$user' AND code = '$code'";
$result=$con->query($sql) or die ("error1: Server error ".mysqli_error($con));


if($result)
{
  $count=mysqli_num_rows($result);
if($count == 1)
{

$rows = mysqli_fetch_array($result);
$phone = $rows['phone'];
$email = $rows['email'];
$name = $rows['fulname'];
$username = $rows['username'];





	$suc="YES";

}
	else
	{
		$suc = "NO";
	}


}
	
	

if(isset($_GET['callback']))
{
header("Content-Type:application/json");
}

$output = array('success'=>$suc, 'name' => $name, 'username' => $username, 'phone' => $phone, 'email' => $email);
echo $_GET['callback']."(".json_encode($output).")"; //output JSON data


?>
