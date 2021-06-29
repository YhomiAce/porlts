<?php
session_start();
include 'config.php';

$user=$_GET['user'];

$sql="SELECT * FROM drop_offs WHERE carrier_id = '$user' AND status = 'Delivered' ORDER BY id DESC";
$result=$con->query($sql) or die ("error: Server error ".mysqli_error($con));
$countx = mysqli_num_rows($result);

if($result)
{
 
if($countx >= 1)
{
while($rows=mysqli_fetch_array($result))
{

$id = $rows['id'];
$origin_city = $rows['origin_city'];
$des_city = $rows['des_city'];
$parcel_id = $rows['parcel_id'];
$parcel_type = $rows['parcel_type'];
$status = $rows['status'];


$origin_address = $rows['origin_terminal_address'];
$des_address = $rows['des_terminal_address'];



$date_t = $rows['date_t'];

$drop_offs .= '<a href="#" style="text-decoration:none;" onclick="task_details(\''.$parcel_id.'\')">
                    <li class="ba-single-transaction style-two">
                    <!--<div class="thumb">
                        <img src="assets/img/icon/location.png" alt="img">
                    </div>-->
                    <div class="details">
                        <h5 style="font-weight:bold; color:green;"><i class="fa fa-truck" style="color: green; font-size: 18px;"></i>&nbsp;'.$parcel_type.' - '.$parcel_id.'</h5>
                        <p>'.$origin_city.' <span class="glyphicon glyphicon-arrow-right	
"></span> '.$des_city.' </p>
                        <p>'.$origin_address.'  <span class="glyphicon glyphicon-arrow-right	
"></span>  '.$des_address.'</p>
                                <h5 class="amount" style="font-size:13px; font-weight:bold;">'.$status.'</h5>
                
                    </div>
                </li></a>'; 


}
}
else
{
   $drop_offs .= 'You do not have a pickup history yet.'; 
 
}

}
$output = array('drop_offs'=>$drop_offs, 'count'=>$countx);
echo $_GET['callback']."(".json_encode($output).")"; //output JSON data
//mysql_close($con);
?>

