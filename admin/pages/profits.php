<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <div class="row">
      <div class="col-md-6">
      <h2 style="margin-top: 0px;">
       Profits
      </h2>
      <p><a href="#"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a href="?p=Completed_trans" class="active">Profits</a></p>
    </div>
    <!-- <div class="col-md-4" style="text-align: left; margin-top: 10px;">  <a href="?p=new_product"> <button class="btn btn-primary" style="font-size: 16px; font-weight: 600;">Add New Product</button></a>  </div>-->
     

    </section>
     <!-- Main content -->
    <section class="content" style="margin-top: 0px; padding-top: 0px; ">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-10 col-xs-12" style="background-color: #fff; margin-left: 10px; border:solid; border-width: thin; border-color: #ddd;">

          <!-- small box -->
        
         <h4 style="color: green; font-weight: bold;"> </h4>
          <div style="dborder: solid; border-width: thin; border-color: #ccc; margin-top: 0px; padding: 1.5em; dheight: 500px; ">
       <div style="margin: 20px; margin-top: 0px;">
        <form method="get" action="#">
          <input type="hidden" name="p" value="transactions">
        <input type="text" name="q" placeholder="Search By Reference or Phone" style="height: 30px; font-size: 15px; padding: 15px; width: 80%; border:solid; border-color: #cccccc;"> 
       </form>
     </div>
 <table class="table dtable-striped table-hover no-head-border" border="1">
 <th style="border: solid; border-width: thin; border-color: #eee; dcolor:blue;">No</th>
  <th style="border: solid; border-width: thin; border-color: #eee;">Seller</th>
 <th  style="border: solid; border-width: thin; border-color: #eee;">Phone</th>
 <th   style="border: solid; border-width: thin; border-color: #eee;">Amount</th>
 <th style="border: solid; border-width: thin; border-color: #eee;">Profit</th>
 <th style="border: solid; border-width: thin; border-color: #eee;">Date</th>
 
 


<?php


require 'config/config.php';
$sql=$con->query("SELECT * FROM wallet_trans WHERE trans_type = 'WPayout' AND method = 'Transfer' AND  account = 'Ledger' AND  status = 'Completed' ORDER BY id DESC LIMIT 0, 200") or die("Error2 : ". mysqli_error($con));

if(isset($_GET['q']))
{
$q = $_GET['q'];
$sql=$con->query("SELECT * FROM wallet_trans WHERE trans_type = 'WPayout' AND method = 'Transfer' AND  account = 'Ledger' AND  trans_ref  AND status = 'Completed' AND  LIKE '%$q%' OR  trans_type = 'WPayout' AND method = 'Transfer' AND  account = 'Ledger' AND  user = '$q' AND status = 'Completed' ORDER BY id DESC LIMIT 0, 200") or die("Error2 : ". mysqli_error($con));
}

 $i=1;
   
  while ($rows=mysqli_fetch_array($sql))
   {
    $id=$rows['id'];
    $user=$rows['user'];
    $amount=number_format($rows['amount']);
   
   $profit = 0.04 * $amount; 
    $date_t =$rows['date_t'];
     
    
   $sqlx=$con->query("SELECT * FROM users WHERE phone = '$user'") or die("Error2 : ". mysqli_error($con));
   $rowsx=mysqli_fetch_array($sqlx);
   $id=$rowsx['id'];
   $fulname=$rowsx['fulname'];

 
 
?>
<tr><td style="border: solid; border-width: thin; border-color: #eee;"><?php echo $i; ?><td style="border: solid; border-width: thin; border-color: #eee;"><?php  echo $fulname; ?><td style="border: solid; border-width: thin; border-color: #eee;"><?php echo $user; ?><td style="border: solid; border-width: thin; border-color: #eee;">&#8358;<?php echo $amount; ?><td style="border: solid; border-width: thin; border-color: #eee;">&#8358;<?php echo $profit; ?> </td><td style="border: solid; border-width: thin; border-color: #eee;"><?php echo $date_t; ?></td></td></td></td></tr>

<?php
$i++;
}
?>

 
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


