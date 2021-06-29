<?php
if(isset($_POST['submit']))
{
include 'config/config.php';

$phone = $_POST['phone'];
$amount = $_POST['amount'];
$date_t=date("d-M-Y");


$sql=$con->query("SELECT * FROM wallet WHERE user = '$phone'") or die("Error2 : ". mysqli_error($con));
if($sql)
{
$count = mysqli_num_rows($sql);

if($count == 0)
{
$up_error = "User Does Not Exist!";
}
else
{
$row = mysqli_fetch_array($sql);
$balance = $row['balance'];
$tbal = $balance + $amount;


function check_number(){

require 'config/config.php';

    $unique_number = rand(10000000, 99999999);

    $sql = $con->query("SELECT * FROM trans_ref WHERE reference = '$unique_number'")  or die ("error: ".mysqli_error($con));
    $exists = mysqli_num_rows($sql);

    if ($exists >0){
        $results = check_number();
    }
     else{
            $results = $unique_number;
        return $results;
     }
}

$ref = check_number();

  $ad_mail = $_SESSION['payondeliver_admin'];
   
    $admin = $_SESSION['payondeliver_name'];
  
 
$sql2=$con->query("UPDATE wallet SET balance = '$tbal' WHERE user = '$phone'") or die("error: ".mysqli_error($con));

 $insert=$con->query("INSERT INTO wallet_trans (user, amount, trans_ref, merchant, account,  prev_bal, new_bal, trans_type, method, status, admin, admin_email, date_t, month, year) 
      VALUES ('$user', '$amount', '$ref', 'Admin', 'Main', '$balance', '$tbal', 'WFund', 'Admin', 'Successful', '$admin', '$admin_email', '$date_t', '$month', '$year')") or die("Error: ".mysqli_error($con));

}
}

if($sql2)
{
$up_error = "Wallet Credited!";
?>
<script type="text/javascript">
//window.location = "?p=admin_users";
</script>
<?php
}
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <div class="row">
      <div class="col-md-6">
      <h2 style="margin-top: 0px;">
       Fund Wallet
      </h2>
      <p><a href="?p=dashbaord"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a href="#">Payments</a> &nbsp;&nbsp;  > <a href="#"> Fund Wallet&nbsp;&nbsp; <a class="active"></a></p>
    </div>
     <!--<div class="col-md-4" style="text-align: left; margin-top: 10px;">  <a href="p=new_product"> <button class="btn btn-primary" style="font-size: 16px; font-weight: 600;">Add New Category</button></a>  </div>-->
     

    </section>
     <!-- Main content -->
    <section class="content" style="margin-top: 0px; padding-top: 0px; ">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-9 col-xs-12" style="background-color: #fff; margin-left: 10px; border:solid; border-width: thin; border-color: #ddd;">

          <!-- small box -->
          <!-- <a href="add_product.php"><button style="background-color: #0060cc; height: 40px; width: 250px; border:none; border-radius: 5px; color: white; font-size: 16px;">ADD PRODUCT</button></a> -->
      
          <div style="dborder: solid; border-width: thin; border-color: #ccc; margin-top: 0px; padding: 1.5em; dheight: 500px; ">
       
<form action="#" method="post" enctype="multipart/form-data">
 <table class="table dtable-striped dtable-hover no-head-border">
                    
<tr><td><td style="color: green; font-size: 15px;"><?php echo $up_error; ?></td></tr>
    <tr><td style="width: 30%; font-size: 16px;">Phone<td>
      <input  type="number" name="phone" required="required" style="width: 100%; height: 40px;">
      </td></td></tr>
    <tr><td style="width: 30%; font-size: 16px;">Amount<td><input type="number" name="amount" required="required" style="width: 100%; height: 40px;"></td></td></tr>

 
 </table>

<table class="table dtable-striped dtable-hover no-head-border">
  <tr><td style="width: 30%;"><td><input type="submit" name="submit" class="btn btn-primary" value="Submit" style="height: 40px; width: 200px; dbackground-color: blue; font-size: 17px; color: white; border:none;"></td></td></tr> 
 </table>


        </div>
        </div>
        <!-- ./col -->
     
     
  <div class="col-lg-6 col-xs-12">
          <!-- small box -->
          <div>
        </div>
        </div>
     
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
     </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

   
<?php include('includes/js.php')?>
</body>
</html>



