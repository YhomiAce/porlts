<?php
session_start();
include 'config.php';

$user=$_GET['user'];

$sql="SELECT * FROM drop_offs WHERE carrier_id = '$user' AND status = 'Picked Up' AND payment_status = 'Successful' ORDER BY id DESC";
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
$receiver = $rows['receiver'];

$receiver_phone = $rows['receiver_phone'];



$origin_address = $rows['origin_terminal_address'];
$des_address = $rows['des_terminal_address'];



$date_t = $rows['date_t'];

$handovers .= ' <br>
            <div class="card brt2 mt-0 border-0 card-style-1">
                <div class="content mb-0">
                    <div class="card-op">
                        <h5>Package S-L-864736</h5>
                    </div>
                    <div class="card d-fdlex contendt mt-0 mb-1">

                        <div class="list-group list-custom-large check-visited">
                            <a class="border-0" href="#">

                                <div class="v float-left">
                                    <ul>
                                        <li></li>
                                    </ul>
                                </div>
                                <span>Destination Location</span>
                                <strong>'.$des_address.'</strong>

                                <div class="h float-right">
                                    <i class="fa fa-plus"></i>
                                </div>
                            </a>
                        </div>
                        <hr>
                        <div class=" d-flex mt-3 ">

                            <div class="cdol v floatf-left">

                                <span class="textcolor">Receiver\'s Name</span><br>
                                <strong>'.$receiver.'</strong>

                            </div>

                            <div class="d-flex text-center">
                                <div class="cdol d-">
                                    <h1><a href="tel:'.$receiver_phone.'"><i class="fa fa-phone e bg-green-dark"></i></a></h1>
                                    <p style="width: 100%;"><span>Call Receiver</span></p>

                                </div>
                               <!-- <div class="col d-fex">
                                    <h1><a href="message.html"><i class="fab fa-facebook-messenger bg-blue-dark"></i></a></h1>
                                    <p style="width: 100%;"><span>Message Carrier</span></p>

                                </div>-->
                            </div>


                        </div>


                    </div>
                    <div class="box-set">
                        <div class="content">
                            <label for="">Enter Your Confirmation Code</label>
                            <input type="text" id = "'.$parcel_id.'" class="form-control ft rounded-sm"> <br>
                            <center><button type="submit" onclick = "handover(\''.$parcel_id.'\')" class="btn btn-warning btn-full">CONFIRM CODE</button></center>

                        </div>
                    </div>
                </div>
            </div>'; 


}
}
else
{
   $handovers .= 'No handovers at the moment.'; 
 
}

}
$output = array('handovers'=>$handovers, 'count'=>$countx);
echo $_GET['callback']."(".json_encode($output).")"; //output JSON data
//mysql_close($con);
?>

