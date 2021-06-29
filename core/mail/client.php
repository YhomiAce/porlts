<?php
include 'config.php';
// Check for empty fields
if(empty($_POST['email']) 		||
   empty($_POST['pro_users']) 		||
   empty($_POST['name']) 		||
   
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email = $_POST['email'];
$pro_users = $_POST['pro_users'];
//$message = $_POST['message'];

$time_t=time();
$date_t=date("j-M-Y h:i:s a");

$code=rand(0000, 9999);
$code=$name.$code;
$code=sha1($code);


$sql="INSERT INTO client
(client_name, client_email, pro_users, start_t, c_id, status, s_date, initial_request_date, type_of_account, duration)
VALUES('$name', '$email', '$pro_users', '$time_t', '$code', 'Active', '$date_t', '$date_t', 'Demo', '2 weeks')";
$result=$con->query($sql) or die("error1: ".mysqli_error());


?>