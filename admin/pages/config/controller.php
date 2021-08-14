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
        $save = createInterStateCost($conn, $state1, $state2,$kg, $cost, $discount, $earned, $insurance, $date_t);
        
        if ($save) {
            echo "success";
        }else{
            echo "fail";
        }
    }

    if (isset($_POST['approveId'])) {
        $id = $_POST['approveId'];
        $data = fetchWithdraw($conn, $id);
        $email = $data['user'];
        $user = getUserDetails($conn, $email);
        $wallet = $user['wallet'];
        $name = $user['fulname'];
        $phone = $user['phone'];
        $request = fetchWithdraw($conn, $id);
        $bank = $request['bank'];
        $account_num = $request['account_num'];
        $account_name = $request['account_name'];
        $amount = $request['amount'];
        $balance = $wallet - $amount;
        $date_t=date("d-M-Y");
        
        if ($wallet < $amount) {
            echo "balance";
        }else{
            $approve = approvePayement($conn, $id, $date_t);
            if ($approve) {
                $updateWallet = updateUserBalance($conn, $email, $balance);
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
        
                    $mail->Subject = "Approved Withdrawal";
                    $mail->Body    = '<!DOCTYPE HTML>     
                        <html>
                    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
                    </head>
                    <body>
                    <div style="dbackground-color:#eee; border:solid; border-width:thin; border-color:#EEE; position: relative; font-size:15px; padding-top:2em; padding:1em; font-family:Verdana, Geneva, sans-serif">
        
        
                    <h2>
                    Congratulations! Your Withdraw Request for Amount '.$amount.' naira  has just been Approved.
                    </h2>
                    
                    <h3>Request Details</h3>
                    <h5>Amount Requested: N'. $amount.' </h5>
                    <h5>Customer Name: '. $name.' </h5>
                    <h5>Customer Email: '. $email.' </h5>
                    <h5>Customer Phone: '. $phone.' </h5>
                    <h3>Account Details</h3>   
                    <h5>Account Number: '. $account_num.' </h5>   
                    <h5>Account Name: '. $account_name.' </h5>   
                    <h5>Bank: '. $bank.' </h5>
                    <h5>Date Approved: '. $date_t.' </h5>
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
        $wallet = $user['wallet'];
        $name = $user['fulname'];
        $phone = $user['phone'];
        $request = fetchWithdraw($conn, $id);
        $bank = $request['bank'];
        $account_num = $request['account_num'];
        $account_name = $request['account_name'];
        $amount = $request['amount'];
        $balance = $wallet - $amount;
        $date_t=date("d-M-Y");

        $disapprove = disapprovePayement($conn, $id);
        if ($disapprove) {
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
    
                $mail->Subject = "Disapproved Withdrawal";
                $mail->Body    = '<!DOCTYPE HTML>     
                    <html>
                <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
                </head>
                <body>
                <div style="dbackground-color:#eee; border:solid; border-width:thin; border-color:#EEE; position: relative; font-size:15px; padding-top:2em; padding:1em; font-family:Verdana, Geneva, sans-serif">
    
    
                <h2>
                Sorry! Your Withdraw Request for Amount '.$amount.' naira  has just been Disapproved. Contact Admin for more information
                </h2>
                
                <h3>Request Details</h3>
                <h5>Amount Requested: N'. $amount.' </h5>
                <h5>Customer Name: '. $name.' </h5>
                <h5>Customer Email: '. $email.' </h5>
                <h5>Customer Phone: '. $phone.' </h5>
                <h3>Account Details</h3>   
                <h5>Account Number: '. $account_num.' </h5>   
                <h5>Account Name: '. $account_name.' </h5>   
                <h5>Bank: '. $bank.' </h5>
                
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