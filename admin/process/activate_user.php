<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);


    // require("mail/class.phpmailer.php");
    include 'config/config.php';
    // Load Composer's autoloader
    require 'config/vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

  

    $mail = new PHPMailer();

    if(isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $sqlx="SELECT * FROM  porlt_users WHERE  id = '$id'";
    $resultx=$con->query($sqlx) or die ("error: Server error ".mysqli_error($con));
    $rowsx = mysqli_fetch_array($resultx);
    $email = $rowsx['email'];
    $status = $rowsx['status'];
    $name = $rowsx['fulname'];
    if ($status == "Verified") {
        echo "verified";
    }else{
        
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->SMTPDebug  = 0;
            $mail->Username   = "a45da6cddd10cd";                    
            $mail->Password   = "9c297ff39a7ea9";                             
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
            $mail->Port       = 587;

            $mail->From = "support@diimtech.com";
            $mail->FromName = "Porlt App";
            $mail->addAddress($email);
            $mail->addReplyTo("noreply@diimtech.com");


            $mail->WordWrap = 50;                                 // set word wrap to 50 characters
            //$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
            //$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
            $mail->IsHTML(true);                                  // set email format to HTML

            $mail->Subject = "Account Activation Notice";
            $mail->Body    = '<!DOCTYPE HTML>     
                        <html>
                    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
                    </head>
                    <body>
                    <div style="dbackground-color:#eee; border:solid; border-width:thin; border-color:#EEE; position: relative; font-size:15px; padding-top:2em; padding:1em; font-family:Verdana, Geneva, sans-serif">
                    <p>
                        Dear  '.$name.',
                    </p>
                    
                    <p>Congratulations! Your account has just been activated for use.</p>

                    <p>
                    You can now use our service to send packages across and within states at an 
                    affordable rate or to deliver packages and earn some cool cash as you travel.
                    </p>

                    <p>
                    Invite your family and friends to use our service by sending your referral code 
                    found on the app to them and earn money when they send your first delivery request.
                    </p>
                    <p>Kind Regards,</p>
                    <br>
                    <p>Support Team.</p>
                    
                    <p><a href="http://www.porlt.com">porlt.com</a></p>
                    
                    <p>support@porlt.com</p>
                    
                    <p>Porlt - Where Senders Meet Travelers!</p>
                    
                    <br>
                    <h5>DISCLAIMER:</h5>
                    
                    <p style=" width:100%;" >
                    This email and any attachments are for the designated recipient only
                     and may contain confidential information. If you have received it in 
                     error, kindly notify the sender and delete the original. Disclosing, 
                     copying, distributing or taking any action based on the contents of 
                     this email is unauthorized and prohibited.  PORLT ENTERPRISE including 
                     its subsidiaries and employees accept no liability for any loss, direct, 
                     indirect or consequential, arising from information provided and actions 
                     resulting therein.  
                    </p>
                    </div>
                    </body>
                    </html>';


            if($mail->send())
            {
                $sqlx = $con->query("UPDATE  porlt_users  SET status = 'Verified' WHERE  id='$id'") or die("Error2 : ". mysqli_error($con));
                echo "success";
            }else{
                echo "fail";
            }
        } catch (Exception $e) {
            echo "fail";
        }
        
        // {

        // } 

        // $suc = "Yes";
        // }
        // else
        // {
        // $suc = "No";
        // }
        
        // $output = array('success'=>$suc);
        // echo $_GET['callback']."(".json_encode($output).")"; //output JSON data	
        } 
    }         
?>