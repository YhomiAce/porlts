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
      	<?php
require 'config/config.php';
$sql=$con->query("SELECT * FROM porlt_users WHERE pic != '' AND govt_id != '' AND kyc_status=0") or die("Error2 : ". mysqli_error($con));
$count = mysqli_num_rows($sql);	
?>
       <?php echo number_format($count); ?> Approved Users
      </h2>
      <p><a href="#"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a class="active">All Users</a></p>
    </div>
     <!--<div class="col-md-4" style="text-align: left; margin-top: 10px;">  <a href="?p=new_category"> <button class="btn btn-primary" style="font-size: 16px; font-weight: 600;">Add New Category</button></a>  </div>-->
     

    </section>
     <!-- Main content -->
    <section class="content" style="margin-top: 0px; padding-top: 0px; ">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-10 col-xs-12" style="background-color: #fff; margin-left: 10px; border:solid; border-width: thin; border-color: #ddd;">

          <!-- small box -->
          <!-- <a href="add_product.php"><button style="background-color: #0060cc; height: 40px; width: 250px; border:none; border-radius: 5px; color: white; font-size: 16px;">ADD PRODUCT</button></a> -->
      
         <h4 style="color: green; font-weight: bold;"></h4>
          <div style="dborder: solid; border-width: thin; border-color: #ccc; margin-top: 0px; padding: 1.5em; dheight: 500px; ">
       
<div style="margin: 20px; margin-top: 0px;">
        <form method="get" action="#">
          <input type="hidden" name="p" value="customers">
        <input type="text" name="q" placeholder="Search By Name or Email or Phone" style="height: 30px; font-size: 15px; padding: 15px; width: 80%; border:solid; border-color: #cccccc;"> 
       </form>
     </div>

<table class="table dtable-striped table-hover no-head-border" border="1" style="border:solid; border-color: black; border-width: thin;">
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">NO</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Full Name</th>
<!-- <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Last Name</th>-->
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Email</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Phone</th> 
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Date Joined</th>
<th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">View</th>
<th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Status</th>
<!-- <th style="border:solid; border-width: thin; border-color: #eee;">Delete</th>-->

<?php
require 'config/config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$sql=$con->query("SELECT * FROM porlt_users WHERE pic != '' AND govt_id != '' AND kyc_status=0 ORDER BY id DESC LIMIT 0,500") or die("Error2 : ". mysqli_error($con));

if(isset($_GET['q']))
{
$q = $_GET['q'];
$sql=$con->query("SELECT * FROM porlt_users WHERE fulname LIKE '%$q%' OR phone = '$q' OR email = '$q'  ORDER BY id DESC LIMIT 0, 500") or die("Error2 : ". mysqli_error($con));
}

 $i=1;
   
  while ($rows=mysqli_fetch_array($sql))
   {
    $id=$rows['id'];
    $fname = $rows['fulname'];
    $email=$rows['email'];
    $phone=$rows['phone'];
    
    
    $date_t =$rows['date_t'];

    $date_t = date('d-M-Y',strtotime('+0 days',strtotime(str_replace('/', '-', $date_t))));
    
    
?>
<tr>
<td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $i; ?></td>
<td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $fname; ?></td>
<td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $email; ?></td>
<td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $phone; ?></td>
<td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $date_t; ?></td>
<td style="border:solid; border-width: thin; border-color: #eee;"><a href="?p=view_customer&id=<?php echo $id; ?>"> <button class="btn btn-primary">View</button></a></td>
<td style="border:solid; border-width: thin; border-color: #eee;"><a href="?p=view_history&u=<?php echo $email; ?>"> <button class="btn btn-primary">Approved</button></a></td>
</tr>

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



