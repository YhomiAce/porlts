<?php
if(isset($_GET['user']))
{
session_start();
include 'config.php';

$user=$_GET['user'];

$sql="SELECT * FROM porlt_users WHERE email = '$user'";
$result=$con->query($sql) or die ("error: Server error ".mysqli_error($con));
$countx = mysqli_num_rows($result);

if($result)
{
 
$rows=mysqli_fetch_array($result);
$id = $rows['id'];
$fulname = $rows['fulname'];
$phone = $rows['phone'];
$email = $rows['email'];


$bal = $rows['wallet'];
$pic = $rows['pic'];


$pro_pic = "http://porlt.diimtech.com/admin/users/".$pic;

$fulnamex = $fulname;

$date_t = $rows['date_t'];
$fulname = substr($fulname, 0, 10);
$fulname = $fulname."...";

}

$wallet = "&#8358;".number_format($bal);


$pickup_cities = '<option value="" disabled="" selected="">Pickup City</option>';
                         
$des_cities = '<option value="" disabled="" selected="">Destination City</option>';

$weight = '<option value="" disabled="" selected="">Package Weight</option>';
                               
                               
$sql1=$con->query("SELECT * FROM des_cities ORDER BY cities ASC") or die("Error2 : ". mysqli_error($con));

  while ($rows=mysqli_fetch_array($sql1))
   {
    $id=$rows['id'];
    $des_city = $rows['cities'];
    $des_city = '<option>'.$des_city.'</option>';
    $des_cities .= $des_city;
    
    
   }


$sql2=$con->query("SELECT * FROM pickup_cities ORDER BY cities ASC") or die("Error2 : ". mysqli_error($con));

  while ($rows=mysqli_fetch_array($sql2))
   {
    $id=$rows['id'];
    $pickup_city = $rows['cities'];
    $pickup_cities .= '<option>'.$pickup_city.'</option>';
    
   }




$sql2=$con->query("SELECT * FROM kg_range ORDER BY kg ASC") or die("Error2 : ". mysqli_error($con));

  while ($rows=mysqli_fetch_array($sql2))
   {
    $id=$rows['id'];
    $kg = $rows['kg'];
    $kg = '<option>'.$kg.'</option>';
    $weight .= $kg;
    
    }



$output = array('wallet'=>$wallet, 'des_city'=> $des_cities, 'pickup_city'=> $pickup_cities, 'weight'=> $weight,  'email' => $email, 'fulname' => $fulname, 'pro_pic'=>$pro_pic, 'fulnamex' => $fulnamex, 'phone' => $phone);
echo $_GET['callback']."(".json_encode($output).")"; //output JSON data
//mysql_close($con);
}
?>

