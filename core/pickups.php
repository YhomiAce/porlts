<?php
session_start();
include 'config.php';

$user=$_GET['user'];

$sql="SELECT * FROM drop_offs WHERE carrier_id = '$user' AND status = 'Accepted' AND payment_status = 'Successful'";
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
$parcel_id = $rows['parcel_id'];

$sender = $rows['sender'];
$sender_phone = $rows['sender_phone'];

$earned = $rows['earned'];



$origin_address = $rows['origin_terminal_address'];
$des_address = $rows['des_terminal_address'];



$date_t = $rows['date_t'];

$pickups .= '<div class="card d-fdlex border-0  p-3 contendt mt-0 mb-1">
                <div class="pickup list-group list-custom-large check-vsisited">
                    <a class="border-0" href="#">

                        <div class="v float-left">
                            <ul>
                                <li></li>
                            </ul>
                        </div>
                        <span class="color-green">Pickup Location</span>
                        <strong>'.$origin_address.', '.$origin_city.'  </strong>

                        <div class="h float-right">
                            <i class="fa fa-plus"></i>
                        </div>
                    </a>
                </div>
                <hr>
                <div class="list-group list-custom-large check-vissited">
                    <a class="border-0" href="#">

                        <div class="v float-left">
                            <ul>
                                <li></li>
                            </ul>
                        </div>
                        <span>Destination Location</span>
                        <strong>'.$des_address.', '.$des_city.'</strong>

                        <div class="h float-right">
                            <i class="fa  fa-times fa-3x"></i>
                        </div>
                 </a>
                        </div>
                        <hr>
                        <div class=" d-flex mt-3 ">


                            <div class="cdol v floatf-left">

                                <span style="color:blue; font-weight:bold;">Sender\'s Name</span><br>
                                <strong>'.$sender.'</strong>

                            </div>

                            <div class="d-flex text-center">
                                <div class="cdol d-">
                                    <h1><a href="tel:'.$sender_phone.'"><i class="fa fa-phone e bg-green-dark"></i></a></h1>
                                    <p style="width: 100%;"><span>Call Sender</span></p>

                                </div>
                               <!-- <div class="col d-fex">
                                    <h1><a href="message.html"><i class="fab fa-facebook-messenger bg-blue-dark"></i></a></h1>
                                    <p style="width: 100%;"><span>Message Sender</span></p>

                                </div>-->
                            </div>


                        </div>


                    </div>
            
            <div class="responsive-iframe  ho dposition-absolute">
    <iframe
  width="600"
  height="450"
  style="border:0"
  loading="lazy"
  allowfullscreen
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyArX8SBQSglOi_UdcV9x5b6ugfjvfaXFHI
    &q='.$origin_address.'">
</iframe>            </div>
            <div class="contentd position-relative">
                <div class="receiver-op " style="width: 100%;">
                    <div class="box-earn p-3 bg-dark ">
                        <center>
                            <strong class="color-white-dark font-weight-normal">Estimated Pickup Time: 4mins</strong>
                            <h4 class="color-yellow-dark ">
                              #'.number_format($earned).'
                                          </h4>
                            <strong class="font-weight-normal color-white ">Fare Estimated</strong>
                        </center>
                        <center>
                            <div class="content ">
                                <a href="#" data-toast="toast-2" class="btn color-white rounded-s btn-warning btn-full" onclick = "pickup(\''.$parcel_id.'\')" style="width: 60%; ">Confirm Pickup</a>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>

    </div>'; 


}
}
else
{
  $pickups .= '<p style="padding:10px; color:black;">No pickups at the moment.</p>'; 

 
}
}
$output = array('pickups'=>$pickups, 'count'=>$countx);
echo $_GET['callback']."(".json_encode($output).")"; //output JSON data
//mysql_close($con);
?>

