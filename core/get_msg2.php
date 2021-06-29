<?php
session_start();
include 'config.php';
$user=$_GET['user'];
//$ref=$_GET['ref'];


$sql="SELECT * FROM messages WHERE user = '$user' AND msg_type = 'Carrier'";
$result=$con->query($sql) or die ("error: Server error ".mysqli_error($con));

if($result)
{
 while ($rows=mysqli_fetch_array($result))
{

$id = $rows['id'];
$msg = $rows['msg'];
$user = $rows['user'];
$sender = $rows['sender'];
$msg_type = $rows['msg_type'];
$role = $rows['role'];

$date_t = $rows['date_t'];
$time_t = $rows['time_t'];


if($role == "Sender")
{
$sqlx="SELECT * FROM porlt_users WHERE email = '$sender'";
$resultx=$con->query($sqlx) or die ("error: Server error ".mysqli_error($con));

$rowsx=mysqli_fetch_array($resultx);
$fulname = $rowsx['fulname'];
}

else if ($role == "Admin")
{
$sqlx="SELECT * FROM admin WHERE username = '$sender'";
$resultx=$con->query($sqlx) or die ("error: Server error ".mysqli_error($con));

$rowsx=mysqli_fetch_array($resultx);
$fulname = $rowsx['fulname'];
}

if($sender !== $user)
{
$msgs .= ' <div class="d-fledx mt-4 float-left">
                    <div class="speech-bubble speech-right bg-dark color-white">';

   if($data_type == "Text")
                    {
              $msgs .=    '.$msg.';
                     
                    }
                    else if ($data_type == "Image")
                    {
           $msgs .=  '<img src="porlt.diimtech.com//admin/images/'.$pic.'" height="80">';
                    }

                 
                 $msgs .=  '</div>
                    <p style="padding-left:1px; text-align:left; padding-bottom:10px;">'.$fulname.'<br>'.$date_t.'<br>'.$time_t.'</p>
           
                    
                   <!-- <div class="timebox mr-5">
                      <!--  <img src="images/pictures/6s.jpg" data-src="images/pictures/6s.jpg" width="40" height="40" class="rounded-circle preload-img">-->
                     <!--   <p>'.$time_t.'</p>
                    </div>-->
                </div>
                <div class="clearfix"></div>';


}
else
{
$msgs .= '<div class="clearfix"></div>
                <div class="d-fledx float-right">
                    <div class="speech-bubble speech-left bg-highlight">
                    '.$msg.'
                   </div>
                      <p style="padding-left:1px; text-align:right; padding-bottom:10px;">'.$fulname.'<br>'.$date_t.'<br>'.$time_t.'</p>
           
                   <!-- <div class="timebox mr-5">
                        <!--<img src="images/pictures/6s.jpg" data-src="images/pictures/6s.jpg" width="40" height="40" class="rounded-circle preload-img">-->
                        <!--<p>'.$time_t.' </p>
                    </div>-->
                </div>';
}
}
}

$output = array('msgs'=>$msgs);
echo $_GET['callback']."(".json_encode($output).")"; //output JSON data
//mysql_close($con);
?>

