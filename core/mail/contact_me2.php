<?php
// Check for empty fields
if(empty($_POST['fname'])      ||
   empty($_POST['lname'])     ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['addr'])     ||
   empty($_POST['school'])     ||
   empty($_POST['msg']) ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$fname = $_POST['fname'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['msg'];
$addr = $_POST['addr'];
$school = $_POST['school'];
$lname = $_POST['lname'];
   

// Create the email and send the message
$to = 'support@diimtech.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$to2 = 'diimtech@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "FEBA PROJECT Contact Form:  $fname $lname.";
$email_body = "You have received a new request from your FEBA project contact form.\n\n"."Here are the details:\n\nName: $fname $lname\n\nEmail: $email_address\n\nPhone: $phone\n\n School: $school\n\nMessage:\n$message";
$headers = "From: noreply@diimtech.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
$mail=mail($to,$email_subject,$email_body,$headers);
//$mail2=mail($to2,$email_subject,$email_body,$headers);

if($mail)
{
   header("location:../apply.php?y=y");
}
else
{
   header("location:../apply.php?y=n");  
}
?>