<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config/conn.php';
require_once 'config/actions.php';

$states = fetchAllState($conn); 
$weights = fetchAllWeight($conn);


// if(isset($_POST['submit']))
// {
// include 'config/config.php';

// $state = $_POST['state'];
// $state2 = $_POST['state2'];
// $kg1 = $_POST['kg1'];
// $cost1 = $_POST['cost1'];

// //$multiplier = $_POST['multiplier'];
// $discount1 = $_POST['discount1'];
// $earned1 = $_POST['earned1'];
// $insurance1 = $_POST['insurance1'];



?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <div class="row">
      <div class="col-md-6">
      <h2 style="margin-top: 0px;">
       New Inter State Cost
      </h2>
      <p><a href="?p=dashbaord"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a href="?p=inter_costs">Inter Cost</a> &nbsp;&nbsp;  >  &nbsp;&nbsp; <a class="active">New Inter State Cost</a></p>
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
       
          <form action="#" id="inter_cost_form" method="post" enctype="multipart/form-data">
<div id="errorMsg" class="text-center text-danger"></div>
<div class="card bg-light">
          <div class="card-header">
            <h4>Add Inter State Cost </h4>

          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="">Origin State</label>
              <select name="state1" id="state1" class="form-control" required >
                <option value="" selected disabled>Select State</option>
                <?php foreach($states as $state): ?>
                <option value="<?= $state['name']; ?>"><?= $state['name']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Destination State</label>
              <select name="state2" id="state2" class="form-control" required >
                <option value="" selected disabled>Select State</option>
                <?php foreach($states as $state): ?>
                <option value="<?= $state['name']; ?>"><?= $state['name']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            
            <div class="form-group">
              <label for="">Choose Package Weight</label>
              <select  type="text" name="kg"  required="required" class="form-control" >
                <option value="" selected disabled>Select Weight</option>
                  <?php foreach($weights as $weight): ?>
                  <option value="<?= $weight['kg']; ?>"><?= $weight['kg']; ?></option>
                  <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Cost</label>
              <input  type="number" name="cost" step="0.01"  required="required" class="form-control" >
            </div>
            <div class="form-group">
              <label for="">Discount</label>
              <input  type="number" name="discount" step="0.01"  required="required" class="form-control" >
            </div>
            <div class="form-group">
              <label for="">Earned</label>
              <input  type="number" name="earned" step="0.01"  required="required" class="form-control" >
            </div>
            <div class="form-group">
              <label for="">Insurance</label>
              <input  type="number" name="insurance" step="0.01"  required="required" class="form-control" >
            </div>
            <button type="submit" name="submit" id="add_inter_state_cost" class="btn btn-info">Add Cost</button>
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
  $("#add_inter_state_cost").click((e)=>{
    if ($("#inter_cost_form")[0].checkValidity()) {
        e.preventDefault();
        $('#add_inter_state_cost').val('Please wait...')
      $.ajax({
        url:"pages/config/controller.php",
        method:"POST",
        data:$("#inter_cost_form").serialize()+  "&action=Add_inter_State_Cost" ,
        success:(res =>{
          console.log(res);
          if (res === "success") {
            $('#inter_cost_form')[0].reset()
          
            swal.fire({
                title:'inter State Cost Added Successfully',
                icon: res, 
            })
            $('#add_inter_state_cost').val('Add Cost')
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



