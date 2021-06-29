<?php
session_start();
require 'config.php';
require("mail/class.phpmailer.php");


$name=$_GET['name'];
$email=$_GET['email'];
$phone=$_GET['phone'];
$password=$_GET['password'];

$name=stripslashes($name);
$email=stripslashes($email);
$phone=stripslashes($phone);
$password=stripslashes($password);


$name=mysqli_escape_string($con, $name);
$email=mysqli_escape_string($con, $email);
$phone=mysqli_escape_string($con, $phone);
$password=mysqli_escape_string($con, $password);

$len = strlen($phone); 

/*if($len == 11)
{
   $phone = substr($phone, 1, 10 );
    $phone = "+234".$phone;
}
elseif($len == 10)
{
    $phone = $phone;
        $phone = "+234".$phone;

}*/

$password = sha1($password);




$sql1="SELECT * FROM porlt_users WHERE email='$email'";
$result1=$con->query($sql1) or die ("error1: Server error ".mysqli_error($con));

$sql2="SELECT * FROM porlt_users WHERE phone='$phone'";
$result2=$con->query($sql2) or die ("error1: Server error ".mysqli_error($con));



if($result1 && $result2)
{
  $count=mysqli_num_rows($result1);
  $count2=mysqli_num_rows($result2);

 
  if($count>=1)
  {
      $suc = "Exist"; 
 }

else if($count2 >= 1)
  {
      $suc = "Phone"; 
 }


  else{


   $date_t = date("d-M-Y"); 
   
   $pic_size=$_FILES['pic']['size'];


	$allowed_files=array("image/jpeg","image/jpg","image/png");

	if($pic_size > 0)
	{
    $pic=$_FILES['pic']['name'];
	$pic_type=$_FILES['pic']['type'];
	$kaboom = explode(".", $pic);
	$fileExt = end($kaboom);
	$pic = rand(100000000000,999999999999).$user.".".$fileExt;
	if(in_array($pic_type, $allowed_files))
	{
	 $path="../admin/users/".$pic;
	 move_uploaded_file($_FILES['pic']['tmp_name'],$path);
	}
	}


    $sql=$con->query("INSERT INTO porlt_users (fulname,  email, phone, password, status, date_t) 
      VALUES ('$name', '$email', '$phone', '$password', 'Registered', '$date_t')") or die("Error: ".mysqli_error($con));
 
  
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
$mail2->AddAddress($email);
$mail2->AddReplyTo("noreply@diimtech.com");


$mail2->WordWrap = 50;                                 // set word wrap to 50 characters
//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
$mail2->IsHTML(true);                                  // set email format to HTML

$mail2->Subject = "Account Under Review";
$mail2->Body    = '<!DOCTYPE HTML>     
    <html>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
</head>
<body>
<div style="dbackground-color:#eee; border:solid; border-width:thin; border-color:#EEE; position: relative; font-size:15px; padding-top:2em; padding:1em; font-family:Verdana, Geneva, sans-serif">


<h2>
Your Account is currently under Review.
</h2>

			
</div>
</body>
</html>';


if($mail2->Send())
{

} 
   
 $suc = "YES"; 

}
}
}

$output = array('success'=>$suc);
echo $_GET['callback']."(".json_encode($output).")"; //output JSON data

?>
