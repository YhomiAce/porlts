<?php
session_start();
require 'config.php';



$user=$_GET['user'];
$msg=$_GET['msg'];
$msg1=$_GET['msg'];
//$ref=$_GET['ref'];

$user=stripslashes($user);
$msg=stripslashes($msg);
//$ref=stripslashes($ref);


$user=mysqli_escape_string($con, $user);
$msg=mysqli_escape_string($con, $msg);
//$ref=mysqli_escape_string($con, $ref);


//$date_t = new DateTime("d-m-Y");
//$time_t = new DateTime("h:i");

$tz = 'Africa/Lagos';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
$dt->setTimestamp($timestamp); //adjust the object to correct timestamp
$date_t = $dt->format('d-m-Y');
$time_t = $dt->format('h:i a');


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
	 $path="../admin/images/".$pic;
	 move_uploaded_file($_FILES['file']['tmp_name'],$path);
	}
	}




    $sql=$con->query("INSERT INTO messages (user, sender, msg, data_type, msg_type, role,  status,  date_t, time_t) 
      VALUES ('$user', '$user',  '$pic', 'Image',  'Sender', 'Sender',  'New', '$date_t', '$time_t')") or die("Error: ".mysqli_error($con));
      
  
if($sql)
{
    
   
    $suc = "Yes";
    
    $msg = ' <div class="clearfix"></div>
                <div class="d-fledx float-right">
                    <div class="speech-bubble speech-left bg-highlight">
                         <img src="porlt.diimtech.com//admin/images/'.$pic.'" height="80">
 
                   </div>
                    <div class="timebox mr-5" style"margin-top:-10px;">
                        <!--<img src="images/pictures/6s.jpg" data-src="images/pictures/6s.jpg" width="40" height="40" class="rounded-circle preload-img">-->
                        <p>'.$time_t.' </p>
                    </div>
                </div>';
        
}


$output = array('success'=>$suc, 'msg'=>$msg);
echo $_GET['callback']."(".json_encode($output).")"; //output JSON data

?>
