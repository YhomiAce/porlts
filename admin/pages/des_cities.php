  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <div class="row">
      <div class="col-md-4">
      <h2 style="margin-top: 0px;">
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

require 'config/config.php';
require_once 'config/conn.php';
require_once 'config/actions.php';
$sql=$con->query("SELECT * FROM des_cities ORDER BY id") or die("Error2 : ". mysqli_error($con));
$count = mysqli_num_rows($sql); 
?>
       <?php echo number_format($count); ?> Destination Cities
      </h2>
      <p><a href="#"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a class="active">Destination Cities</a></p>
    </div>
     <div class="col-md-4" style="text-align: left; margin-top: 10px;">  <a href="?p=new_des_city"> <button class="btn btn-primary" style="font-size: 16px; font-weight: 600;">Add Destination City</button></a>  </div>
     <div class="col-md-4" style="text-align: left; margin-top: 10px;">  <a href="?p=destination_area"> <button class="btn btn-primary" style="font-size: 16px; font-weight: 600;">Add Destination Area</button></a>  </div>
     

    </section>
     <!-- Main content -->
    <section class="content" style="margin-top: 0px; padding-top: 0px; ">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-10 col-xs-12" style="background-color: #fff; margin-left: 10px; border:solid; border-width: thin; border-color: #ddd;">

          <!-- small box -->
          <!-- <a href="add_product.php"><button style="background-color: #0060cc; height: 40px; width: 250px; border:none; border-radius: 5px; color: white; font-size: 16px;">ADD PRODUCT</button></a> -->
      
         <h4 style="color: green; font-weight: bold;"> </h4>
          <div style="dborder: solid; border-width: thin; border-color: #ccc; margin-top: 0px; padding: 1.5em; dheight: 500px; ">
       
<div style="margin: 20px; margin-top: 0px;">
        <form method="get" action="">
          <input type="hidden" name="p" value="des_cities">
        <input type="text" name="q" placeholder="Search For a City" style="height: 30px; font-size: 15px; padding: 15px; width: 80%; border:solid; border-color: #cccccc;"> 
       </form>
     </div>

<table class="table dtable-striped table-hover no-head-border" border="1" style="border:solid; border-color: black; border-width: thin;">
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">NO</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Cities</th>
<!-- <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Last Name</th>-->
<!-- <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Areas</th> -->
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Date Added</th>
<!-- <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Phone</th> 
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Date Joined</th>
<!-- <th>Edit</th>-->
 
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Delete</th>
<?php

  $rows = fetchAllDestinationState($conn); 

  if(isset($_GET['q']))
  {
    $q = $_GET['q'];
    $rows = searchDestinationCity($conn, $q);

  } 
  
    
    
?>
<?php foreach($rows as $key=>$row): ?>
  <tr>
    <td style="border:solid; border-width: thin; border-color: #eee;"><?= $key+1; ?></td>
    <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $row['cities']; ?></td>
    <!-- <td style="border:solid; border-width: thin; border-color: #eee;"><a class="btn btn-success ml-2" href="?p=des_area&stateId=<?= $row['id']; ?>">View Areas</a></td> -->
    <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo date('d-M-Y',strtotime('+0 days',strtotime(str_replace('/', '-', $row['date_t'])))); ?></td>
    <td style="border:solid; border-width: thin; border-color: #eee;"><button class="btn btn-primary" onclick="del_des_city('<?php echo $row['id']; ?>')">Delete</button></td>

  </tr>


<?php endforeach; ?>

</table>


<script type="text/javascript">
function del_des_city(id)
{

var r = confirm ("Do you want to Delete this City?");

if (r == true) {
var dataString='id='+id;
$.ajax({
type:"GET",
url:"process/del_des_city.php",
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
window.location = "?p=des_cities";
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



