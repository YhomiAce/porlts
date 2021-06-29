<?php
session_start();
include 'config.php';

$user=$_GET['user'];

$sql="SELECT * FROM drop_offs WHERE user = '$user' AND payment_status = 'Successful' ORDER BY id DESC";
$result=$con->query($sql) or die ("error: Server error ".mysqli_error($con));
$countx = mysqli_num_rows($result);

if($result)
{
  $i=0;
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

$i++;

if($i<10)
{
    $ix = "0".$i;
}


$track .= '
 <div class="card brt border-0 card-style" onclick="view_details(\''.$parcel_id.'\')" style="cursor:pointer;">
                <div class="content mb-0">
                    <div class="d-fldex mb-4 align-self-center">
                        <div class="align-self-center list-group list-custom-small list-icon-0 w100 check-visited">
                            <center><i class="fa  bg-blue-dark" style="line-height: 30px;border-radius: 50%;opacity: 1;width: 30px;text-align: center; background:#2d2e75 !important;">'.$ix.'</i></center>
                        </div>
                        <div class="align-self-center " style="margin-left:20px;">
                            <center>
                                <h2 class="font-15 line-height-s mt-1 mb-n1"><i class="fa fa-truck color-brown-dark pr-2"></i>&nbsp;'.$parcel_type.' - '.$parcel_id.'</h2>
                                <p class="mb-0 font-13 mt-2 line-height-s">
                                    '.$origin_city.' <i class="fa fa-arrow-right"></i> '.$des_city.' 
                                </p>
                                <p class="mb-0 font-13 mt-2 line-height-s">
                                     '.$origin_address.' <i class="fa fa-arrow-right"></i>  '.$des_address.'
                                </p>
                            </center>
                        </div> <br>
                        
                        
                        
                        
                         <div class="d-flex text-center">
                                <div class="cdol d-">
                                    <h1><a href="tel:'.$carrier_phone.'"><i class="fa fa-phone e bg-green-dark"></i></a></h1>
                                    <p style="width: 100%;"><span>Call Sender</span></p>

                                </div>
                               <!-- <div class="col d-fex">
                                    <h1><a href="message.html"><i class="fab fa-facebook-messenger bg-blue-dark"></i></a></h1>
                                    <p style="width: 100%;"><span>Message Sender</span></p>

                                </div>-->
                            </div>

                        <div class="ml-auto pl-3 align-self-center text-center">';
                        
                        if($status == "Pending")
                        {
                            $track .= '<center>
                                <h5 style="color:blue;">STATUS: <span style="color:blue;">'.$status.'</span></h5>
                            </center>';
                        }
                        
                        else
                        {
                             $track .= '<center>
                                <h5 style="color:green ;">STATUS: <span style="color:green;">'.$status.'</span></h5>
                            </center>';
          
                        }
                        
                        $track .=  '</div>
                    </div>



                </div>
            </div>'; 


}
}
$output = array('track'=>$track, 'count'=>$countx);
echo $_GET['callback']."(".json_encode($output).")"; //output JSON data
//mysql_close($con);
?>

