<?php

 define("DB_HOST","localhost");
 define("USERNAME","root");
 define("PASS","");
 define("DBNAME","talk");
 define("DB_TYPE","mysql");
 define("PORT","3306");

//$host="localhost"; //hostname
//$username="root"; //mysql username
//$password=""; //mysql password
//$db_name="talk"; //Database name
//connect to database
$con=mysqli_connect(DB_HOST,USERNAME,PASS, DBNAME);
if(!$con)
{die('could not connect to server:'.mysql_error());}
//mysqli_select_db($db_name,$con)
//or die("could not connect to database: ".mysql_error());

?>