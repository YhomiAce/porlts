<?php
if(isset($_POST['submit']))
{
include 'config/config.php';

$state = $_POST['state'];
$kg1 = $_POST['kg1'];

$cost1 = $_POST['cost1'];
$discount1 = $_POST['discount1'];
$earned1 = $_POST['earned1'];
$insurance1 = $_POST['insurance1'];


$kg2 = $_POST['kg2'];
$cost2 = $_POST['cost2'];
$discount2 = $_POST['discount2'];
$earned2= $_POST['earned2'];
$insurance2 = $_POST['insurance2'];


$kg3 = $_POST['kg3'];
$cost3 = $_POST['cost3'];
$discount3 = $_POST['discount3'];
$earned3= $_POST['earned3'];
$insurance3 = $_POST['insurance3'];



$kg4 = $_POST['kg4'];
$cost4 = $_POST['cost4'];
$discount4 = $_POST['discount4'];
$earned4= $_POST['earned4'];
$insurance4 = $_POST['insurance4'];


$kg5 = $_POST['kg5'];
$cost5 = $_POST['cost5'];
$discount5 = $_POST['discount5'];
$earned5= $_POST['earned5'];
$insurance5 = $_POST['insurance5'];

$date_t=date("d-M-Y");



if($cost1 !== "")
{
$sql2=$con->query("INSERT INTO intra_cost (state, kg, cost, multiplier, discount, earned,  insurance, date_t) VALUES('$state', '$kg1', '$cost1', '$multiplier1', '$discount1', '$earned1', '$insurance1', '$date_t')") or die("error: ".mysqli_error($con));
}


if($cost2 !== "")
{

$sql2=$con->query("INSERT INTO intra_cost (state, kg, cost, multiplier, discount, earned,  insurance, date_t) VALUES('$state', '$kg2', '$cost2', '$multiplier2', '$discount2', '$earned2', '$insurance2', '$date_t')") or die("error: ".mysqli_error($con));
}


if($cost3 !== "")
{

$sql2=$con->query("INSERT INTO intra_cost (state, kg, cost, multiplier, discount, earned,  insurance, date_t) VALUES('$state', '$kg3', '$cost3', '$multiplier3', '$discount3', '$earned3', '$insurance3', '$date_t')") or die("error: ".mysqli_error($con));
}

if($cost4 !== "")
{
$sql2=$con->query("INSERT INTO intra_cost (state, kg, cost, multiplier, discount, earned,  insurance, date_t) VALUES('$state', '$kg4', '$cost4', '$multiplier4', '$discount4', '$earned4', '$insurance4', '$date_t')") or die("error: ".mysqli_error($con));
}


if($cost5 !== "")
{
$sql2=$con->query("INSERT INTO intra_cost (state, kg, cost, multiplier, discount, earned,  insurance, date_t) VALUES('$state', '$kg5', '$cost5', '$multiplier5', '$discount5', '$earned5', '$insurance5', '$date_t')") or die("error: ".mysqli_error($con));
}


if($sql2)
{
?>
<script type="text/javascript">
window.location = "?p=intra_costs";
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
       New Intra State Cost
      </h2>
      <p><a href="?p=dashbaord"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a href="?p=intra-costs">Intra Cost</a> &nbsp;&nbsp;  >  &nbsp;&nbsp; <a class="active">New Intra State Cost</a></p>
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
 <table class="table dtable-striped dtable-hover no-head-border">
                    
<tr><td><td style="color: green; font-size: 15px;"><?php echo $up_error; ?></td></tr>
    <tr><td style="width: 30%; font-size: 16px;">City<td>
      <select type="text" name="state" required="required" style="width: 100%; height: 40px;">
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
      <select  type="text" name="kg1"  required="required" style="width: 100%; height: 40px;">
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


 <tr><td style="width: 30%; font-size: 16px;">Cost<td><input  type="number" name="cost1"  step="0.01"  required="required" style="width: 100%; height: 40px;"></td></td></tr>
 <!--<tr><td style="width: 30%; font-size: 16px;">Multiplier<td><input  type="number" name="multiplier"  required="required" style="width: 100%; height: 40px;"></td></td></tr>-->

<tr><td style="width: 30%; font-size: 16px;">Dicount<td><input  type="number" name="discount1" step="0.01"  required="required" style="width: 100%; height: 40px;"></td></td></tr>

 <tr><td style="width: 30%; font-size: 16px;">Earned<td><input  type="number" name="earned1" step="0.01"  required="required" style="width: 100%; height: 40px;"></td></td></tr>


<tr><td style="width: 30%; font-size: 16px;">Insurance<td><input  type="number" name="insurance1" step="0.01"  required="required" style="width: 100%; height: 40px;"></td></td></tr>

</td></tr>
</table>


 <table class="table dtable-striped dtable-hover no-head-border">
<tr><td style="width: 30%; font-size: 16px;">Kg2<td>
      <select  type="text" name="kg2"  required="required" style="width: 100%; height: 40px;">
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


 <tr><td style="width: 30%; font-size: 16px;">Cost<td><input  type="number" name="cost2" step="0.01"  required="required" style="width: 100%; height: 40px;"></td></td></tr>
 <!--<tr><td style="width: 30%; font-size: 16px;">Multiplier<td><input  type="number" name="multiplier"  required="required" style="width: 100%; height: 40px;"></td></td></tr>-->

<tr><td style="width: 30%; font-size: 16px;">Dicount<td><input  type="number" name="discount2" step="0.01"  required="required" style="width: 100%; height: 40px;"></td></td></tr>

 <tr><td style="width: 30%; font-size: 16px;">Earned<td><input  type="number" name="earned2" step="0.01"  required="required" style="width: 100%; height: 40px;"></td></td></tr>


<tr><td style="width: 30%; font-size: 16px;">Insurance<td><input  type="number" name="insurance2" step="0.01"  required="required" style="width: 100%; height: 40px;"></td></td></tr>

 </table>




 <table class="table dtable-striped dtable-hover no-head-border">
<tr><td style="width: 30%; font-size: 16px;">Kg3<td>
      <select  type="text" name="kg3"  required="required" style="width: 100%; height: 40px;">
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


 <tr><td style="width: 30%; font-size: 16px;">Cost<td><input  type="number" name="cost3"  step="0.01" required="required" style="width: 100%; height: 40px;"></td></td></tr>
 <!--<tr><td style="width: 30%; font-size: 16px;">Multiplier<td><input  type="number" name="multiplier"  required="required" style="width: 100%; height: 40px;"></td></td></tr>-->

<tr><td style="width: 30%; font-size: 16px;">Dicount<td><input  type="number" name="discount3" step="0.01"  required="required" style="width: 100%; height: 40px;"></td></td></tr>

 <tr><td style="width: 30%; font-size: 16px;">Earned<td><input  type="number" name="earned3" step="0.01"  required="required" style="width: 100%; height: 40px;"></td></td></tr>


<tr><td style="width: 30%; font-size: 16px;">Insurance<td><input  type="number" name="insurance3" step="0.01"  required="required" style="width: 100%; height: 40px;"></td></td></tr>

 </table>




 <table class="table dtable-striped dtable-hover no-head-border">
<tr><td style="width: 30%; font-size: 16px;">Kg4<td>
      <select  type="text" name="kg4"  required="required" style="width: 100%; height: 40px;">
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


 <tr><td style="width: 30%; font-size: 16px;">Cost<td><input  type="number" name="cost4"  step="0.01" required="required" style="width: 100%; height: 40px;"></td></td></tr>
 <!--<tr><td style="width: 30%; font-size: 16px;">Multiplier<td><input  type="number" name="multiplier"  required="required" style="width: 100%; height: 40px;"></td></td></tr>-->

<tr><td style="width: 30%; font-size: 16px;">Dicount<td><input  type="number" name="discount4" step="0.01"  required="required" style="width: 100%; height: 40px;"></td></td></tr>

 <tr><td style="width: 30%; font-size: 16px;">Earned<td><input  type="number" name="earned4" step="0.01"  required="required" style="width: 100%; height: 40px;"></td></td></tr>


<tr><td style="width: 30%; font-size: 16px;">Insurance<td><input  type="number" name="insurance4" step="0.01"  required="required" style="width: 100%; height: 40px;"></td></td></tr>

 </table>





 <table class="table dtable-striped dtable-hover no-head-border">
<tr><td style="width: 30%; font-size: 16px;">Kg5<td>
      <select  type="text" name="kg5"  required="required" style="width: 100%; height: 40px;">
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


 <tr><td style="width: 30%; font-size: 16px;">Cost<td><input  type="number" name="cost5" step="0.01"  required="required" style="width: 100%; height: 40px;"></td></td></tr>
 <!--<tr><td style="width: 30%; font-size: 16px;">Multiplier<td><input  type="number" name="multiplier"  required="required" style="width: 100%; height: 40px;"></td></td></tr>-->

<tr><td style="width: 30%; font-size: 16px;">Dicount<td><input  type="number" name="discount5" step="0.01"  required="required" style="width: 100%; height: 40px;"></td></td></tr>

 <tr><td style="width: 30%; font-size: 16px;">Earned<td><input  type="number" name="earned5" step="0.01"  required="required" style="width: 100%; height: 40px;"></td></td></tr>


<tr><td style="width: 30%; font-size: 16px;">Insurance<td><input  type="number" name="insurance5" step="0.01"  required="required" style="width: 100%; height: 40px;"></td></td></tr>

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



