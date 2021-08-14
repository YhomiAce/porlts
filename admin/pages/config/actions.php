<?php

    function testInput($data){
        $data = trim($data);
        $data = stripslashes($data); 
        $data = htmlspecialchars($data);
        return $data;
    }

    // Message 
    function displayMessage($type,$msg){
        return '<div class="alert alert-'.$type.' alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong class="text-center">'.$msg.'</strong>
        </div>';
    }

    function fetchAllWeight($conn) {
        $sql = "SELECT * FROM kg_range";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    
    function fetchAllPickupState($conn) {
        $sql = "SELECT * FROM pickup_cities";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    function savePickupArea($conn, $stateId, $area, $post_code) {
        $sql = "INSERT INTO pickup_area(state_id, area, post_code) VALUES(?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$stateId, $area, $post_code]);
        return true;
    }

    function fetchAllDestinationState($conn) {
        $sql = "SELECT * FROM des_cities";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    

    function saveDestinationArea($conn, $stateId, $area, $post_code) {
        $sql = "INSERT INTO des_area(state_id, area, post_code) VALUES(?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$stateId, $area, $post_code]);
        return true;
    }

    function fetchAllDestinationStateAreas($conn, $stateId) {
        $sql = "SELECT * FROM des_area WHERE state_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$stateId]);
        $result = $stmt->fetchAll();
        return $result;
    }

    function fetchAllPickupArea($conn, $stateId) {
        $sql = "SELECT * FROM pickup_area WHERE state_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$stateId]);
        $result = $stmt->fetchAll();
        return $result;
    }

    function searchPickupCity($conn, $q) {
        // $sql="SELECT * FROM des_cities WHERE cities LIKE '%$q%' ";
        $sql = "SELECT * FROM pickup_cities WHERE cities LIKE '%$q%'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function createPickupCity($conn, $city, $date) {
        $sql = "INSERT INTO pickup_cities(cities, date_t) VALUES(:city, :date_t)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['city'=>$city, 'date_t'=>$date]);
        return true;
    }

    function createDesCity($conn, $city, $date) {
        $sql = "INSERT INTO des_cities(cities, date_t) VALUES(:city, :date_t)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['city'=>$city, 'date_t'=>$date]);
        return true;
    }

    function searchPickupArea($conn, $q) {
        $sql = "SELECT * FROM pickup_area WHERE area LIKE '%$q%'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function countPickupAreas($conn, $stateId) {
        $sql = "SELECT * FROM pickup_area WHERE state_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$stateId]);
        $result = $stmt->rowCount();
        return $result;
    }

    function searchDestinationCity($conn, $q) {
        // $sql="SELECT * FROM des_cities WHERE cities LIKE '%$q%' ";
        $sql = "SELECT * FROM des_cities WHERE cities LIKE '%$q%'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function searchDestinationArea($conn, $q) {
        $sql = "SELECT * FROM des_area WHERE area LIKE '%$q%'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function countDestinationAreas($conn, $stateId) {
        $sql = "SELECT * FROM des_area WHERE state_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$stateId]);
        $result = $stmt->rowCount();
        return $result;
    }

    function destinationDetails($conn, $stateId) {
        $sql = "SELECT * FROM des_cities WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$stateId]);
        $result = $stmt->fetch();
        return $result;
    }

    function pickupDetails($conn, $stateId) {
        $sql = "SELECT * FROM pickup_cities WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$stateId]);
        $result = $stmt->fetch();
        return $result;
    }

    function deleteDestinationArea($conn, $id)
    {
        $sql = "DELETE FROM des_area WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        return true;
    }


    function deletePickupArea($conn, $id)
    {
        $sql = "DELETE FROM pickup_area WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        return true;
    }

    function destinationAreaDetails($conn, $id) {
        $sql = "SELECT * FROM des_area WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }

    function weightDetails($conn, $id) {
        $sql = "SELECT * FROM kg_range WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }

    function createIntraStateCost($conn, $state, $origin, $origin_code, $destination, $destination_code, $kg, $cost, $discount, $earned, $insurance)
    {
        $sql = "INSERT INTO intra_cost ( state, origin, origin_post_code, destination, destination_post_code, kg, cost, discount, multiplier, earned, insurance) VALUES(:state, :origin, :origin_code, :destination, :destination_code, :kg, :cost, :discount, '', :earned, :insurance)";
        $stmt = $conn->prepare($sql);
        
        $stmt->execute([
            "state"=>$state,
            "origin"=>$origin,
            "origin_code"=>$origin_code,
            "destination"=>$destination,
            "destination_code"=>$destination_code,
            "kg"=>$kg,
            "cost"=>$cost,
            "discount"=>$discount,
            "earned"=>$earned,
            "insurance"=>$insurance
        ]);
        
        return true;
    }

    function createInterStateCost($conn, $state1, $state2,$kg, $cost, $discount, $earned, $insurance, $date)
    {
        $sql = "INSERT INTO inter_cost ( state1, state2, kg, cost, discount, multiplier, earned, insurance, date_t) VALUES(:state1, :state2, :kg, :cost, :discount, '', :earned, :insurance, :date_t)";
        $stmt = $conn->prepare($sql);
        
        $stmt->execute([
            "state1"=>$state1,
            "state2"=>$state2,
            "kg"=>$kg,
            "cost"=>$cost,
            "discount"=>$discount,
            "earned"=>$earned,
            "insurance"=>$insurance,
            'date_t'=> $date
        ]);
        
        return true;
    }

    function fetchAllIntraStateCosts($conn) {
        $sql = "SELECT * FROM intra_cost";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    function deleteIntraCost($conn, $id)
    {
        $sql = "DELETE FROM intra_cost WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        return true;
    }

    function fetchIntraStateInformation($conn, $id){
        $sql = "SELECT * FROM intra_cost WHERE id =?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }

    function updateIntraStateCost($conn,$id,$state, $origin, $origin_code, $destination, $destination_code, $kg, $cost, $discount, $earned, $insurance)
    {
        
        $sql = 'UPDATE intra_cost SET state =:state, origin=:origin, origin_post_code=:origin_code,destination=:destination, destination_post_code=:destination_code, kg=:kg, cost=:cost, discount=:discount, earned=:earned, insurance=:insurance WHERE id=:id';
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            "state"=>$state,
            "origin"=>$origin,
            "origin_code"=>$origin_code,
            "destination"=>$destination,
            "destination_code"=>$destination_code,
            "kg"=>$kg,
            "cost"=>$cost,
            "discount"=>$discount,
            "earned"=>$earned,
            "insurance"=>$insurance,
            "id"=>$id
        ]);
        return true;
    
    }

    function SearchIntraState($conn, $q) {
        $sql = "SELECT * FROM intra_cost WHERE state LIKE '%$q%' OR origin = '$q' OR destination = '$q' OR origin_post_code = '$q' OR destination_post_code = '$q' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function SearchInterState($conn, $q) {
        $sql = "SELECT * FROM inter_cost WHERE state1 LIKE '%$q%' OR state2 = '$q' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function fetchAllInterStateCosts($conn) {
        $sql = "SELECT * FROM inter_cost";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    function saveParcel($conn, $type) {
        $sql = "INSERT INTO parcel(type) VALUES(?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$type]);
        return true;
    }

    function fetchAllParcels($conn) {
        $sql = "SELECT * FROM parcel";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    function fetchParcel($conn, $id) {
        $sql = "SELECT * FROM parcel WHERE id =?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }

    function updateParcel($conn, $type, $id) {
        $sql = "UPDATE parcel SET type = :type WHERE id =:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(["type"=>$type,"id"=>$id]);
        return true;
    }

    function deleteParcel($conn, $id) {
        $sql = "DELETE FROM parcel WHERE id =:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(["id"=>$id]);
        return true;
    }

    function SearchPArcel($conn, $q) {
        $sql = "SELECT * FROM parcel WHERE type LIKE '%$q%' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function saveKgRange($conn, $kg, $date) {
        $sql = "INSERT INTO kg_range(kg, date_t) VALUES(?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$kg, $date]);
        return true;
    }

    function fetchAllState($conn) {
        $sql = "SELECT * FROM states";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function fetchAllWithdrawal($conn) {
        $sql = "SELECT * FROM withdrawal WHERE status = 'New' ORDER BY id DESC LIMIT 0, 200";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function fetchAllApprovedWithdrawal($conn) {
        $sql = "SELECT * FROM withdrawal WHERE status = 'Approved' ORDER BY id DESC LIMIT 0, 200";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function fetchAllDisapprovedWithdrawal($conn) {
        $sql = "SELECT * FROM withdrawal WHERE status = 'Disapproved' ORDER BY id DESC LIMIT 0, 200";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function fetchWithdraw($conn, $id) {
        $sql = "SELECT * FROM withdrawal WHERE id =:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        $result = $stmt->fetch();
        return $result;
    }

    function getUserDetails($conn, $email) {
        $sql = "SELECT * FROM porlt_users WHERE email =:email";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $result = $stmt->fetch();
        return $result;
    }

    function approvePayement($conn, $id, $date) {
        $sql = "UPDATE withdrawal SET status = 'Approved', approved_date =:approve_date WHERE id =:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(["approve_date"=>$date,"id"=>$id]);
        return true;
    }

    function disapprovePayement($conn, $id) {
        $sql = "UPDATE withdrawal SET status = 'Disapproved' WHERE id =:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(["id"=>$id]);
        return true;
    }

    function updateUserBalance($conn, $email, $balance) {
        $sql = "UPDATE porlt_users SET wallet = :balance WHERE email =:email";
        $stmt = $conn->prepare($sql);
        $stmt->execute(["balance"=>$balance, "email"=>$email]);
        return true;
    }

?>