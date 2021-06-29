<?php
session_start();
include 'config.php';

$user=$_GET['user'];

$sql="SELECT * FROM drop_offs WHERE user = '$user' AND status = 'Delivered' OR user = '$user' AND status = 'Cancelled'  ORDER BY id DESC";
$result=$con->query($sql) or die ("error: Server error ".mysqli_error($con));
$countx = mysqli_num_rows($result);

if($result)
{
 $i=0;
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

$i++;

if($i<10)
{
    $ix = "0".$i;
}

$history .= '
 <div class="card brt mb-0 border-0 card-style" onclick="view_details(\''.$parcel_id.'\')" style="cursor:pointer;">
                <div class="content mb-0">
                    <div class="d-flex mb-4">
                        <div class="align-self-center list-group list-custom-small list-icon-0 check-visited">
                            <i class="fa  bg-blue-dark" style="line-height: 30px;border-radius: 50%;opacity: 1;width: 30px;text-align: center; background:#2d2e75 !important;">'.$ix.'</i>
                        </div>
                        <div class="align-self-center " style="margin-left:20px;">
                            <h2 class="font-15 line-height-s mt-1 mb-n1"><i class="fa fa-truck color-brown-dark pr-2"></i> &nbsp;'.$parcel_type.' - '.$parcel_id.'</h2>
                            <p class="mb-0 font-13 mt-2 line-height-s">
                                '.$origin_city.' <i class="fa fa-arrow-right"></i>  '.$des_city.'
                            </p>
                       <p class="mb-0 font-13 mt-2 line-height-s">
                                '.$origin_address.' <i class="fa fa-arrow-right"></i>  '.$des_address.'
                            </p>
                                    <h5 class="amount" style="font-size:13px; font-weight:bold;">'.$status.'</h5>
                        </div>
                        <div class="ml-auto pl-3 align-self-center text-center">
                            <i class="fa fa-angle-right"></i>
                        </div>
                    </div>


                </div>
            </div>';
           




}
}
else
{
   //$drop_offs .= 'No package history at the moment. Try and send a package for delivery'; 
 
}

}
$output = array('history'=>$history, 'count'=>$countx);
echo $_GET['callback']."(".json_encode($output).")"; //output JSON data
//mysql_close($con);
?>

