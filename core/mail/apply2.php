<?php
// Check for empty fields
if(empty($_POST['fname'])      ||
   empty($_POST['lname'])     ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['addr'])     ||
   empty($_POST['city'])     ||
   empty($_POST['msg']) ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['msg'];
$addr = $_POST['addr'];
$city = $_POST['city'];
$course = $_POST['course'];
$location = $_POST['location'];
   

// Create the email and send the message
$to = 'info@diimtech.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$to2 = 'diimtech@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Web Training Contact Form:  $fname $lname.";
$email_body = "You have received a new request from your Web Training contact form.\n\n"."Here are the details:\n\nName: $fname $lname\n\nEmail: $email_address\n\nPhone: $phone\n\n Course: $course\n\n Address: $addr\n\nCity: $city\n\n Location: $location\n\nMessage:\n$message";
$headers = "From: noreply@diimtech.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
$mail=mail($to,$email_subject,$email_body,$headers);
//$mail2=mail($to2,$email_subject,$email_body,$headers);

if($mail)
{
   header("location:../apply2.php?y=y");
}
else
{
   header("location:../apply2.php?y=n");  
}
?>