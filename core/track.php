<?php
session_start();
include 'config.php';

$user=$_GET['user'];

$sql="SELECT * FROM drop_offs WHERE user = '$user' AND status = 'Accepted'  OR user = '$user' AND status = 'Picked Up'  ORDER BY id DESC";
$result=$con->query($sql) or die ("error: Server error ".mysqli_error($con));
$count = mysqli_num_rows($result);

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
$carrier = $rows['carrier'];
$carrier_id = $rows['carrier_id'];


$status = $rows['status'];


$origin_address = $rows['origin_terminal_address'];
$des_address = $rows['des_terminal_address'];

$date_t = $rows['date_t'];


$sqlx="SELECT * FROM porlt_users WHERE email = '$carrier_id'";
$resultx=$con->query($sqlx) or die ("error: Server error ".mysqli_error($con));
$countx = mysqli_num_rows($resultx);

if($countx == 1)
{
 
$rowsx=mysqli_fetch_array($resultx);
$id = $rowsx['id'];
$fulname = $rowsx['fulname'];
$phone = $rowsx['phone'];
$email = $rowsx['email'];

$phone = "+234".$phone;
}

$i++;

if($i<10)
{
    $ix = "0".$i;
}


$track .= '<div class="card brt border-0 card-style">
                <div class="content mb-0">
                    <div class="d-fldex mb-4 align-self-center">
                        <div class="align-self-center list-group list-custom-small list-icon-0 w100 check-visited">
                            <center><i class="fa  bg-blue-dark" style="line-height: 30px;border-radius: 50%;opacity: 1;width: 30px;text-align: center; background:#2d2e75 !important;">01</i></center>
                        </div>
                        <div class="align-self-center " style="margin-left:20px;">
                            <center>
                                <h2 class="font-15 line-height-s mt-1 mb-n1"><i class="fa fa-truck color-brown-dark pr-2"></i> Package S-L-83546</h2>
                                <p class="mb-0 font-13 mt-2 line-height-s">
                                    '.$origin_city.' <i class="fa fa-arrow-right"></i> '.$des_city.'
                                </p>
                                <p class="mb-0 font-13 mt-2 line-height-s">
                                    '.$origin_address.' <i class="fa fa-arrow-right"></i> '.$des_address.'
                                </p>
                            </center>
                        </div>';
                        
                        
                
                       
                      /* if($status == "Accepted")
                       {
                 $track .=       '<div class="ml-auto pl-3 align-self-center text-center">
                            <center><a href="" data-toast="toast-2" class="btn btn-center-l gradient-highlight  btn-xs font-13 font-600 mt-5 border-0 fl">Accepted</a>
                             </center>
                        </div>';
                       }
                       else if ($satus == "Cancelled")
                       {
                            $track .=       '<div class="ml-auto pl-3 align-self-center text-center">
                            <center> <a href="" data-toast="toast-3" class="btn btn-border btn btn-center-l btn-xs    font-600 border-blue-dark mt-5 ml-3 color-blue-dark   fl bg-theme">Canceled</a>
                                      </center>
                        </div>';
                
                       }*/
               
                    $track .=    ' <div class="ml-auto mt-3 pl-3 align-self-center text-center">
                            <center>
                                <span style="font-weight: 900;color: #333333;font-family: Arial, Helvetica, sans-serif;">CARRIER NAME : <span class="ml-2 color-blue">'.$carrier.'</span></span>
                            </center>
                        </div>';
                        
                        
                      
                 if($status == "Accepted")
                 {
                 
                $track .= '<div class="ml-auto mt-3 pl-3 align-self-center text-center" style="border-bottom:dotted; border-width:thin;">
                            <center>
                                <span style="font-weight: 900;color: #333333;font-family: Arial, Helvetica, sans-serif; text-transform:uppercase">Package <span class="ml-2 color-blue">Accepted</span></span>
                            </center>
                        </div>';
                        
                 }
                
                 if($status == "Picked Up")
                 {
                 
               $track .= '<div class="ml-auto mt-3 pl-3 align-self-center text-center" style="border-bottom:dotted; border-width:thin;">
                            <center>
                                <span style="font-weight: 900;color: #333333;font-family: Arial, Helvetica, sans-serif; text-transform:uppercase">  <span class="ml-2 color-blue">Accepted</span></span>
                            </center>
                        </div>';
                 $track .= '<div class="ml-auto mt-3 pl-3 align-self-center text-center" style="border-bottom:dotted; border-width:thin;">
                            <center>
                                <span style="font-weight: 900;color: #333333;font-family: Arial, Helvetica, sans-serif; text-transform:uppercase"><span class="ml-2 color-blue">Picked Up</span></span>
                            </center>
                        </div>';
                        
                 }
                 
                 
                 if($status == "Delivered")
                 {
                 
               $track .= '<div class="ml-auto mt-3 pl-3 align-self-center text-center" style="border-bottom:dotted; border-width:thin;">
                            <center>
                                <span style="font-weight: 900;color: #333333;font-family: Arial, Helvetica, sans-serif; text-transform:uppercase">Package <span class="ml-2 color-blue">Accepted</span></span>
                            </center>
                        </div>';
                 $track .= '<div class="ml-auto mt-3 pl-3 align-self-center text-center" style="border-bottom:dotted; border-width:thin;">
                            <center>
                                <span style="font-weight: 900;color: #333333;font-family: Arial, Helvetica, sans-serif; text-transform:uppercase">Package <span class="ml-2 color-blue">Picked Up</span></span>
                            </center>
                        </div>';
                 $track .= '<div class="ml-auto mt-3 pl-3 align-self-center text-center" style="border-bottom:dotted; border-width:thin;">
                            <center>
                                <span style="font-weight: 900;color: #333333;font-family: Arial, Helvetica, sans-serif; text-transform:uppercase">Package <span class="ml-2 color-blue">Delivered</span></span>
                            </center>
                        </div>';
                        
                 }
                 
                 
                        
                       $track .= '<div class="ml-auto mt-3 pl-3 align-self-center text-center">
                            <div class="d-flex">
                                <div class="col d-">
                                    <h1><a href="tel:'.$phone.'"><i class="fa fa-phone e bg-green-dark"></i></a></h1>
                                    <p style="width: 100%;"><span>Call Carrier</span></p>

                                </div>
                              
                            </div>

                        </div>
                    </div>


                </div>
            </div>'; 


}
}
$output = array('track'=>$track, 'count'=>$countx);
echo $_GET['callback']."(".json_encode($output).")"; //output JSON data
//mysql_close($con);
?>

