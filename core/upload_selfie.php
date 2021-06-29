<?php
header('Access-Control-Allow-Origin: *');
if(isset($_POST['user']))
{
include 'config.php';
$user = $_POST['user'];

$today = date("Y-m-d");


$pic_size=$_FILES['file']['size'];


	$allowed_files=array("image/jpeg","image/jpg","image/png");

	if($pic_size > 0)
	{
    $pic=$_FILES['file']['name'];
	$pic_type=$_FILES['file']['type'];
	//$kaboom = explode(".", $pic);
	//$fileExt = end($kaboom);
	$pic = mt_rand(100000000000,999999999999).$user.".jpg";
	if(in_array($pic_type, $allowed_files))
	{
	 $path="../admin/users/".$pic;
	 move_uploaded_file($_FILES['file']['tmp_name'],$path);
	}
	}



$update3=$con->query("UPDATE porlt_users SET pic = '$pic', status = 'Selfie' WHERE email = '$user'") or die ("error: Server error ".mysqli_error($con));
      
    
    
if($update3)
{
$suc = "Yes";
}

}

$output = array('success'=>$suc);
echo $_GET['callback']."(".json_encode($output).")"; //output JSON data
//mysql_close($con);
?>