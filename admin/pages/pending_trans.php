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
       Pending Payments
      </h2>
      <p><a href="#"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a href="?p=pending_trans" class="active">Pending Payments</a></p>
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
          <input type="hidden" name="p" value="pending_trans">
        <input type="text" name="q" placeholder="Search By Reference or Phone" style="height: 30px; font-size: 15px; padding: 15px; width: 80%; border:solid; border-color: #cccccc;"> 
       </form>
     </div>
 <table class="table dtable-striped table-hover no-head-border" border="1">
 <th style="border: solid; border-width: thin; border-color: #eee; dcolor:blue;">No</th>
  <th style="border-top: solid; border-width: thin; border-color: #eee;">Full Name</th>
 <th  style="border-top: solid; border-width: thin; border-color: #eee;">Phone</th>
 <th   style="border-top: solid; border-width: thin; border-color: #eee;">Amount</th>
    <th style="border-top: solid; border-width: thin; border-color: #eee;">Recipient</th>
  <th style="border-top: solid; border-width: thin; border-color: #eee;">Details</th>
 <th style="border: solid; border-width: thin; border-color: #eee;">Status</th>
 <th style="border: solid; border-width: thin; border-color: #eee;">Code</th>
 <th style="border: solid; border-width: thin; border-color: #eee;">Action</th>
 


<?php

require 'config/config.php';
$sql=$con->query("SELECT * FROM wallet_trans WHERE trans_type = 'WPayout' AND method = 'Transfer' AND  account = 'Main' AND  status = 'Pending' ORDER BY id DESC LIMIT 0, 200") or die("Error2 : ". mysqli_error($con));

if(isset($_GET['q']))
{
$q = $_GET['q'];
$sql=$con->query("SELECT * FROM wallet_trans WHERE  trans_ref  LIKE '%$q%' AND  trans_type = 'WPayout' AND method = 'Transfer' AND  account = 'Main' AND  trans_ref  AND status = 'Pending'  OR  trans_type = 'WPayout' AND method = 'Transfer' AND  account = 'Main' AND  user = '$q' AND status = 'Pending' ORDER BY id DESC LIMIT 0, 200") or die("Error2 : ". mysqli_error($con));
}

 $i=1;
   
  while ($rows=mysqli_fetch_array($sql))
   {
    $id=$rows['id'];
    $sid = "s".$id;
    $pid = "p".$id;
    $cid = "c".$id;
    
    $user=$rows['user'];
    $amount=number_format($rows['amount']);
    $trans_ref=$rows['trans_ref'];
    $trans_id=$rows['trans_id'];
    $account=$rows['account'];
    $acc_num=$rows['acc_num'];
    $merchant = $rows['merchant'];
    $prev_bal = number_format($rows['prev_bal']);
    $new_bal = number_format($rows['new_bal']);
    $trans_type = $rows['trans_type'];
    $method = $rows['method'];
    $details = $rows['details'];
    
    $address = $rows['address'];
    $code = $rows['code'];
    $status = $rows['status'];
    $date_t =$rows['date_t'];

    $ad_mail = $_SESSION['payondeliver_admin'];
   
    $admin = $_SESSION['payondeliver_name'];
  
     
    
   $sqlx=$con->query("SELECT * FROM users WHERE phone = '$user'") or die("Error2 : ". mysqli_error($con));
   $rowsx=mysqli_fetch_array($sqlx);
   $id=$rowsx['id'];
   $fulname=$rowsx['fulname'];


?>

<tr><td style="border: solid; border-width: thin; border-color: #eee;"><?php echo $i; ?><td style="border: solid; border-width: thin; border-color: #eee;"><?php  echo $fulname; ?><td style="border: solid; border-width: thin; border-color: #eee;"><?php echo $user; ?><td style="border: solid; border-width: thin; border-color: #eee;">&#8358;<?php echo $amount; ?><!--<td style="border: solid; border-width: thin; border-color: #eee;"><?php //echo $trans_type; ?><td style="border: solid; border-width: thin; border-color: #eee;">
<?php echo $method; ?> --><td style="border: solid; border-width: thin; border-color: #eee;">
<?php echo $merchant; ?>  <td style="border: solid; border-width: thin; border-color: #eee;"><?php echo $details; ?> <td style="border: solid; border-width: thin; border-color: #eee;"> <?php echo $status; ?> <td style="border: solid; border-width: thin; border-color: #eee;" id="<?php echo $sid; ?>"><input type="number" id="<?php echo $cid; ?>"><td style="border: solid; border-width: thin; border-color: #eee;" id="<?php echo $pid; ?>"> <button class="btn btn-primary" onclick="confirm_trans('<?php echo $merchant; ?>', '<?php echo $trans_ref; ?>', '<?php echo $admin; ?>', '<?php echo $ad_mail; ?>', '<?php echo $sid; ?>', '<?php echo $cid; ?>', '<?php echo $pid; ?>')">Confirm</button> </td></td></td></td></td></tr>

<?php
$i++;
}
?>

 
</table>

        </div>
        </div>
        <!-- ./col -->
     


<script type="text/javascript">
function confirm_trans(user, ref, admin, ad_mail, sid, cid, pid)
{

var r = confirm ("Do you want to Delete this item?");

if (r == true) {

var code = document.getElementById(cid).value;


if(code == "")
{
alert("Enter Verification Code");
return false;
}


   
var dataString='code='+code+'&user='+user+'&ref='+ref+'&admin='+admin+'&ad_mail='+ad_mail;
$.ajax({
type:"GET",
url:"https://pay.diimtech.com/core/confirm_payment2.php",
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
$('#'+pid).empty();
$('#'+pid).append("Completed");

//document.getElementById("code").value = "";

}

else if (success == "code")
{
alert("Incorrect Confirmation Code");
return false;
} 

else if (success == "Exist")
{
alert("Invalid Transaction");
return false;
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


