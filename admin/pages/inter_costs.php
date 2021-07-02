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
       <?php //echo number_format($count); ?> Inter State Costs
      </h2>
      <p><a href="#"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a class="active">Inter State Cost</a></p>
    </div>
     <div class="col-md-4" style="text-align: left; margin-top: 10px;">  <a href="?p=new_inter_cost"> <button class="btn btn-primary" style="font-size: 16px; font-weight: 600;">Add New Cost</button></a>  </div>
     

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
        <form method="get" action="#">
          <input type="hidden" name="p" value="inter_costs">
        <input type="text" name="q" value="<?php //echo $_GET['q']; ?>" placeholder="Search For a City" style="height: 30px; font-size: 15px; padding: 15px; width: 80%; border:solid; border-color: #cccccc;"> 
       </form>
     </div>

<table class="table dtable-striped table-hover no-head-border" border="1" style="border:solid; border-color: black; border-width: thin;">
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">NO</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">City1</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">City2</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Kg</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Cost</th> 
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Discount</th> 
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Insurance</th> 
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Earned</th> 
  <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Edit</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Delete</th>

<!-- <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Date Joined</th>
<!-- <th>Edit</th>-->
<!-- <th style="border:solid; border-width: thin; border-color: #eee;">Delete</th>-->
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'config/config.php';
require 'config/conn.php';
require 'config/actions.php';

  $rows = fetchAllInterStateCosts($conn);
 
  if(isset($_GET['q']))
  {
    $q = $_GET['q'];
    $rows = SearchInterState($conn, $q);

  } 
    
    
?>
<?php foreach($rows as $key=> $row ): ?>
<tr>
  <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $key+1; ?></td>
  <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $row['state1']; ?></td>
  <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $row['state2']; ?></td>
  <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $row['kg']; ?></td>
  <td style="border:solid; border-width: thin; border-color: #eee;">&#8358;<?php echo number_format($row['cost']); ?> </td>
  <td style="border:solid; border-width: thin; border-color: #eee;">&#8358;<?php echo number_format($row['discount']); ?> </td>
  <td style="border:solid; border-width: thin; border-color: #eee;">&#8358;<?php echo number_format($row['insurance']); ?></td>
  <td style="border:solid; border-width: thin; border-color: #eee;">&#8358;<?php echo number_format($row['earned']); ?></td>
  <td style="border:solid; border-width: thin; border-color: #eee;"><a href="?p=edit_inter&id=<?php echo $row['id']; ?>"> <button class="btn btn-danger">Edit</button></a></td>
  <td style="border:solid; border-width: thin; border-color: #eee;"><button class="btn btn-danger" onclick="delete_inter_cost('<?php echo $row['id']; ?>');">Delete</button></td>
</tr>
<?php endforeach; ?>


</table>


<script type="text/javascript">
function delete_inter_cost(id)
{

var r = confirm ("Do you want to Delete this cost?");

if (r == true) {
var dataString='id='+id;
$.ajax({
type:"GET",
url:"process/delete_inter_cost.php",
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
window.location = "?p=inter_costs";
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



