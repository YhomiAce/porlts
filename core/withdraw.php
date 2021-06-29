<?php
if(isset($_GET['user']));
{
require 'config.php';

$user = $_GET['user'];

$amount=$_GET['amount'];
$bank =$_GET['bank'];
$acc_name=$_GET['acc_name'];
$acc_num = $_GET['acc_num'];




$amount=mysqli_escape_string($con, $amount);
$bank=mysqli_escape_string($con, $bank);
$acc_name=mysqli_escape_string($con, $acc_name);
$acc_num=mysqli_escape_string($con, $acc_num);


$sql="SELECT * FROM porlt_users WHERE email = '$user'";
$result=$con->query($sql) or die ("error: Server error ".mysqli_error($con));

$rows=mysqli_fetch_array($result);


$id = $rows['id'];
$wallet = $rows['wallet'];


if($wallet > $amount)
{

    $sqlx=$con->query("INSERT INTO withdrawal (user, amount, bank, account_num, account_name, status,  date_t) 
      VALUES ('$user', '$amount', '$bank', '$acc_num',  '$acc_name', 'New', '$date_t')") or die("Error: ".mysqli_error($con));
  
     $suc = "YES"; 

}

else
{
   $suc = "NO";   
}

$output = array('success'=>$suc);
echo $_GET['callback']."(".json_encode($output).")"; //output JSON data
}
?>
