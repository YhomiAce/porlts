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
?>