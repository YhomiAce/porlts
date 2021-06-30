<?php
# Localhost
// $host="localhost"; //hostname
// $username="root"; //mysql username
// $password="6969"; //mysql password
// $db_name="sporylzm_porlt"; //Database name

  // Heroku
  $host = "us-cdbr-east-04.cleardb.com";
  $db_name = "heroku_f4565c2e7db9247";
  $username = "be2ec2be0cee8b";
  $password = "2f4ac3b3";
//connect to database
$con=mysqli_connect($host,$username,$password, $db_name);
if(!$con)
{die('could not connect1 Err:'.mysqli_error());}
//mysql_select_db($db_name,$con)
//or die("could not connect2: ".mysql_error());
?>