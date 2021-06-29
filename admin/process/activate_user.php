<?php
if(isset($_GET['id']))
{
$id = $_GET['id'];
require("mail/class.phpmailer.php");
include 'config/config.php';

   
$sqlx = $con->query("UPDATE  porlt_users  SET status = 'Verified' WHERE  id='$id'") or die("Error2 : ". mysqli_error($con));
 
$sqlx="SELECT * FROM  porlt_users WHERE  id = '$id'";
$resultx=$con->query($sqlx) or die ("error: Server error ".mysqli_error($con));
$rowsx = mysqli_fetch_array($resultx);
$email = $rowsx['email'];

 
 if($sqlx)
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

$mail2->Subject = "Account Activated";
$mail2->Body    = '<!DOCTYPE HTML>     
    <html>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
</head>
<body>
<div style="dbackground-color:#eee; border:solid; border-width:thin; border-color:#EEE; position: relative; font-size:15px; padding-top:2em; padding:1em; font-family:Verdana, Geneva, sans-serif">


<h2>
Congratulations! Your account has just been activated for use.
</h2>

			
</div>
</body>
</html>';


if($mail2->Send())
{

} 

 $suc = "Yes";
 }
 else
 {
 $suc = "No";
 }
 
$output = array('success'=>$suc);
echo $_GET['callback']."(".json_encode($output).")"; //output JSON data	
}

             
      ?>