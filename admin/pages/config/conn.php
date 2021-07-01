<?php

// localhost
    // $servername="localhost"; //hostname
    // $username="root"; //mysql username
    // $password="6969"; //mysql password
    // $dbName="sporylzm_porlt"; //Database name

    // Heroku
  $servername = "us-cdbr-east-04.cleardb.com";
  $dbName = "heroku_f4565c2e7db9247";
  $username = "be2ec2be0cee8b";
  $password = "2f4ac3b3";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
?>