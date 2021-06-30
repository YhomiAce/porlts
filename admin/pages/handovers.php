  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <div class="row">
      <div class="col-md-6">
      <h2 style="margin-top: 0px;">
        <?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'config/config.php';
$sql=$con->query("SELECT * FROM drop_offs WHERE status = 'Completed' AND payment_status = 'Successful' ORDER BY id") or die("Error2 : ". mysqli_error($con));
$count = mysqli_num_rows($sql); 
?>
       <?php echo number_format($count); ?>  Handovers</p>
      </h2>
      <p><a href="#"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a class="active">Handovers</a></p>
    </div>
     <!--<div class="col-md-4" style="text-align: left; margin-top: 10px;">  <a href="?p=new_category"> <button class="btn btn-primary" style="font-size: 16px; font-weight: 600;">Add New Category</button></a>  </div>-->
     

    </section>
     <!-- Main content -->
    <section class="content" style="margin-top: 0px; padding-top: 0px; ">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-11 col-xs-12" style="background-color: #fff; margin-left: 10px; border:solid; border-width: thin; border-color: #ddd;">

          <!-- small box -->
          <!-- <a href="add_product.php"><button style="background-color: #0060cc; height: 40px; width: 250px; border:none; border-radius: 5px; color: white; font-size: 16px;">ADD PRODUCT</button></a> -->
      
         <h4 style="color: green; font-weight: bold;"> </h4>
          <div style="dborder: solid; border-width: thin; border-color: #ccc; margin-top: 0px; padding: 1.5em; dheight: 500px; ">
       
<div style="margin: 20px; margin-top: 0px;">
        <form method="get" action="#">
          <input type="hidden" name="p" value="accepted">
        <input type="text" name="q" value="<?php echo $_GET['q']; ?>" placeholder="Search By Package ID" style="height: 30px; font-size: 15px; padding: 15px; width: 80%; border:solid; border-color: #cccccc;"> 
       </form>
     </div>

<table class="table dtable-striped table-hover no-head-border" border="1" style="border:solid; border-color: black; border-width: thin;">
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">No</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Origin</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Destination</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Sender</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Carier</th> 
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Carier Email</th> 
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Amount Earned</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Means of Travel</th>
  
 
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Date</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Time</th>

  <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Receiver</th> 
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Phone</th> 


<!--<th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Action</th>
<!-- <th style="border:solid; border-width: thin; border-color: #eee;">Delete</th>-->
<?php
require 'config/config.php';



$sql=$con->query("SELECT * FROM drop_offs WHERE status = 'Completed' AND payment_status = 'Successful' ORDER BY id") or die("Error2 : ". mysqli_error($con));

if(isset($_GET['q']))
{
$q = $_GET['q'];
$sql=$con->query("SELECT * FROM porlt_users WHERE parcel_id = '$q'  ORDER BY id DESC LIMIT 0, 500") or die("Error2 : ". mysqli_error($con));
}

 $i=1;
   
  while ($rows=mysqli_fetch_array($sql))
   {
    $id=$rows['id'];
    $origin_city = $rows['origin_city'];
    $des_city=$rows['des_city'];
    $sender=$rows['sender'];
    $size=$rows['parcel_size'];
    $weight=$rows['parcel_weight'];

     $receiver=$rows['receiver'];
     $receiver_phone=$rows['receiver_phone'];

     $carrier=$rows['carrier'];
     $carrier_id=$rows['carrier_id'];

      $receiver=$rows['receiver'];
     $receiver_phone=$rows['receiver_phone'];


    $amount=$rows['amount'];
    $earned=$rows['earned'];
    
    
    
    
    $date_t =$rows['date_t'];
    $time_t =$rows['time_t'];

    $date_t = date('d-M-Y',strtotime('+0 days',strtotime(str_replace('/', '-', $date_t))));
    
    
?>
<tr><td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $i; ?><td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $origin_city; ?><td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $des_city; ?> <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $sender; ?><td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $carrier; ?><td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $carrier_id; ?><td style="border:solid; border-width: thin; border-color: #eee;">NGN <?php echo number_format($earned); ?><td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $travel; ?><td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $date_t; ?><td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $time_t; ?><td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $receiver; ?><td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $receiver_phone; ?><!--<td style="border:solid; border-width: thin; border-color: #eee;"><a href="?p=view_customer&id=<?php echo $id; ?>"> <button class="btn btn-primary">View</button></a></td>--></td></td></td></td></td></td></td></td></td></td></td></td></tr>

<?php
$i++;
}
?>

</table>


<script type="text/javascript">
function delete_cat(id)
{

var r = confirm ("Do you want to Delete this item?");

if (r == true) {
var dataString='id='+id;
$.ajax({
type:"GET",
url:"process/delete_cat.php",
data:dataString,
jsonp:"callback",
jsonpCallback:"Sverify",
dataType:"jsonp",
crossDomain:true,
success: function(data){
var success = data.success;
if(success == "Yes")
{
//alert("Category Deleted Successfully!");
window.location = "?p=product_categories";
}
else if (success = "No")
{
 alert("An error Occured!");
}
},
beforeSend:function()
{
$('#loader').fadeOut(200).show();
},
error: function(jqXHR, textStatus, errorThrown)
{
    alert ("Could not connect to server");
    //$('#in').fadeOut(200).hide();

    }


});} else {
}


 
}
</script>

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



