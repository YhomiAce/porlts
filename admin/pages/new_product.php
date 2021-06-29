<?php
if(isset($_POST['submit']))
{
include 'config/config.php';

$product=$_POST['product'];
$sector=$_POST['sector'];
$category=$_POST['category'];

$price=$_POST['price'];

$discount = $_POST['discount'];
$ref_cashback=$_POST['ref_cashback'];
$pur_cashback=$_POST['pur_cashback'];
//$shipping=$_POST['shipping'];


$description=$_POST['description'];
$warranty=$_POST['warranty'];


$return_policy = $_POST['return_policy'];


$vendor = $_POST['vendor'];

$date_t=date("d-M-Y");


$file_size1=$_FILES['pic']['size'];
 
  $file1=$_FILES['pic']['name'];
  $file_type1=$_FILES['pic']['type'];
  $kaboom = explode(".", $file1);
  $fileExt = end($kaboom);
  $file1 = rand(100000000000,999999999999).".".$fileExt;
  
  $allowed_files=array("image/jpeg","image/jpg", "image/png");
  $path1="products/".$file1;
  $date_t=date('d-M-Y');


  function check_number(){

require 'config/config.php';

    $unique_number = rand(100000, 999999);

    $sql = $con->query("SELECT * FROM product WHERE product_code = '$unique_number'")  or die ("error: ".mysqli_error($con));
    $exists = mysqli_num_rows($sql);



    if ($exists >0){
        $results = check_number();
    }
     else{
            $results = $unique_number;
        return $results;
     }


}

$code =  check_number();

if($file_size1 > 0 )
{
move_uploaded_file($_FILES['pic']['tmp_name'],$path1);
}


$sql=$con->query("INSERT INTO product (product, product_code, photo, product_sector, product_category, vendor, price,  ref_cashback, purchase_cashback, description, warranty, return_policy, date_t) VALUES('$product', '$code', '$file1', '$sector', '$category', '$vendor', '$price',  '$ref_cashback', '$pur_cashback',  '$description', '$warranty', '$return_policy', '$date_t')") or die("error: ".mysqli_error($con));


if($sql)
{
$up_error="New product added successfully.";
}
}
?>
<?php
require 'process/get_product_categories.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <div class="row">
      <div class="col-md-6">
      <h2 style="margin-top: 0px;">
       Add  a New Product
      </h2>
      <p><a href="?p=dashbaord"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a href="?p=products">Products</a> &nbsp;&nbsp;  > &nbsp;&nbsp; <a class="active">Add New Product</a></p>
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
                    
<tr><td><td style="color: green; font-weight: 600; font-size: 16px;"><?php echo $up_error; ?></td></tr>


<tr><td style="width: 30%;">Vendor <td><select name="vendor" drequired="required" style="width: 100%; height: 40px;"><option value="">Select Vendor</option><?php echo get_vendor(); ?></select> </td></td>
<tr><td style="width: 30%;">Product<td><input type="text" name="product" required="required" style="width: 100%; height: 40px;"></td></td></tr>


<tr><td style="width: 30%;">Product Sector<td><select name="sector" drequired="required" style="width: 100%; height: 40px;">

<?php get_sector(); ?>
</select>
</td></td></tr>

<tr><td style="width: 30%;">Product Category<td><select name="category" drequired="required" style="width: 100%; height: 40px;">
<?php get_category(); ?>
</select>
</td></td></tr>


  <tr><td style="width: 30%; font-size: 16px;">Photo<td><input type="file" name="pic" drequired="required"  style="width: 100%; height: 40px; padding-left: 0.5em;"></td></td></tr>

  <tr><td style="width: 30%;">Price<td><input type="number" name="price" required="required" style="width: 100%; height: 40px;"></td></td></tr>
  
<tr><td style="width: 30%;">Referral Cashback<td><input type="number" name="ref_cashback" required="required" style="width: 100%; height: 40px;"></td></td></tr>
<tr><td style="width: 30%;">Purchase Cashback<td><input type="text" name="pur_cashback" required="required" style="width: 100%; height: 40px;"></td></td></tr>
<!--<tr><td style="width: 30%;">Shipping<td><input type="text" name="shipping" required="required" style="width: 100%; height: 40px;"></td></td></tr>-->
<tr><td style="width: 30%;">Description<td><textarea  name="description" required="required" style="width: 100%; height: 100px;"></textarea></td></td></tr>
<tr><td style="width: 30%;">Warranty<td><input type="text" name="warranty" required="required" style="width: 100%; height: 40px;"></td></td></tr>
<tr><td style="width: 30%;">Return Policy<td><textarea name="return_policy" required="required" style="width: 100%; height: 100px;"></textarea></td></td></tr>


</table>

<table class="table dtable-striped dtable-hover no-head-border">
  <tr><td style="width: 30%;"><td><input type="submit" name="submit" value="ADD PRODUCT" class="btn btn-primary" style="height: 40px; width: 200px; dbackground-color: blue; color: white; border:none;"></td></td></tr> 
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



<?php
function product_list ()
{

}





?>