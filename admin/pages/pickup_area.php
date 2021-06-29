<?php
  require_once "config/conn.php";
  require_once "config/actions.php";

  $states = fetchAllPickupState($conn);

  $msg = "";
  $msgClass = "";

  if(isset($_POST['submit'])) {
    $state = $_POST['pickup_state'];
    $area = testInput($_POST['area']);
    $post_code = testInput($_POST['post_code']);
    
    if (empty($state) || empty($area) || empty($post_code)) {

      $msg = "Please fill all fields";
      $msgClass = "warning";
      
    }else{
      // var_dump($state, $area, $post_code);
      $save = savePickupArea($conn, $state, $area, $post_code);
      if ($save) {
        $msgClass = "success";
        $msg = "Pickup Area saved Successfully";
      }
    }
    
  }

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <div class="row justify-content-center">
      <div class="col-md-6">
      <h2 style="margin-top: 0px;">
       Add a New Pickup Area
      </h2>
      <p><a href="?p=dashboard"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a href="?p=pickup_cities">Pickup Area</a> &nbsp;&nbsp;  > &nbsp;&nbsp; <a class="active">Add a New Pickup Area</a></p>
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
       <?php if($msg !== ""): ?>
        <div class="alert alert-<?= $msgClass; ?> alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong></strong> <?= $msg; ?>
        </div>
      <?php endif; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card bg-light">
          <div class="card-header">
            <h4>Add Pickup Area</h4>

          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="">Select State</label>
              <select name="pickup_state" id="pickup_state" class="form-control" >
                <option value="" selected disabled>Select State</option>
                <?php foreach($states as $state): ?>
                <option value="<?= $state['id']; ?>"><?= $state['cities']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
                <label for="">Pickup Area</label>
                <input type="text" name="area" id="area" class="form-control" >
            </div>
            <div class="form-group">
                <label for="">Postal Code</label>
                <input type="text" name="post_code" id="post_code" class="form-control" >
            </div>
            <button type="submit" name="submit" id="add_area" class="btn btn-info">Add Area</button>
          </div>
        </div>
    </form>
 



   
<?php include('includes/js.php')?>
</body>
</html>



