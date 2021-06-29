<?php
session_start();
if(isset($_POST['user']))
{
include 'config.php';
$user = $_POST['user'];
$package_id = $_POST['package_id'];


$today = date("Y-m-d");


$pic_size=$_FILES['pic']['size'];


	$allowed_files=array("image/jpeg","image/jpg","image/png");

	if($pic_size > 0)
	{
    $pic=$_FILES['pic']['name'];
	$pic_type=$_FILES['pic']['type'];
	$kaboom = explode(".", $pic);
	$fileExt = end($kaboom);
	$pic = mt_rand(100000000000,999999999999).$user.".".$fileExt;
	if(in_array($pic_type, $allowed_files))
	{
	 $path="../admin/packages/".$pic;
	 move_uploaded_file($_FILES['pic']['tmp_name'],$path);
	}
	}



      
      $update3=$con->query("UPDATE drop_offs SET package_photo = '$pic' WHERE parcel_id = '$package_id' AND user = '$user'") or die ("error: Server error ".mysqli_error($con));
      
    
    
if($update3)
{
$suc = "Yes";
}

}

$output = array('success'=>$suc);
echo $_GET['callback']."(".json_encode($output).")"; //output JSON data
//mysql_close($con);
?>