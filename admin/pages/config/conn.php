<?php

// localhost
    // $servername = "localhost";
    // $dbName = "upInvest_db";
    // $username = "root";
    // $password = "6969";
    $servername="localhost"; //hostname
    $username="root"; //mysql username
    $password="6969"; //mysql password
    $dbName="sporylzm_porlt"; //Database name

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