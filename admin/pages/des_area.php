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
    require_once 'config/conn.php';
    require_once 'config/actions.php';
    $stateId = $_GET['stateId'];
   $count = countDestinationAreas($conn, $stateId);
   $city = destinationDetails($conn, $stateId);

?>
       <?php echo number_format($count); ?> Destination Areas
      </h2>
      <p><a href="?p=dashboard"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a href="?p=des_cities">Destination Area</a> &nbsp;&nbsp;  > &nbsp;&nbsp; <a class="active"><?= $city['cities']; ?> Area</a></p>
    </div>
     
     <div class="col-md-4" style="text-align: left; margin-top: 10px;">  <a href="?p=destination_area"> <button class="btn btn-primary float-right" style="font-size: 16px; font-weight: 600;">Add Destination Area</button></a>  </div>
     

    </section>
     <!-- Main content -->
    <section class="content" style="margin-top: 0px; padding-top: 0px; ">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-10 col-xs-12" style="background-color: #fff; margin-left: 10px; border:solid; border-width: thin; border-color: #ddd;">

          <!-- small box -->
          <!-- <a href="add_product.php"><button style="background-color: #0060cc; height: 40px; width: 250px; border:none; border-radius: 5px; color: white; font-size: 16px;">ADD PRODUCT</button></a> -->
      
         <h4 style="color: green; font-weight: bold;"></h4>
          <div style="dborder: solid; border-width: thin; border-color: #ccc; margin-top: 0px; padding: 1.5em; dheight: 500px; ">
       
          <div style="margin: 20px; margin-top: 0px;">
                <form method="get" action="">
                    <input type="hidden" name="p" value="des_area">
                    <input type="hidden" name="stateId" value="<?= $stateId; ?>">
                    <input type="text" name="q" placeholder="Search For a Location" style="height: 30px; font-size: 15px; padding: 15px; width: 80%; border:solid; border-color: #cccccc;"> 
                </form>
            </div>

<table class="table dtable-striped table-hover no-head-border" border="1" style="border:solid; border-color: black; border-width: thin;">
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">NO</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Cities</th>
<!-- <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Last Name</th>-->
<th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Postal Code</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Date Added</th>
<!-- <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Phone</th> 
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Date Joined</th>
<!-- <th>Edit</th>-->
 
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Delete</th>
<?php
        
    $areas = fetchAllDestinationStateAreas($conn, $stateId);
    if(isset($_GET['q']))
    {
        $q = $_GET['q'];
        $areas = searchDestinationArea($conn, $q);

    }
    
?>
<?php foreach($areas as $key=> $area): ?>
    <tr>
        <td style="border:solid; border-width: thin; border-color: #eee;"><?= $key+1; ?></td>
        <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $area['area']; ?></td>
        <td style="border:solid; border-width: thin; border-color: #eee;"><?= $area['post_code']; ?></a></td>
        <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo date('d-M-Y',strtotime('+0 days',strtotime(str_replace('/', '-', $area['created_at'])))); ?></td>
        <td style="border:solid; border-width: thin; border-color: #eee;"><button class="btn btn-primary deleteArea" id="<?= $area['id']; ?>" >Delete</button></td>

    </tr>

<?php endforeach; ?>

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

<script>
  $('body').on('click','.deleteArea',function(e){
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
                            data:{deleteID:del_id},
                            success:(res)=>{
                                Swal.fire(
                                'Deleted!',
                                'Note Deleted Successfully',
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



