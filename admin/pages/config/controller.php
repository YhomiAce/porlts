<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Load Composer's autoloader
    require 'vendor/autoload.php';
    require_once "conn.php";
    require_once "actions.php";

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    if (isset($_POST['deleteID'])) {
        $id =$_POST['deleteID'];
        deleteDestinationArea($conn, $id);
    }
    
    if (isset($_POST['deletePickup'])) {
        $id =$_POST['deletePickup'];
        deletePickupArea($conn, $id);
    }

    if (isset($_GET['changeState'])) {
        $stateId =$_GET['changeState'];
        $results = fetchAllDestinationStateAreas($conn, $stateId);
        $output ="";
        if($results){
            $output .='
            <label for="">Select Origin Area</label>
            <select name="origin" id="origin" class="form-control" required >
              <option value="" selected disabled>Select Origin Area</option>';
            foreach($results as $key=>$row){
                $output .='<option value="'.$row['id'].'">'.$row['area'].': PostalCode('.$row['post_code'].')</option>';
            }
            $output .='</select>
            </div>';
            echo $output;
        }else{
            echo '<h6 class="text-secondary text-center">You have not add Areas for this state! <a href="?p=destination_area">Click To add Area</a> </h6>';
        }
    }

    if (isset($_POST['changeStateDestination'])) {
        $stateId =$_POST['changeStateDestination'];
        $results = fetchAllDestinationStateAreas($conn, $stateId);
        $output ="";
        if($results){
            $output .='
            <label for="">Select Destination Area</label>
            <select name="destination" id="destination" class="form-control" required >
              <option value="" selected disabled>Select Destination Area</option>';
            foreach($results as $key=>$row){
                $output .='<option value="'.$row['id'].'">'.$row['area'].': PostalCode('.$row['post_code'].')</option>';
            }
            $output .='</select>
            </div>';
            echo $output;
        }else{
            echo '<h6 class="text-secondary text-center">You have not add Areas for this state! <a href="?p=destination_area">Click To add Area</a> </h6>';
        }
    }

    if (isset($_POST['action']) && $_POST['action'] == "Add_Intra_State_Cost") {
        // print_r($_POST);
        $stateId = $_POST['state'];
        $originId = $_POST['origin'];
        $destinationId = $_POST['destination'];
        $kgId = $_POST['kg'];
        $cost = $_POST['cost'];
        $discount = $_POST['discount'];
        $earned = $_POST['earned'];
        $insurance = $_POST['insurance'];

        $stateDetails = destinationDetails($conn, $stateId);
        $state = $stateDetails['cities'];

        $kgDetails = weightDetails($conn, $kgId);
        $kg = $kgDetails['kg'];

        $ori = destinationAreaDetails($conn, $originId);
        $origin = $ori['area'];
        $origin_code = $ori['post_code'];

        $des = destinationAreaDetails($conn, $destinationId);
        $destination = $des['area'];
        $destination_code = $des['post_code'];
        
        $save = createIntraStateCost($conn, $state, $origin, $origin_code, $destination, $destination_code, $kg, $cost, $discount, $earned, $insurance);
        
        if ($save) {
            echo "success";
        }else{
            echo "fail";
        }
    }

    if (isset($_POST['deleteIntraCost'])) {
        $id =$_POST['deleteIntraCost'];
        deleteIntraCost($conn, $id);
    }


    if (isset($_POST['action']) && $_POST['action'] == "Edit_Intra_State_Cost") {
        // print_r($_POST);
        $state = $_POST['edit_state'];
        $origin = $_POST['edit_origin'];
        $origin_code = $_POST['origin_post_code'];
        $destination_code = $_POST['destination_post_code'];
        $destination = $_POST['edit_destination'];
        $kgId = $_POST['edit_kg'];
        $cost = $_POST['edit_cost'];
        $discount = $_POST['edit_discount'];
        $earned = $_POST['edit_earned'];
        $insurance = $_POST['edit_insurance'];
        $id = $_POST['id'];
        
        $kgDetails = weightDetails($conn, $kgId);
        $kg = $kgDetails['kg'];

        $save = updateIntraStateCost($conn,$id,$state, $origin, $origin_code, $destination, $destination_code, $kg, $cost, $discount, $earned, $insurance);
        if ($save) {
            echo "success";
        }else{
            echo "fail";
        }

        
        
    }

    if (isset($_POST['deleteParcelType'])) {
        $id =$_POST['deleteParcelType'];
        deleteParcel($conn, $id);
    }

    if(isset($_POST['activateUser'])) {
        print_r($_POST);
        $id = $_POST['activateUser'];
        echo $id;
    }

    if (isset($_POST['action']) && $_POST['action'] == "Add_inter_State_Cost") {
        // print_r($_POST);
        $state1 = $_POST['state1'];
        $state2 = $_POST['state2'];
        $kg = $_POST['kg'];
        $cost = $_POST['cost'];
        $discount = $_POST['discount'];
        $earned = $_POST['earned'];
        $insurance = $_POST['insurance'];
        $date_t=date("d-M-Y");
        $check = checkInterState($conn, $state1, $state2, $kg);
        $check2 = checkInterState2($conn, $state1, $state2, $kg);
        if ($state1 == $state2) {
            echo "same";
        }elseif ($check) {
            echo "exist";
        }elseif($check2){
            echo "exist";
        }else{
            $save = createInterStateCost($conn, $state1, $state2,$kg, $cost, $discount, $earned, $insurance, $date_t);
        
            if ($save) {
                echo "success";
            }else{
                echo "fail";
            }
        }
        
    }

    if (isset($_POST['approveId'])) {
        
        $id = $_POST['approveId'];
        $data = fetchWithdraw($conn, $id);
        $email = $data['user'];
        $user = getUserDetails($conn, $email);
        $userId = $user["id"];
        $walletDetails = fetchUserWallet($conn, $userId);
        $wallet = $walletDetails['balance'];
        $name = $user['fulname'];
        $phone = $user['phone'];

        $bank = $data['bank'];
        $account_num = $data['account_num'];
        $account_name = $data['account_name'];
        $amount = $data['amount'];
        $balance = $wallet - $amount;
        $date_t=date("d-M-Y");
        
        if ($wallet < $amount) {
            echo "balance";
        }else{
            $approve = approvePayement($conn, $id, $date_t);
            if ($approve) {
                $updateWallet = updateUserBalance($conn, $userId, $balance);
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
        
                    $mail->Subject = "Withdrawal Request";
                    $mail->Body    = '<!DOCTYPE HTML>     
                        <html>
                    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
                    </head>
                    <body>
                    <div style="dbackground-color:#eee; border:solid; border-width:thin; border-color:#EEE; position: relative; font-size:15px; padding-top:2em; padding:1em; font-family:Verdana, Geneva, sans-serif">
                    <p>
                        Dear '.$name.',
                    </p>
                    
                    <p>
                    We are glad to inform you that your withdrawal request has been approved.
                    </p>
                    
                    <h3>Request Details</h3>
                    <p>Amount : N'. $amount.' </p>
                    <p>Customer Name: '. $name.' </p>
                    <p>Customer Email: '. $email.' </p>
                    <p>Customer Phone: '. $phone.' </p>


                    <h3><b>Account Information</b></h3>   
                    <p>Account Number: '. $account_num.' </p>   
                    <p>Account Name: '. $account_name.' </p>   
                    <p>Bank: '. $bank.' </p>
                    <p>Date Approved: '. $date_t.' </p>
                    
                    <p>
                    Our account department will  process your request and credit your account as soon as possible.
                    </p>

                    <p>Kind Regards,</p>
                    
                    <p>Support Team.</p>
                    
                    <p><a href="http://www.porlt.com">porlt.com</a></p>
                   
                    <p>support@porlt.com</p>
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
                        
                        echo "success";
                    }else{
                        echo "fail";
                    }
                } catch (Exception $e) {
                    echo "fail";
                }
            }

        }
    }

    if (isset($_POST['disapproveId'])) {
        $id = $_POST['disapproveId'];
        $data = fetchWithdraw($conn, $id);
        $email = $data['user'];
        $user = getUserDetails($conn, $email);
        $name = $user['fulname'];
        $phone = $user['phone'];
        $bank = $data['bank'];
        $account_num = $data['account_num'];
        $account_name = $data['account_name'];
        $amount = $data['amount'];
        $balance = $wallet - $amount;
        $date_t=date("d-M-Y");

        $disapprove = disapprovePayement($conn, $id);
        if ($disapprove) {
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
    
                $mail->Subject = "Withdrawal Request";
                $mail->Body    = '<!DOCTYPE HTML>     
                        <html>
                    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
                    </head>
                    <body>
                    <div style="dbackground-color:#eee; border:solid; border-width:thin; border-color:#EEE; position: relative; font-size:15px; padding-top:2em; padding:1em; font-family:Verdana, Geneva, sans-serif">
                    <p>
                        Dear '.$name.',
                    </p>
        
                    <p>
                    Unfortunately, your withdrawal request was not approved.
                    </p>

                    <p>Kindly contact support for more information.</p>
                    
                    <h3>Request Details</h3>
                    <p>Amount : N'. $amount.' </p>
                    <p>Customer Name: '. $name.' </p>
                    <p>Customer Email: '. $email.' </p>
                    <p>Customer Phone: '. $phone.' </p>

                    
                    <h3><b>Account Information</b></h3>   
                    <p>Account Number: '. $account_num.' </p>   
                    <p>Account Name: '. $account_name.' </p>   
                    <p>Bank: '. $bank.' </p>
                    <p>Date Approved: '. $date_t.' </p>


                    <p>Kind Regards,</p>

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
                    
                    echo "success";
                }else{
                    echo "fail";
                }
            } catch (Exception $e) {
                echo "fail";
            }
        }
    }

    if (isset($_POST['deleteState'])) {
        $id =$_POST['deleteState'];
        deleteState($conn, $id);
    }

    if (isset($_POST['rejectKYC'])) {
        $id =$_POST['rejectKYC'];
        $user = getUserById($conn, $id);
        $reject = rejectKyc($conn, $id);
        $email = $user['email'];
        $username = $user['fulname'];
        // echo $username;

        if ($reject) {
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
                $mail->addReplyTo("support@porlt.com");
    
    
                $mail->WordWrap = 50;                                 // set word wrap to 50 characters
                //$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
                //$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
                $mail->IsHTML(true);                                  // set email format to HTML
    
                $mail->Subject = "KYC Status";
                $mail->Body    = '<!DOCTYPE HTML>     
                        <html>
                    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
                    </head>
                    <body>
                    <div style="dbackground-color:#eee; border:solid; border-width:thin; border-color:#EEE; position: relative; font-size:15px; padding-top:2em; padding:1em; font-family:Verdana, Geneva, sans-serif">
                    <p>
                        Dear  '.$username.',
                    </p>
                    
                    <p>
                    We are sorry to inform you that your KYC did not pass.
                    This may happen due to any of the following
                    Blurry image content, incorrect details supplied on registration, blank image uploaded.
                    </p>
                    
                    <p>For more information, please contact Porlt support.</p>
                    

                    <p>Kind Regards,</p>
                    
                    <p>Support Team.</p>
                    
                    <p><a href="http://www.porlt.com">porlt.com</a></p>
                    
                    <p>support@porlt.com</p>
                    

                    <p>Porlt - Where Senders Meet Travelers!</p>
                    <br>
                    <h5>DISCLAIMER:</h5>
                    <br>
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
                    
                    echo "success";
                }else{
                    echo "fail";
                }
            } catch (Exception $e) {
                echo "fail";
            }
        }
    }

?>