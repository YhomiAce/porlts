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
      Admin Users
      </h2>
      <p><a href="#"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a class="active">Admin Users</a></p>
    </div>
     <div class="col-md-4" style="text-align: left; margin-top: 10px;">  <a href="?p=new_admin"> <button class="btn btn-primary" style="font-size: 16px; font-weight: 600;">Add New User</button></a>  </div>
     

    </section>
     <!-- Main content -->
    <section class="content" style="margin-top: 0px; padding-top: 0px; ">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-9 col-xs-12" style="background-color: #fff; margin-left: 10px; border:solid; border-width: thin; border-color: #ddd;">

          <!-- small box -->
          <!-- <a href="add_product.php"><button style="background-color: #0060cc; height: 40px; width: 250px; border:none; border-radius: 5px; color: white; font-size: 16px;">ADD PRODUCT</button></a> -->
      
         <h4 style="color: green; font-weight: bold;"> </h4>
          <div style="dborder: solid; border-width: thin; border-color: #ccc; margin-top: 0px; padding: 1.5em; dheight: 500px; ">
       
<table class="table dtable-striped table-hover no-head-border" border="1">
 <th style="border:solid; border-width: thin; border-color: #eee;">No</th>
 <th style="border:solid; border-width: thin; border-color: #eee;">User</th>
 <th style="border:solid; border-width: thin; border-color: #eee;">Email</th>
 <th style="border:solid; border-width: thin; border-color: #eee;">Level</th>
<!-- <th>Edit</th>-->
 <th style="border:solid; border-width: thin; border-color: #eee;">Delete</th>
<?php
require 'config/config.php';



$sql=$con->query("SELECT * FROM admin ORDER BY fulname ASC") or die("Error2 : ". mysqli_error($con));

if($sql)
{
 $i=1;
   
  while ($rows=mysqli_fetch_array($sql))
   {
    $id=$rows['id'];
    $level = $rows['level'];
    $name=$rows['fulname'];
    $username =$rows['username'];
    
?>
<tr><td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $i; ?><td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $name; ?><td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $username; ?><td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $level; ?> <!--<td><a href="update_biz_unit.php?id=<?php echo $id; ?>"><button>Edit</button>--><td style="border:solid; border-width: thin; border-color: #eee;"><button class="btn btn-danger" onclick="delete_admin('<?php echo $id; ?>');">Delete</button></td></td></td></td></tr>

<?php
$i++;
}
}
?>

</table>


<script type="text/javascript">
function delete_admin(id)
{

var r = confirm ("Do you want to Delete this item?");

if (r == true) {
var dataString='id='+id;
$.ajax({
type:"GET",
url:"https://pay.diimtech.com/core/delete_admin.php",
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
window.location = "?p=admin_users";
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



<?php
function product_list ()
{

}





?>