  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <div class="row">
      <div class="col-md-6">
      <h2 style="margin-top: 0px;">
   
       Discount and Insurance
      </h2>
      <p><a href="#"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a class="active">Discount & Insurance</a></p>
    </div>
    <div class="col-md-4" style="text-align: left; margin-top: 10px;">  <a href="?p=new_discount"> <button class="btn btn-primary" style="font-size: 16px; font-weight: 600;">Add New Discount</button></a>  </div>
     

    </section>
     <!-- Main content -->
    <section class="content" style="margin-top: 0px; padding-top: 0px; ">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-10 col-xs-12" style="background-color: #fff; margin-left: 10px; border:solid; border-width: thin; border-color: #ddd;">

          <!-- small box -->
          
         <h4 style="color: green; font-weight: bold;"> </h4>
          <div style="dborder: solid; border-width: thin; border-color: #ccc; margin-top: 0px; padding: 1.5em; dheight: 500px; ">
       

<table class="table dtable-striped table-hover no-head-border" border="1" style="border:solid; border-color: black; border-width: thin;">
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">NO</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Discount</th>
<th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Insurance</th>
<!-- <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Date Added</th>
<!-- <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Phone</th> 
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Date Joined</th>
<!-- <th>Edit</th>-->
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Delete</th>
<?php
require 'config/config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);


$sql=$con->query("SELECT * FROM discount ORDER BY id DESC") or die("Error2 : ". mysqli_error($con));


 $i=1;
   
  while ($rows=mysqli_fetch_array($sql))
   {
    $id=$rows['id'];
    $discount = $rows['discount'];
    $insurance =$rows['insurance'];
    //$phone=$rows['phone'];
    
    
    $date_t =$rows['date_t'];

    $date_t = date('d-M-Y',strtotime('+0 days',strtotime(str_replace('/', '-', $date_t))));
    
    
?>
<tr><td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $i; ?><td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $discount; ?><!--<td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $email; ?> <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $phone; ?>--><td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $insurance; ?><td style="border:solid; border-width: thin; border-color: #eee;"><button class="btn btn-primary" onclick="del_discount('<?php echo $id; ?>')">Delete</button></td></td></td></td></tr>

<?php
$i++;
}
?>

</table>


<script type="text/javascript">
function del_discount(id)
{

var r = confirm ("Do you want to Delete this item?");

if (r == true) {
var dataString='id='+id;
$.ajax({
type:"GET",
url:"process/del_discount.php",
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
window.location = "?p=discount";
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



