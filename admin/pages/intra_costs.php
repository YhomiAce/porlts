  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <div class="row">
      <div class="col-md-6">
      <h2 style="margin-top: 0px;">
       <?php //echo number_format($count); ?> Intra State Costs
      </h2>
      <p><a href="#"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a class="active">Intra State Cost</a></p>
    </div>
     <div class="col-md-4" style="text-align: left; margin-top: 10px;">  <a href="?p=new_intra_cost"> <button class="btn btn-primary" style="font-size: 16px; font-weight: 600;">Add New Cost</button></a>  </div>
     

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
       
<!--<div style="margin: 20px; margin-top: 0px;">
        <form method="get" action="#">
          <input type="hidden" name="p" value="customers">
        <input type="text" name="q" value="<?php echo $_GET['q']; ?>" placeholder="Search For a City" style="height: 30px; font-size: 15px; padding: 15px; width: 80%; border:solid; border-color: #cccccc;"> 
       </form>
     </div>-->

<table class="table dtable-striped table-hover no-head-border" border="1" style="border:solid; border-color: black; border-width: thin;">
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">NO</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">State</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Origin</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Post Code</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Destination</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Post Code</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Weight(Kg)</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Cost</th> 
  <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Discount</th> 
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Insurance</th> 
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Earned</th>


 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Actions</th>
<!-- <th>Edit</th>-->
<!-- <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Delete</th> -->
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'config/conn.php';
require 'config/actions.php';
    
$rows = fetchAllIntraStateCosts($conn);
    
?>
<?php foreach($rows as $key=>$row): ?>
<tr>
  <td style="border:solid; border-width: thin; border-color: #eee;"><?= $key+1; ?></td>
  <td style="border:solid; border-width: thin; border-color: #eee;"><?= $row['state']; ?></td>
  <td style="border:solid; border-width: thin; border-color: #eee;"><?= $row['origin']; ?></td>
  <td style="border:solid; border-width: thin; border-color: #eee;"><?= $row['origin_post_code']; ?></td>
  <td style="border:solid; border-width: thin; border-color: #eee;"><?= $row['destination']; ?></td>
  <td style="border:solid; border-width: thin; border-color: #eee;"><?= $row['destination_post_code']; ?></td>
  <td style="border:solid; border-width: thin; border-color: #eee;"><?= $row['kg']; ?></td>
  <td style="border:solid; border-width: thin; border-color: #eee;">&#8358;<?= number_format($row['cost']); ?></td>
  <td style="border:solid; border-width: thin; border-color: #eee;">&#8358;<?= number_format($row['discount']); ?></td>
  <td style="border:solid; border-width: thin; border-color: #eee;">&#8358;<?= number_format($row['insurance']); ?></td>
  <td style="border:solid; border-width: thin; border-color: #eee;">&#8358;<?= number_format($row['earned']); ?></td>
  <td style="border:solid; border-width: thin; border-color: #eee;">
    <a href="?p=edit_intra&id=<?= $row['id']; ?>" class="text-primary" title="Edit Intra state cost"> <i class="fas fa-edit"></i></a>&nbsp;
    <a href="#" id="<?= $row['id']; ?>" class="text-danger delIntraBtn"> <i class="fas fa-trash-alt"></i></a>
  </td>
 
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
  $('body').on('click','.delIntraBtn',function(e){
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
                            data:{deleteIntraCost:del_id},
                            success:(res)=>{
                                Swal.fire(
                                'Deleted!',
                                'Intra Cost Deleted Successfully',
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



