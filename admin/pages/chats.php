  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <div class="row">
      <div class="col-md-6">
      <h2 style="margin-top: 0px;">
       <?php //echo number_format($count); ?> Chats
      </h2>
      <p><a href="#"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a class="active">Chats</a></p>
    </div>
     

    </section>
     <!-- Main content -->
    <section class="content" style="margin-top: 0px; padding-top: 0px; ">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-10 col-xs-12" style="background-color: #fff; margin-left: 10px; border:solid; border-width: thin; border-color: #ddd;">

          <!-- small box -->
          <!-- <a href="add_product.php"><button style="background-color: #0060cc; height: 40px; width: 250px; border:none; border-radius: 5px; color: white; font-size: 16px;">ADD PRODUCT</button></a> -->
      
         <h4 style="color: green; font-weight: bold;"> <?php echo $up_error; ?></h4>
          <div style="dborder: solid; border-width: thin; border-color: #ccc; margin-top: 0px; padding: 1.5em; dheight: 500px; ">
       
<!--<div style="margin: 20px; margin-top: 0px;">
        <form method="get" action="#">
          <input type="hidden" name="p" value="customers">
        <input type="text" name="q" value="<?php echo $_GET['q']; ?>" placeholder="Search For a City" style="height: 30px; font-size: 15px; padding: 15px; width: 80%; border:solid; border-color: #cccccc;"> 
       </form>
     </div>-->

<table class="table dtable-striped table-hover no-head-border" border="1" style="border:solid; border-color: black; border-width: thin;">
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">NO</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Fulname</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Role</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Message</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Date</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Respond</th>
<?php
require 'config/config.php';



$sql=$con->query("SELECT * FROM messages WHERE status = 'New'  GROUP BY user, msg_type  ORDER BY id ASC LIMIT 0,400") or die("Error2 : ". mysqli_error($con));


 $i=1;
   
  while ($rows=mysqli_fetch_array($sql))
   {
    $id=$rows['id'];
    $user = $rows['user'];
    $sender = $rows['sender'];
    $msg = $rows['msg'];

    $msg_type = $rows['msg_type'];
    $role = $rows['role'];
    
    $status = $rows['status'];
    
  

    
    $date_t =$rows['date_t'];


    if($role == "Sender")
{
$sqlx="SELECT * FROM porlt_users WHERE email = '$sender'";
$resultx=$con->query($sqlx) or die ("error: Server error ".mysqli_error($con));

$rowsx=mysqli_fetch_array($resultx);
$fulname = $rowsx['fulname'];
}


    $date_t = date('d-M-Y',strtotime('+0 days',strtotime(str_replace('/', '-', $date_t))));
    
    
?>
<tr><td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $i; ?><td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $fulname; ?><td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $msg_type; ?> <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $msg; ?> <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $date_t; ?><td style="border:solid; border-width: thin; border-color: #eee;"><button class="btn btn-success" onclick="view_msg('<?php echo $user; ?>', '<?php echo $_SESSION['porlt_admin']; ?>', '<?php echo $msg_type; ?>')">Repond</button></td></td></td></td></td></td></td></tr>

<?php
$i++;
}
?>

</table>

  
<script type="text/javascript">
function view_msg(sender, user, msg_type)
{


    localStorage.setItem("porlt_sender", sender);
    localStorage.setItem("porlt_admin", user);
    localStorage.setItem("msg_type", msg_type);
    
 
     window.open('https://porlt.diimtech.com/message.html', '_blank', 'location=yes');

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



