  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <div class="row">
      <div class="col-md-6">
      <h2 style="margin-top: 0px;">
       Resolved Disputes
      </h2>
      <p><a href="#"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a href="?p=resolved_disputes" class="active">Resolved Disputes</a></p>
    </div>
    <!-- <div class="col-md-4" style="text-align: left; margin-top: 10px;">  <a href="?p=new_product"> <button class="btn btn-primary" style="font-size: 16px; font-weight: 600;">Add New Product</button></a>  </div>-->
     

    </section>
     <!-- Main content -->
    <section class="content" style="margin-top: 0px; padding-top: 0px; ">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-9 col-xs-12" style="background-color: #fff; margin-left: 10px; border:solid; border-width: thin; border-color: #ddd;">

          <!-- small box -->
        
         <h4 style="color: green; font-weight: bold;"> <?php echo $up_error; ?></h4>
          <div style="dborder: solid; border-width: thin; border-color: #ccc; margin-top: 0px; padding: 1.5em; dheight: 500px; ">
       <div style="margin: 20px; margin-top: 0px;">
        <form method="get" action="#">
          <input type="hidden" name="p" value="resolved_disputes">
        <input type="text" name="q" value="<?php echo $_GET['q']; ?>" placeholder="Search By Reference" style="height: 30px; font-size: 15px; padding: 15px; width: 80%; border:solid; border-color: #cccccc;"> 
       </form>
     </div>
 <table class="table dtable-striped table-hover no-head-border" border="1">
 <th style="border: solid; border-width: thin; border-color: #eee; dcolor:blue;">No</th>
  <th style="border-top: solid; border-width: thin; border-color: #eee;">Buyer</th>
 <th  style="border-top: solid; border-width: thin; border-color: #eee;">Seller</th>
 <th   style="border-top: solid; border-width: thin; border-color: #eee;">Amount</th>
 <th   style="border-top: solid; border-width: thin; border-color: #eee;">Raised By</th>
  <th style="border-top: solid; border-width: thin; border-color: #eee;">details</th>
  <th style="border-top: solid; border-width: thin; border-color: #eee;">status</th>
 <th style="border: solid; border-width: thin; border-color: #eee;">Date</th>
 


<?php
require 'config/config.php';
$sql=$con->query("SELECT * FROM disputes WHERE status = 'Resolved' ORDER BY id DESC LIMIT 0, 200") or die("Error2 : ". mysqli_error($con));

if(isset($_GET['q']))
{
$q = $_GET['q'];
$sql=$con->query("SELECT * FROM disputes WHERE reference LIKE '%$q%' AND status = 'Resolved' ORDER BY id DESC LIMIT 0, 200") or die("Error2 : ". mysqli_error($con));
}

 $i=1;
   
  while ($rows=mysqli_fetch_array($sql))
   {
    $id=$rows['id'];
    $buyer=$rows['buyer'];
    $amount=number_format($rows['amount']);
    $ref=$rows['reference'];
    $seller=$rows['seller'];
    $raised_by=$rows['raised_by'];
    $details=$rows['details'];
   
    $status = $rows['status'];
    $date_t =$rows['date_t'];
     
 
 
?>
<tr><td style="border: solid; border-width: thin; border-color: #eee;"><?php echo $i; ?><td style="border: solid; border-width: thin; border-color: #eee;"><?php  echo $buyer; ?><td style="border: solid; border-width: thin; border-color: #eee;"><?php echo $seller; ?><td style="border: solid; border-width: thin; border-color: #eee;">&#8358;<?php echo $amount; ?><td style="border: solid; border-width: thin; border-color: #eee;"><?php echo $raised_by; ?><td style="border: solid; border-width: thin; border-color: #eee;">
<?php echo $details; ?>  <td style="border: solid; border-width: thin; border-color: #eee;"><?php echo $status; ?><td style="border: solid; border-width: thin; border-color: #eee;"><?php echo $date_t; ?> </td> </td></td></td></td></tr>

<?php
$i++;
}
?>

 
 <script type="text/javascript">
function save_item(id, p_code)
{
var price = document.getElementById("p"+id).value;
//var v_cost = document.getElementById("v"+id).value;

//alert (price);
//alert (v_cost);

var dataString='id='+id+'&price='+price+'&p_code='+p_code;
$.ajax({
type:"GET",
url:"process/update_product.php",
data:dataString,
jsonp:"callback",
jsonpCallback:"Sverify",
dataType:"jsonp",
crossDomain:true,
success: function(data){
var success = data.success;
if(success == "Yes")
{
alert("Product Updated Successfully!");
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


}); 
}
</script>




 
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


