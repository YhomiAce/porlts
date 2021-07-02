<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config/conn.php';
require_once 'config/actions.php';

$states = fetchAllDestinationState($conn); 
$weights = fetchAllWeight($conn);

# naira code: &#8358;
  $id = $_GET['id'];
  $details = fetchIntraStateInformation($conn, $id);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <div class="row">
      <div class="col-md-6">
      <h2 style="margin-top: 0px;">
       New Intra State Cost
      </h2>
      <p><a href="?p=dashbaord"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a href="?p=intra_costs">Intra Cost</a> &nbsp;&nbsp;  >  &nbsp;&nbsp; <a class="active">New Intra State Cost</a></p>
    </div>
     <!--<div class="col-md-4" style="text-align: left; margin-top: 10px;">  <a href="p=new_product"> <button class="btn btn-primary" style="font-size: 16px; font-weight: 600;">Add New Category</button></a>  </div>-->
     

    </section>
     <!-- Main content -->
    <section class="content" style="margin-top: 0px; padding-top: 0px; ">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-9 col-xs-12" style="background-color: #fff; margin-left: 10px; border:solid; border-width: thin; border-color: #ddd;">

          <!-- small box -->
          <!-- <a href="add_product.php"><button style="background-color: #0060cc; height: 40px; width: 250px; border:none; border-radius: 5px; color: white; font-size: 16px;">ADD PRODUCT</button></a> -->
      
          <div style="dborder: solid; border-width: thin; border-color: #ccc; margin-top: 0px; padding: 1.5em; dheight: 500px; ">


<form action="#" id="edit_intra_cost_form" method="post" enctype="multipart/form-data">
<div id="errorMsg" class="text-center text-danger"></div>
  <input type="hidden" name="id" value="<?= $details['id']; ?>">
<div class="card bg-light">
          <div class="card-header">
            <h4>Edit Intra State Cost </h4>

          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="">State</label>
              <input type="text" name="edit_state" value="<?= $details['state']; ?>" readonly class="form-control">
            </div>
            <div class="form-group">
              <label for="">Origin Area</label>
              <input type="hidden" name="origin_post_code" value="<?= $details['origin_post_code']; ?>">
              <input type="text" name="edit_origin" value="<?= $details['origin']; ?>" readonly class="form-control">
            </div>
            <div class="form-group">
              <label for="">Destination Area</label>
              <input type="hidden" name="destination_post_code" value="<?= $details['destination_post_code']; ?>">
              <input type="text" name="edit_destination" value="<?= $details['destination']; ?>" readonly class="form-control">
            </div>
            <div class="form-group">
              <label for="">Choose Package Weight</label>
              <p>Previous weight: <?= $details['kg']; ?>Kg</p>
              <select  type="text" name="edit_kg"  required="required" class="form-control" >
                <option value="" selected disabled>Select Weight</option>
                  <?php foreach($weights as $weight): ?>
                  <option value="<?= $weight['id']; ?>"><?= $weight['kg']; ?></option>
                  <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Cost</label>
              <input  type="number" name="edit_cost" step="0.01" value="<?= $details['cost']; ?>"  required="required" class="form-control" >
            </div>
            <div class="form-group">
              <label for="">Discount</label>
              <input  type="number" name="edit_discount" step="0.01" value="<?= $details['discount']; ?>"  required="required" class="form-control" >
            </div>
            <div class="form-group">
              <label for="">Earned</label>
              <input  type="number" name="edit_earned" step="0.01" value="<?= $details['earned']; ?>" required="required" class="form-control" >
            </div>
            <div class="form-group">
              <label for="">Insurance</label>
              <input  type="number" name="edit_insurance" step="0.01" value="<?= $details['insurance']; ?>"  required="required" class="form-control" >
            </div>
            <button type="submit" name="submit" id="edit_intra_state_cost" class="btn btn-info">Edit Cost</button>
          </div>
        </div>

</form>


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
  

  $("#edit_intra_state_cost").click((e)=>{
    if ($("#edit_intra_cost_form")[0].checkValidity()) {
        e.preventDefault();
        $('#edit_intra_state_cost').val('Please wait...')
      $.ajax({
        url:"pages/config/controller.php",
        method:"POST",
        data:$("#edit_intra_cost_form").serialize()+  "&action=Edit_Intra_State_Cost" ,
        success:(res =>{
          console.log(res);
          if (res === "success") {
            $('#edit_intra_cost_form')[0].reset()
          
            swal.fire({
                title:'Intra State Cost Added Successfully',
                icon: res, 
            })
            $('#edit_intra_state_cost').val('Add Cost')
          }else{
            $("#errorMsg").text("An Error occurred Please Try again!")
            setTimeout(() => {
              $("#errorMsg").text("")
            }, 5000);
          }
          
        })
      })
    }
    
  })
</script>

</body>
</html>



