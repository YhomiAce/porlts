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
    
    $parcels = fetchAllParcels($conn);
    if(isset($_GET['q']))
    {
        $q = $_GET['q'];
        $parcels = SearchPArcel($conn, $q);

    }

?>
       
      </h2>
      <p><a href="?p=dashboard"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a class="active">Parcel</a></p>
    </div>
     
     <div class="col-md-4" style="text-align: left; margin-top: 10px;">  <a href="?p=new_parcel"> <button class="btn btn-primary float-right" style="font-size: 16px; font-weight: 600;">Add Parcel Type</button></a>  </div>
     

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
                    <input type="hidden" name="p" value="parcel">
                    <input type="text" name="q" placeholder="Search For Parcel Type" style="height: 30px; font-size: 15px; padding: 15px; width: 80%; border:solid; border-color: #cccccc;"> 
                </form>
            </div>

<table class="table dtable-striped table-hover no-head-border" border="1" style="border:solid; border-color: black; border-width: thin;">
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">NO</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Parcel Type</th>
<!-- <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Last Name</th>-->
<th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Date Added</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Edit</th>
<!-- <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Phone</th> 
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Date Joined</th>
<- <th>Edit</th>-->
 
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Delete</th>

 <tbody>
     <?php foreach($parcels as $key=>$parcel) : ?>
        <tr>
            <td><?= $key+1; ?></td>
            <td><?= $parcel['type']; ?></td>
            <td><?php echo date('d-M-Y',strtotime('+0 days',strtotime(str_replace('/', '-', $parcel['created_at'])))); ?></td>
            <td><a href="?p=edit_parcel&parcelId=<?= $parcel['id']; ?>" id="<?= $parcel['id']; ?>"><i class="fas fa-edit"></i></a></td>
            <td><a href="" class="text-danger deleteParcel" id="<?= $parcel['id']; ?>"><i class="fas fa-trash-alt"></i></a></td>
        </tr>
    <?php endforeach; ?>
 </tbody>


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
  $('body').on('click','.deleteParcel',function(e){
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
                            data:{deleteParcelType:del_id},
                            success:(res)=>{
                                Swal.fire(
                                'Deleted!',
                                'Area Deleted Successfully',
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



