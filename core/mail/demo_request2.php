<?php
// Check for empty fields	
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$job = $_POST['job'];
$users = $_POST['users'];
$company = $_POST['company'];
	
// Create the email and send the message
$to = 'request@diimtech.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$to2 = 'diimtech@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Demo request Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nJob: $job\n\nCompany: $company\n\nEmployee base: $users\n\nMessage:\n$message";
$headers = "From: noreply@diimtech.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
mail($to2,$email_subject,$email_body,$headers);


	
// Create the email and send the message
$to = $email_address; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Thank you for your interest in Tolk";
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
 $headers .= "From: DIIMTECH  <services@diimtech.com>\r\n";  
//$headers .= "Reply-To: $email_address";	
$headers .= "\r\n";
$email_body =  '<!DOCTYPE HTML>     
   <html>
<head>
<title>
Tolk - Making Business communication faster
</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
</head>
<body>
	<div style="position:absolute; width:80%; margin:50px; background-color:#F4F4F4;">
<div style=" position:relative; background-color:#004080; font-size:14px; color:white; text-align:center; padding:0.9em; font-family:Verdana, Geneva, sans-serif">
<img src="http://www.diimtech.com/logo/talk3.png" height="50" width="200">
<br><br> Power real time communication with Tolk.
</div>
<div style="width:90%; position:relative; text-align:justify; font-size:15px; padding-top:2em; padding:1em; font-family:Verdana, Geneva, sans-serif">
<!--<img src="images/download (14).jpg" width="80px" height="80px"><br>-->
<p style="font-size:15px; dtext-align:center;">Thanks for requesting a demo of Tolk.<br> We are currently configuring your package and will send it to you as soon as possible via the email you provided.</p>
<p style="font-size:15px;">Feel free to contact us anytime for further enquiries or help.</p> 
<p style="font-size:13px;">info@diimtech.com <br> support@diimtech.com</p>
<p></p>
<div style="position:relative; background-color:#004080; height:40px; width:105%; margin-top:40px; font-size:14px; color:white; text-align:center; padding:0.9em; margin-bottom:-10px; font-family:Verdana, Geneva, sans-serif">
<p style="font-size:12px; text-align:center;"><a href="http://www.diimtech.com" style="color:white; text-decoration:none;">DIIMTECH - We speak innovation. </a></p>
</div>
</div>
</body>
</html>';
mail($to,$email_subject,$email_body,$headers);
return true;

$suc = "Yes";

$output = array ('success'=> $suc);
echo json_encode($output); //output JSON data
			
?>