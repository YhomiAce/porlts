
<?php 
function get_sector()
{
require 'config/config.php'; 
//$loc=$_GET['location'];

$sql=$con->query("SELECT * FROM product_sector ORDER BY sector ASC") or die("Error2 : ". mysqli_error($con));

if($sql)
{

  while ($rows=mysqli_fetch_array($sql))
   {
    $sector=$rows['sector'];
    $date_t=$rows['date_t'];

    
    
    echo '<option value="'.$sector.'">&nbsp;'.$sector.'</option>';

  }
}

}


function get_categories()
{
require 'config/config.php'; 
//$loc=$_GET['location'];

$sql=$con->query("SELECT * FROM categories ORDER BY categories ASC") or die("Error2 : ". mysqli_error($con));

if($sql)
{

  while ($rows=mysqli_fetch_array($sql))
   {
    $category=$rows['categories'];
    $date_t=$rows['date_t'];


    echo '<option value="'.$category.'">&nbsp;'.$category.'</option>';

  }
}

}

function get_channels()
{
   require 'config/config.php';
 $sql=$con->query("SELECT * FROM channels ORDER BY channels ASC");
          while($rows=mysqli_fetch_array($sql))
          {
                     
            $id=$rows['id'];
            $channels=$rows['channels'];
            //$code = $rows['product_code'];
            echo '<option value="'.$channels.'"">'.$channels.'</option>';
 
}
}

function get_vendor()
{
   require 'config/config.php';
 $sql=$con->query("SELECT * FROM vendors ORDER BY vendor ASC");
          while($rows=mysqli_fetch_array($sql))
          {
                     
            $id=$rows['id'];
            $vendor=$rows['vendor'];
            $vendor_code = $rows['vendor_code'];
          
            echo '<option value="'.$vendor_code.'"">'.$vendor.'</option>';
      
}
}
