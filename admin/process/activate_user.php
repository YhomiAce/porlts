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
    if ($status == "Verified") {
        echo "verified";
    }else{
        
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->SMTPDebug  = 0;
            $mail->Username   = "1e544c5e5f7d79";                    
            $mail->Password   = "e841d92282037e";                              
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

            $mail->Subject = "Account Activated";
            $mail->Body    = '<!DOCTYPE HTML>     
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