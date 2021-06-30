  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <div class="row">
      <div class="col-md-6">
      <h2 style="margin-top: 0px;">
       Ongoing Disputes
      </h2>
      <p><a href="#"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a href="?p=ongoing_disputes" class="active">Ongoing Disputes</a></p>
    </div>
    <!-- <div class="col-md-4" style="text-align: left; margin-top: 10px;">  <a href="?p=new_product"> <button class="btn btn-primary" style="font-size: 16px; font-weight: 600;">Add New Product</button></a>  </div>-->
     

    </section>
     <!-- Main content -->
    <section class="content" style="margin-top: 0px; padding-top: 0px; ">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-9 col-xs-12" style="background-color: #fff; margin-left: 10px; border:solid; border-width: thin; border-color: #ddd;">

          <!-- small box -->
        
         <h4 style="color: green; font-weight: bold;"> </h4>
          <div style="dborder: solid; border-width: thin; border-color: #ccc; margin-top: 0px; padding: 1.5em; dheight: 500px; ">
       <div style="margin: 20px; margin-top: 0px;">
        <form method="get" action="#">
          <input type="hidden" name="p" value="ongoing_disputes">
        <input type="text" name="q" value="<?php echo $_GET['q']; ?>" placeholder="Search By Reference" style="height: 30px; font-size: 15px; padding: 15px; width: 80%; border:solid; border-color: #cccccc;"> 
       </form>
     </div>
 <table class="table dtable-striped table-hover no-head-border" border="1">
 <th style="border: solid; border-width: thin; border-color: #eee; dcolor:blue;">No</th>
 <th style="border: solid; border-width: thin; border-color: #eee; dcolor:blue;">Reference</th>
  <th style="border-top: solid; border-width: thin; border-color: #eee;">Buyer</th>
 <th  style="border-top: solid; border-width: thin; border-color: #eee;">Seller</th>
 <th   style="border-top: solid; border-width: thin; border-color: #eee;">Amount</th>
 <th   style="border-top: solid; border-width: thin; border-color: #eee;">Raised By</th>
  <th style="border-top: solid; border-width: thin; border-color: #eee;">details</th>
  <th style="border-top: solid; border-width: thin; border-color: #eee;">status</th>
 <th style="border: solid; border-width: thin; border-color: #eee;">Action</th>
 <th style="border: solid; border-width: thin; border-color: #eee;">View</th>

 


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'config/config.php';
$sql=$con->query("SELECT * FROM disputes WHERE status = 'Pending' ORDER BY id DESC LIMIT 0, 200") or die("Error2 : ". mysqli_error($con));

if(isset($_GET['q']))
{
$q = $_GET['q'];
$sql=$con->query("SELECT * FROM disputes WHERE reference LIKE '%$q%' AND status = 'Pending' ORDER BY id DESC LIMIT 0, 200") or die("Error2 : ". mysqli_error($con));
}

 $i=1;
   
  while ($rows=mysqli_fetch_array($sql))
   {
    $id=$rows['id'];
    $sid = "s".$id;
    $rid = "r".$id;
    $buyer=$rows['buyer'];
    $amount=number_format($rows['amount']);
    $ref=$rows['reference'];
    $seller=$rows['seller'];
    $raised_by=$rows['raised_by'];
    $details=$rows['details'];
   
    $status = $rows['status'];
    $date_t =$rows['date_t'];

      $ad_mail = $_SESSION['payondeliver_admin'];
   
    $admin = $_SESSION['payondeliver_name'];
  
     
 
 
?>
<tr><td style="border: solid; border-width: thin; border-color: #eee;"><?php echo $i; ?><td style="border: solid; border-width: thin; border-color: #eee;"><?php echo $ref; ?><td style="border: solid; border-width: thin; border-color: #eee;"><?php  echo $buyer; ?><td style="border: solid; border-width: thin; border-color: #eee;"><?php echo $seller; ?><td style="border: solid; border-width: thin; border-color: #eee;">&#8358;<?php echo $amount; ?><td style="border: solid; border-width: thin; border-color: #eee;"><?php echo $raised_by; ?><td style="border: solid; border-width: thin; border-color: #eee;">
<?php echo $details; ?>  <td style="border: solid; border-width: thin; border-color: #eee;" id="<?php echo $rid; ?>"><?php echo $status; ?><td style="border: solid; border-width: thin; border-color: #eee;" id="<?php echo $sid; ?>"><button class="btn btn-primary" onclick="resolve_dispute('<?php echo $admin; ?>', '<?php echo $ad_mail; ?>', '<?php echo $ref; ?>', '<?php echo $buyer; ?>', '<?php echo $seller; ?>', '<?php echo $sid; ?>', '<?php echo $rid; ?>')">Resolve</button> <td style="border: solid; border-width: thin; border-color: #eee;"><button class="btn btn-primary" onclick="view_dispute('<?php echo $ref; ?>')" >Chat</button></td> </td> </td></td></td></td></tr>

<?php
$i++;
}
?>

 
 <script type="text/javascript">
function view_dispute(ref)
{
localStorage.setItem("paydeliver_phone", "Admin");
localStorage.setItem("dispute_ref", ref);
window.open('https://pay.diimtech.com/view_dispute.html', '_blank', 'location=yes');
}
</script>


<script type="text/javascript">
function resolve_dispute(admin, ad_mail, ref, buyer, seller, sid, rid)
{
var r = confirm ("Do you want to Delete this item?");

if (r == true) {

var dataString='ref='+ref+'&buyer='+buyer+'&seller='+seller;
$.ajax({
type:"GET",
url:"https://pay.diimtech.com/core/resolve_dispute.php",
data:dataString,
jsonp:"callback",
jsonpCallback:"Sverify",
dataType:"jsonp",
crossDomain:true,
success: function(data){
var success = data.success;

if(success == "Yes")
{
$('#'+sid).empty();
$('#'+sid).append("Resolved");

$('#'+rid).empty();
$('#'+rid).append("Resolved");

//document.getElementById("code").value = "";

}

},

beforeSend:function()
{
$('#but1').hide();
$('#but2').show();
},

error: function(jqXHR, textStatus, errorThrown)
{
alert(errorThrown);
}

});
}
else
{
}
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


