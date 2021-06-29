<?php
session_start();
include 'config/config.php';
$email=$_GET['email'];
$password=$_GET['password'];
$email=stripslashes($email);
$password=stripslashes($password);
$email=mysqli_escape_string($con, $email);
$password=mysqli_escape_string($con, $password);
$pass2 = sha1($password);


$sql="SELECT * FROM admin WHERE username='$email' AND password='$pass2'";
$result=$con->query($sql) or die ("error: Server error ".mysqli_error($con));

if($result)
{
  $count=mysqli_num_rows($result);
  if($count==1)
  
  {
  $rows=mysqli_fetch_array($result);

   $name = $rows['fulname'];
   $level = $rows['level'];
   
   $_SESSION['porlt_admin']=$email;
   $_SESSION['porlt_level']=$level;

    $_SESSION['porlt_name']=$name;
   
  
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

$output = array('success'=>$suc, 'name' => $name);
echo $_GET['callback']."(".json_encode($output).")"; //output JSON data


?>
