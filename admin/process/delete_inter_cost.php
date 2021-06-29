<?php
include 'config/config.php';
if(isset($_GET['id']))
{
$id = $_GET['id'];

   
$sqlx = $con->query("DELETE FROM inter_cost  WHERE  id='$id'") or die("Error2 : ". mysqli_error($con));
 
 if($sqlx)
 {
 $suc = "Yes";
 }
 else
 {
 $suc = "No";
 }
 
$output = array('success'=>$suc);
echo $_GET['callback']."(".json_encode($output).")"; //output JSON data	
}

             
      ?>