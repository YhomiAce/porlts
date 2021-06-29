<?php
session_start();
include 'config.php';
if($_GET['user'])
{
$user=$_GET['user'];
$user=stripslashes($user);


$sql="SELECT * FROM porlt_users WHERE phone='$user' OR email='$user'";
$result=$con->query($sql) or die ("error: Server error ".mysqli_error($con));


if($result)
{
  $count=mysqli_num_rows($result);
if($count == 1)
{

$rows = mysqli_fetch_array($result);
$phone = $rows['phone'];
$email = $rows['email'];
$name = $rows['fulname'];

$code = rand(00000, 99999);


$sqlx="UPDATE porlt_users set reset_code = '$code' WHERE email='$user' OR phone='$user'";
$resultx=$con->query($sqlx) or die ("error: Server error ".mysqli_error($con));


require("mail/class.phpmailer.php");

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

$mail2->Subject = "Password Reset Code";
$mail2->Body    = '<!DOCTYPE HTML>     
    <html>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
</head>
<body>
<div style="dbackground-color:#eee; border:solid; border-width:thin; border-color:#EEE; position: relative; font-size:15px; padding-top:2em; padding:1em; font-family:Verdana, Geneva, sans-serif">


<h2>
Your Password Reset Code is '.$code.' .
</h2>

			
</div>
</body>
</html>';


if($mail2->Send())
{
 $suc = "YES"; 
} 
}
	elseif($count == 0)
	{
          $suc="ACC";
	}
	else
	{
		$suc = "NO";
	}

}
	
	

if(isset($_GET['callback']))
{
header("Content-Type:application/json");
}

$output = array('success'=>$suc, 'name' => $name, 'phone' => $phone, 'email' => $email);
echo $_GET['callback']."(".json_encode($output).")"; //output JSON data

}
?>
