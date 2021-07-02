<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['submit']))
{
include 'config/config.php';

$id = $_POST['id'];
$state = $_POST['state'];
$state2 = $_POST['state2'];
$kg = $_POST['kg'];
$cost = $_POST['cost'];

$discount = $_POST['discount'];
//$multiplier = $_POST['multiplier'];
$earned = $_POST['earned'];
$insurance = $_POST['insurance'];


$date_t=date("d-M-Y");



if($cost1 !== "")
{
$sql2=$con->query("UPDATE  inter_cost  SET state1 = '$state', state2 = '$state2',  kg = '$kg', cost = '$cost',  discount = '$discount', earned = '$earned',  insurance = '$insurance', date_t = '$date_t' WHERE id = '$id'") or die("error: ".mysqli_error($con));
}


if($sql2)
{
?>
<script type="text/javascript">
window.location = "?p=inter_costs";
</script>
<?php
}
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <div class="row">
      <div class="col-md-6">
      <h2 style="margin-top: 0px;">
       Edit Intra State Cost
      </h2>
      <p><a href="?p=dashbaord"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a href="?p=intra_costs">Intra Cost</a> &nbsp;&nbsp;  >  &nbsp;&nbsp; <a class="active">Edit Intra State Cost</a></p>
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
       
<form action="#" method="post" enctype="multipart/form-data">

<?php

require 'config/config.php';
$id = $_GET['id'];
$sql=$con->query("SELECT * FROM inter_cost WHERE id = '$id'") or die("Error2 : ". mysqli_error($con));


 $i=1;
   
   $rows=mysqli_fetch_array($sql);
   
    $id=$rows['id'];
    $state1 = $rows['state1'];
    $state2 = $rows['state2'];
    $kg = $rows['kg'];
    $cost = $rows['cost'];
    
    $earned = $rows['earned'];
    $discount=$rows['discount'];
    $insurance=$rows['insurance'];
    
    
    $date_t =$rows['date_t'];

    $date_t = date('d-M-Y',strtotime('+0 days',strtotime(str_replace('/', '-', $date_t))));
    
    
?>



  <input type="hidden" name="id" value="<?php echo $id; ?>">
 <table class="table dtable-striped dtable-hover no-head-border">
                    
<tr><td><td style="color: green; font-size: 15px;"></td></tr>
    <tr><td style="width: 30%; font-size: 16px;">City1<td>
      <select type="text" name="state" required="required" style="width: 100%; height: 40px;">
        <option><?php echo $state1; ?></option>
         <?php
     include 'config/config.php';
      $sql=$con->query("SELECT * FROM pickup_cities  ORDER BY id DESC") or die("Error2 : ". mysqli_error($con));

   
  while ($rows=mysqli_fetch_array($sql))
   {
    $id=$rows['id'];
    $city = $rows['cities'];
    ?>
    <option><?php echo $city; ?></option>
   <?php
   }


   ?>
      </select>
      </td></td></tr>
   
    <tr><td style="width: 30%; font-size: 16px;">City2<td>
      <select type="text" name="state2" required="required" style="width: 100%; height: 40px;">
        <option><?php echo $state2; ?></option>
         <?php
     include 'config/config.php';
      $sql=$con->query("SELECT * FROM pickup_cities  ORDER BY id DESC") or die("Error2 : ". mysqli_error($con));

   
  while ($rows=mysqli_fetch_array($sql))
   {
    $id=$rows['id'];
    $city = $rows['cities'];
    ?>
    <option><?php echo $city; ?></option>
   <?php
   }


   ?>
      </select>
      </td></td></tr>
    <tr><td style="width: 30%; font-size: 16px;">Kg<td>
      <select  type="text" name="kg"   required="required" style="width: 100%; height: 40px;">
        <option><?php echo $kg; ?></option>
      <?php
     include 'config/config.php';
      $sql=$con->query("SELECT * FROM kg_range  ORDER BY id DESC") or die("Error2 : ". mysqli_error($con));

   
  while ($rows=mysqli_fetch_array($sql))
   {
    $id=$rows['id'];
    $kg = $rows['kg'];
    ?>
    <option><?php echo $kg; ?></option>
   <?php
   }


   ?>
      </select>
      </td></td></tr>


 <tr><td style="width: 30%; font-size: 16px;">Cost<td><input  type="number" name="cost" value="<?php echo $cost; ?>"  step="0.01"  required="required" style="width: 100%; height: 40px;"></td></td></tr>
 <!--<tr><td style="width: 30%; font-size: 16px;">Multiplier<td><input  type="number" name="multiplier"  required="required" style="width: 100%; height: 40px;"></td></td></tr>-->

<tr><td style="width: 30%; font-size: 16px;">Dicount<td><input  type="number" name="discount" value="<?php echo $discount; ?>" step="0.01"  required="required" style="width: 100%; height: 40px;"></td></td></tr>

 <tr><td style="width: 30%; font-size: 16px;">Earned<td><input  type="number" name="earned" step="0.01"  value="<?php echo $earned; ?>" required="required" style="width: 100%; height: 40px;"></td></td></tr>


<tr><td style="width: 30%; font-size: 16px;">Insurance<td><input  type="number" name="insurance" step="0.01" value="<?php echo $insurance; ?>"  required="required" style="width: 100%; height: 40px;"></td></td></tr>

</td></tr>
</table>



<table class="table dtable-striped dtable-hover no-head-border">
  <tr><td style="width: 30%;"><td><input type="submit" name="submit" class="btn btn-primary" value="ADD COST" style="height: 40px; width: 200px; dbackground-color: blue; color: white; border:none;"></td></td></tr> 
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



