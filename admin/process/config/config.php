<?php
$host="localhost"; //hostname
$username="root"; //mysql username
$password="6969"; //mysql password
$db_name="sporylzm_porlt"; //Database name
//connect to database
$con=mysqli_connect($host,$username,$password, $db_name);
if(!$con)
{die('could not connect1 Error:'.mysqli_error());}
//mysql_select_db($db_name,$con)
//or die("could not connect2: ".mysql_error());
?>