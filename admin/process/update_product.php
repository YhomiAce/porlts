<?php
include 'config/config.php';
if(isset($_GET['set']))
{
$p_code = $_GET['p_code'];
$id = $_GET['id'];
$set = $_GET['set'];

if($set == "Available")
    {
        $stat = "Hidden";
    }
    else
    {
        $stat = "Available";
    }
 

$sqlx = $con->query("UPDATE product SET status = '$stat' WHERE  product_code ='$p_code' AND id='$id'") or die("Error2 : ". mysqli_error($con));
 
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

else
{
	$v_cost  = $_GET['v_cost'];
$price = $_GET['price'];
$p_code = $_GET['p_code'];
$id = $_GET['id'];



$sqlx = $con->query("UPDATE product SET price = '$price' WHERE  id='$id'") or die("Error2 : ". mysqli_error($con));

$sql2=$con->query("SELECT * FROM product_vendors WHERE product_code = '$p_code' ORDER BY id DESC") or die("Error2 : ". mysqli_error($con));
$count2 = mysqli_num_rows($sql2);
if($count2 == 0)
{
$date_t = date("Y-m-d");
$sqlv=$con->query("INSERT INTO product_vendors (product, product_code,  vendor_code, price, email, date_t) VALUES('', '$p_code', 'olumide.fashina@agilep3.com', '$v_cost', 'olumide.fashina@agilep3.com',  '$date_t')") or die("error: ".mysqli_error($con));
}
else
{
$sql2x = $con->query("UPDATE product_vendors SET price = '$v_cost' WHERE  product_code ='$p_code'") or die("Error2 : ". mysqli_error($con));
}       
 
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