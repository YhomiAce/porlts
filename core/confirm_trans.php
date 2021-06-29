<?php
session_start();
include 'config.php';
$user = $_GET['user'];
$amt = $_GET['amount'];
$ref = $_GET['ref'];


$today = date("Y-m-d");


 $currency = "NGN"; 

        $query = array(
            "SECKEY" => "FLWSECK-b093b43bae515e927fff5c055dad3e8d-X",
            "txref" => $ref
        );

        $data_string = json_encode($query);
                
        $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                              
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($ch);

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        curl_close($ch);

        $resp = json_decode($response, true);
        
        //var_dump ($resp);

        $paymentStatus = $resp['data']['status'];
        $chargeResponsecode = $resp['data']['chargecode'];
        $chargeAmount = $resp['data']['amount'];
        $chargeCurrency = $resp['data']['currency'];

        if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amt)  && ($chargeCurrency == $currency)) {
   




$sql="SELECT * FROM drop_offs  WHERE user ='$user' AND parcel_id = '$ref'  AND payment_status='Pending'";
$result=$con->query($sql) or die ("error: Server error ".mysqli_error($con));
if($result)
{
$count = mysqli_num_rows($result);
if($count == 1)
{
$rows = mysqli_fetch_array($result);
$code = $rows['parcel_code'];


$update2=$con->query("UPDATE drop_offs SET payment_status = 'Successful'   WHERE user ='$user' AND parcel_id = '$ref' AND payment_status='Pending'") or die ("error: Server error ".mysqli_error($con));


$suc = "Yes";

}
else
{
$suc = "No";
}
}
else
{
$suc = "No";
}
}



$output = array('success'=>$suc, 'code' => $code);
echo $_GET['callback']."(".json_encode($output).")"; //output JSON data
//mysql_close($con);
?>