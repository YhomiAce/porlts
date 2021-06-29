<?php
if(isset($_GET['user']));
{
require 'config.php';
require("mail/class.phpmailer.php");

$user = $_GET['user'];

$parcel_type=$_GET['parcel_type'];
$parcel_weight=$_GET['parcel_weight'];
$parcel_size=$_GET['parcel_size'];

$del_type = $_GET['del_type'];


$origin_city=$_GET['origin_city'];
$origin_address=$_GET['origin_address'];


$des_address=$_GET['des_address'];

$pickup_date=$_GET['pickup_date'];
$pickup_time=$_GET['pickup_time'];

$des_city=$_GET['des_city'];
$receiver=$_GET['receiver'];
$receiver_phone=$_GET['receiver_phone'];
$sender=$_GET['sender'];

$courier=$_GET['courier'];
$final_des=$_GET['final_des'];
$final_des_name=$_GET['final_des_name'];


$parcel_type=stripslashes($parcel_type);
$parcel_size=stripslashes($parcel_size);
$parcel_weight=stripslashes($parcel_weight);

$origin_city=stripslashes($origin_city);
$origin_address=stripslashes($origin_address);
$des_address=stripslashes($des_address);


$pickup_date=stripslashes($pickup_date);
$pickup_time=stripslashes($pickup_time);

$des_city=stripslashes($des_city);
$sender=stripslashes($sender);
$receiver=stripslashes($receiver);
$receiver_phone=stripslashes($receiver_phone);

$courier=stripslashes($courier);
$final_des=stripslashes($final_des);
$final_des_name=stripslashes($final_des_name);



$parcel_type = mysqli_escape_string($con, $parcel_type);
$parcel_weight = mysqli_escape_string($con, $parcel_weight);
$parcel_size = mysqli_escape_string($con, $parcel_size);

$origin_city=mysqli_escape_string($con, $origin_city);
$origin_address=mysqli_escape_string($con, $origin_address);
$des_address=mysqli_escape_string($con, $des_address);

$pickup_date=mysqli_escape_string($con, $pickup_date);
$pickup_time=mysqli_escape_string($con, $pickup_time);

$des_city=mysqli_escape_string($con, $des_city);
$sender=mysqli_escape_string($con, $sender);
$receiver=mysqli_escape_string($con, $receiver);
$receiver_phone=mysqli_escape_string($con, $receiver_phone);
$courier=mysqli_escape_string($con, $courier);
$final_des=mysqli_escape_string($con, $final_des);
$final_des_name=mysqli_escape_string($con, $final_des_name);


$sql="SELECT * FROM porlt_users WHERE email = '$user'";
$result=$con->query($sql) or die ("error: Server error ".mysqli_error($con));

$rows=mysqli_fetch_array($result);


$id = $rows['id'];
$sender_phone = $rows['phone'];


$parcel_weight=$_GET['parcel_weight'];

$del_type = $_GET['del_type'];



if($del_type == "Inter")
{
$sql=$con->query("SELECT * FROM inter_cost WHERE kg = '$parcel_weight' AND state1 = '$origin_city' AND state2 = '$des_city'") or die("Error2 : ". mysqli_error($con));

  $rows=mysqli_fetch_array($sql);
   
    $cost = $rows['cost'];
    $discount = $rows['discount'];
    $insurance = $rows['insurance'];
    $earned = $rows['earned'];
   
    
}

else
{
 $sql=$con->query("SELECT * FROM intra_cost WHERE kg = '$parcel_weight' AND state = '$des_city'") or die("Error2 : ". mysqli_error($con));

  $rows=mysqli_fetch_array($sql);
   
    $cost = $rows['cost'];
    $discount = $rows['discount'];
    $insurance = $rows['insurance'];
    $earned = $rows['earned'];
    
   
}

$total = ($cost + $insurance) - $discount;


function check_number(){

require 'config.php';

    $unique_number = rand(100000, 999999);

    $sql = $con->query("SELECT * FROM drop_offs WHERE parcel_id = '$unique_number'")  or die ("error: ".mysqli_error($con));
    $exists = mysqli_num_rows($sql);

    if ($exists >0){
        $results = check_number();
    }
     else{
            $results = $unique_number;
        return $results;
     }
}

$parcel_id = check_number();

$parcel_code = rand(00000, 99999);

$date_t = date("d-M-Y"); 

    $sql=$con->query("INSERT INTO drop_offs (user, parcel_id, parcel_code, delivery,  parcel_type, parcel_size, parcel_weight, origin_city, origin_terminal_address, des_city, des_terminal_address, pickup_date, pickup_time, sender, sender_phone, receiver, receiver_phone, courier, final_des, final_des_name, amount, discount, insurance, earned, payment_status, status, date_t) 
      VALUES ('$user', '$parcel_id', '$parcel_code', '$del_type',  '$parcel_type', '$parcel_size', '$parcel_weight',  '$origin_city', '$origin_address', '$des_city', '$des_address', '$pickup_date', '$pickup_time', '$sender', '$sender_phone', '$receiver', '$receiver_phone', '$courier', '$final_des', '$final_des_name', '$cost', '$discount', '$insurance', '$earned', 'Pending', 'Pending', '$date_t')") or die("Error: ".mysqli_error($con));
   
if($sql)
{

$mail2 = new PHPMailer();

$mail2->IsSMTP();        // set mailer to use SMTP
$mail2->Host = "diimtech.com";  // specify main and backup server
$mail2->SMTPAuth = true;     // turn on SMTP authentication
$mail2->Username = "support@diimtech.com";  // SMTP username
$mail2->Password = "Diim@tech_2020"; // SMTP password
$mail2->From = "support@diimtech.com";
$mail2->FromName = "Porlt App";
$mail2->AddAddress($user);
$mail2->AddReplyTo("noreply@diimtech.com");


$mail2->WordWrap = 50;                                 // set word wrap to 50 characters
//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
$mail2->IsHTML(true);                                  // set email format to HTML

$mail2->Subject = "Confirmation Code";
$mail2->Body    = '<!DOCTYPE HTML>     
    <html>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
</head>
<body>
<div style="dbackground-color:#eee; border:solid; border-width:thin; border-color:#EEE; position: relative; font-size:15px; padding-top:2em; padding:1em; font-family:Verdana, Geneva, sans-serif">


<h2>
YOUR CONFIRMATION CODE IS '.$parcel_code.'. You can share with carrier for confimation during handover.
</h2>

			
</div>
</body>
</html>';


if($mail2->Send())
{

} 

     $suc = "YES"; 
}


$output = array('success'=>$suc, 'package_id'=>$parcel_id, 'cost' => $total);
echo $_GET['callback']."(".json_encode($output).")"; //output JSON data
}
?>
