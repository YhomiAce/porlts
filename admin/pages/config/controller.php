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

?>