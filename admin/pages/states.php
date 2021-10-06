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
$sql=$con->query("SELECT * FROM states ORDER BY id") or die("Error2 : ". mysqli_error($con));
$count = mysqli_num_rows($sql); 
?>
       <?php echo number_format($count); ?> States
      </h2>
      <p><a href="#"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a class="active">States</a></p>
    </div>
     <div class="col-md-4" style="text-align: left; margin-top: 10px;">  <a href="?p=new_state"> <button class="btn btn-primary" style="font-size: 16px; font-weight: 600;">Add State</button></a>  </div>
     <div class="col-md-4" style="text-align: left; margin-top: 10px;">  <a href="?p=pickup_area"> <button class="btn btn-primary" style="font-size: 16px; font-weight: 600;">Add Area</button></a>  </div>

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
          <input type="hidden" name="p" value="states">
        <input type="text" name="q" placeholder="Search For a State" style="height: 30px; font-size: 15px; padding: 15px; width: 80%; border:solid; border-color: #cccccc;"> 
       </form>
     </div>

<table class="table dtable-striped table-hover no-head-border" border="1" style="border:solid; border-color: black; border-width: thin;">
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">NO</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">States</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">View Area</th>
 
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Delete</th>
<?php

  $rows = fetchAllState($conn); 

  if(isset($_GET['q']))
  {
    $q = $_GET['q'];
    $rows = searchStates($conn, $q);

  } 
  
    
    
?>
<?php foreach($rows as $key=>$row): ?>
  <tr>
    <td style="border:solid; border-width: thin; border-color: #eee;"><?= $key+1; ?></td>
    <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $row['name']; ?></td>
    <td style="border:solid; border-width: thin; border-color: #eee;"><a class="btn btn-success ml-2" href="?p=pickup_location&stateId=<?= $row['id']; ?>">View Areas</a></td>
    <td style="border:solid; border-width: thin; border-color: #eee;"><button class="btn btn-primary delStateBtn" id="<?php echo $row['id']; ?>">Delete</button></td>

  </tr>


<?php endforeach; ?>

</table>


<script type="text/javascript">

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

<script>
  $('body').on('click','.delStateBtn',function(e){
    e.preventDefault()
    var del_id = $(this).attr('id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:'pages/config/controller.php',
                method:'post',
                data:{deleteState:del_id},
                success:(res)=>{
                    Swal.fire(
                    'Deleted!',
                    'State Deleted Successfully',
                    'success'
                    )
                    location.reload()
                    
                }
            })
            
        }
    })
    
})
</script>
</body>
</html>



