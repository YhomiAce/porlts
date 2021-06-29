<?php
if(isset($_POST['submit']))
{
include 'config/config.php';

$category=$_POST['category'];
$subcategory=$_POST['subcategory'];


$date_t=date("d-M-Y");


$sql=$con->query("INSERT INTO sub_categories (categories, sub_category, date_t) VALUES('$category', '$subcategory', '$date_t')") or die("error: ".mysqli_error($con));

if($sql)
{
?>
<script type="text/javascript">
window.location = "?p=sub_categories";
</script>
<?php
}
}
?>

<?php
require 'process/get_categories.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <div class="row">
      <div class="col-md-6">
      <h2 style="margin-top: 0px;">
       Add  a New Sub Category
      </h2>
      <p><a href="?p=dashbaord"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a href="?p=sub_categories"> Sub Categories</a> &nbsp;&nbsp;  > &nbsp;&nbsp; <a class="active">Add New Sub Category</a></p>
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
      
        <!-- <h4 style="color: green; text-align: center; font-weight: bold;"> <?php echo $up_error; ?></h4>-->
          <div style="dborder: solid; border-width: thin; border-color: #ccc; margin-top: 0px; padding: 1.5em; dheight: 500px; ">
       
<form action="#" method="post" enctype="multipart/form-data">
 <table class="table dtable-striped dtable-hover no-head-border">
  
  <tr><td><td style="color: green; font-size: 15px;"><?php echo $up_error; ?></td></tr>
    <tr><td style="width: 30%; font-size: 16px;">Ad Category<td>
      <select type="text" name="category" required="required" style="width: 100%; height: 40px;">
        <option>Select Ad Category</option>
        <?php get_categories(); ?>
        
      </select></td></td></tr>
      
    <tr><td style="width: 30%; font-size: 16px;">New Sub Category<td><input  type="text" name="subcategory" required="required" style="width: 100%; height: 40px;"></td></td></tr>

   


 
</table>


<table class="table dtable-striped dtable-hover no-head-border">
  <tr><td style="width: 30%;"><td><input type="submit" name="submit" class="btn btn-primary" value="ADD SUB CATEGORY" style="height: 40px; width: 200px; dbackground-color: blue; color: white; border:none;"></td></td></tr> 
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



