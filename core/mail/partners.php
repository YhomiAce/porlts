<?php
// Check for empty fields	
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$company = $_POST['company'];
	
// Create the email and send the message
$to = 'info@diimtech.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$to2 = 'diimtech@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Investor request Form:  $name";
$email_body = "You have received a new message from your website investors form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nCompany: $company\n\nMessage:\n$message";
$headers = "From: noreply@diimtech.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
mail($to2,$email_subject,$email_body,$headers);


	
// Create the email and send the message
$to = $email_address; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Thanks for your interest in Diimtech";
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
 $headers .= "From: DIIMTECH  <info@diimtech.com>\r\n";  
//$headers .= "Reply-To: $email_address";	
$headers .= "\r\n";
$email_body =  '<!DOCTYPE HTML>     
   <html>
<head>
<title>
DIIMTECH - We speak innovation.
</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
</head>
<body>
	<div style="position:absolute; width:80%; margin:50px; background-color:#F4F4F4;">
<div style=" position:relative; background-color:#004080; font-size:14px; color:white; text-align:center; padding:0.9em; font-family:Verdana, Geneva, sans-serif">
<img src="http://www.diimtech.com/img/about/diim.png" height="50" width="200">
<br><br> We speak innovation.
</div>
<div style="width:90%; position:relative; text-align:justify; font-size:15px; padding-top:2em; padding:1em; font-family:Verdana, Geneva, sans-serif">
<!--<img src="images/download (14).jpg" width="80px" height="80px"><br>-->
<p style="font-size:15px; dtext-align:center;">Thanks for your interest in Us. We apprecaite your support towards helping us becoming africa\'s largest tech compnay and delivering the best products and services to our clients and users. We will contact you if you shortly to tell you more about our company, products and services.</p>
<p style="font-size:15px;">Feel free to contact us anytime for further enquiries or help.</p> 
<p style="font-size:13px;">info@diimtech.com <br> investors@diimtech.com</p>
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