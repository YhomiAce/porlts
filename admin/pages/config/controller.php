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

?>