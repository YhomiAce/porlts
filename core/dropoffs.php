<?php
session_start();
include 'config.php';

$user=$_GET['user'];
$origin=$_GET['origin'];
$des=$_GET['des'];
$type=$_GET['type'];



$sql="SELECT * FROM drop_offs WHERE origin_city = '$origin' AND des_city = '$des' AND status = 'Pending' AND payment_status = 'Successful'";
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

$earned = $rows['earned'];



$origin_address = $rows['origin_terminal_address'];
$des_address = $rows['des_terminal_address'];



$date_t = $rows['date_t'];

$drop_offs .= '<div class="list-starts ">
                    <div class="bg-white p-5 mt-0 ">
                        <h5><span class="color-blue pr-2">02</span> '.$parcel_type.'-'.$parcel_id.'</h5>
                    </div>
                    <div class="content -mt mb-0 ">

                        <div class="card card-style d-fdlex p-3 contendt mt-0 mb-1 ">

                            <div class=" list-group list-custom-large check-visited" style="line-height:5px;">
                                <a class="border-0 " href="# ">

                                    <div class="v float-left ">
                                        <ul>
                                            <li></li>
                                        </ul>
                                    </div>
                                    <span class="color-green ">Orign City</span>
                                    <strong>'.$origin_city.'</strong>
                                    <br>
                                     <span class="color-green ">Orign Terminal Address</span>
                                   <strong>'.$origin_address.'</strong>
                                    <br>
                                    


                                </a>
                            </div>
                            <hr>
                            <div class="receiver-op list-group list-custom-large check-visited ">
                                <a class="border-0 " href="# ">

                                    <div class="v float-left ">
                                        <ul>
                                            <li></li>
                                        </ul>
                                    </div>
                                    <span>Destination City</span>
                                    <strong>'.$des_city.'</strong>
                                    <br>
                                      <span>Destination Terminal Address</span>
                                   <strong>'.$des_address.'</strong>
                                   <br>
                                    
                                </a>
                            </div>
                            <hr>
                            <div class="receiver-op">
                                <div class="box-earn p-3 bg-dark ">
                                    <center>
                                        <h4 class="color-yellow-dark ">
                                            #'.number_format($earned).'
                                        </h4>
                                        <strong class="font-weight-normal color-white ">Carrier Earn</strong>
                                    </center>
                                </div>
                            </div>
                            
                             <center>
                <div class="content ">
                    <a href="#" data-toast="toast-2" class="btn rounded-s btn-warning btn-full" onclick = "accept(\''.$parcel_id.'\')" style="width: 60%; ">Accept</a>
                </div>
            </center>
                        </div>

                    </div>
                </div>
            </div>'; 


}
}
else
{
   $drop_offs .= '<p style="padding:10px;">No drop-offs at the moment.</p>'; 
 
}

}
$output = array('drop_offs'=>$drop_offs, 'count'=>$countx);
echo $_GET['callback']."(".json_encode($output).")"; //output JSON data
//mysql_close($con);
?>

