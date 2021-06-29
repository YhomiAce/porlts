<?php
session_start();
include 'config.php';

$user=$_GET['user'];

$sql="SELECT * FROM drop_offs WHERE carrier_id = '$user' AND status = 'Picked Up' AND payment_status = 'Successful'";
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
$parcel_size = $rows['parcel_size'];
$parcel_weight = $rows['parcel_weight'];
$status = $rows['status'];


$origin_address = $rows['origin_terminal_address'];
$des_address = $rows['des_terminal_address'];
$parcel_id = $rows['parcel_id'];




$date_t = $rows['date_t'];

$routes .= '<div class="card card-fixed -mt mb-n5" data-card-height="450">
            <div class="map-full ho">
   <iframe
  width="600"
  height="450"
  style="border:0"
  loading="lazy"
  allowfullscreen
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyArX8SBQSglOi_UdcV9x5b6ugfjvfaXFHI
    &q='.$des_address.'">
</iframe>
</div>
        </div>
        <div class="card card-clear" data-card-height="450"></div>
        <div class="page-content pb-3">

            <div class="card card-full rounded-m pb-4">
                <div class="drag-line"></div>
                <div class="content" style="line-height:10px;">
                    <p class="font-600 mb-n1 color-highlight"><i class="fa fa-chevron-up"></i> DESTINATION</p>

                    <br>
                        '.$des_city.'
                    </p>
                    
                     <p class="font-600 mb-n1 color-highlight" dstyle=""padding-top:-50px;><i class="fa fa-chevron-up"></i> ADDRESS</p>

                    <br>
                        '.$des_address.'
                    </p>

                    <div class="divider mt-3 mb-3"></div>
                    <div class="d-flex">

                        <div class="w-100 pl-3" style="line-height: 25px;">
                            <h4 class="mb-0">Package Details</h4>
                            <p class="font-600 mb-n1 dcolor-highlight">Parcel Type - '.$parcel_type.'</p>
                            <p class="font-600 mb-n1 dcolor-highlight">Parcel Size - '.$parcel_size.'</p>
                            <p class="font-600 mb-n1 dcolor-highlight">Parcel Weight - '.$parcel_weight.'</p>
                           
                        </div>
                    </div>
                    <div class="divider mt-3 mb-3"></div>

                    <a href="#" data-back-to-top class="btn gradient-blue btn-full btn-m font-700 font-12 mt-4 rounded-s">Back to Map</a>
                </div>
            </div>
        </div>'; 


}
}
else
{
   //$routes .= 'No Intra state pickups at the moment.'; 
 
}
}
$output = array('routes'=>$routes, 'count'=>$countx);
echo $_GET['callback']."(".json_encode($output).")"; //output JSON data
//mysql_close($con);
?>

