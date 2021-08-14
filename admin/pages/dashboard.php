<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <p><a href="#"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a class="active">Dashboard</a>
        
     <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>-->

<!--      <p style="font-size: 16px; font-weight: bold;"> <a href="dashboard.php?tl=1" style="color: red;">TILL DATE</a> &nbsp; &nbsp; <a href="dashboard.php?tl=2"> THIS YEAR</a>&nbsp; &nbsp; <a href="dashboard.php?tl=3"> LAST QUATER</a>&nbsp; &nbsp; <a href="dashboard.php?tl=4"> THIS MONTH</a>&nbsp; &nbsp; <a href="dashboard.php?tl=5"> THIS WEEK</a>&nbsp; &nbsp; <a href="dashboard.php?tl=6"> TODAY</a></p>-->
    </section>
    
    <!-- Main content -->



     
 

     <a href="?p=customers">
 <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
  
   <?php
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
   
      require 'config/config.php';
     $sql2=$con->query("SELECT * FROM  porlt_users") or die("Error2 : ". mysqli_error($con));
      $count2 = mysqli_num_rows($sql2);

    if($count2 >= 1000)
      {
        $count2 = $count2/1000;
        $count2 = ceil($count2);
        $count2 = $count2."K";
    }
    elseif ($count2 >= 1000000)
    {
      $count2 = $count2 / 1000000;
      $count2 = ceil($count2);
      $count2 = $count2."M";
    } 



      ?>
    
                <h3 style="font-style: italic; font-size: 50px;"><?php echo $count2; ?></h3>

             <!-- <p style="font-size: 20px; font-weight: bold; dfont-style: italic;">G / M</p>-->
             <h3 style="font-size: 20px; font-style: italic; padding-top: 30px; ">TOTAL USERS</h3>
            </div>
            <div class="icon" style="padding-top: 10px;">
              <i class="glyphicon glyphicon"></i>
            </div>
          </div>
        </div>
</a>
        
        <!-- ./col -->



<a href="?p=pending">
 <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
  
          <?php
//$sql3 = $con->query("SELECT SUM(amount) as sumTotal FROM wallet_trans WHERE  account = 'Main' AND method = 'Transfer' AND status = 'Pending'") or die("Error2 : ". mysqli_error($con));

$sql3 = $con->query("SELECT * FROM drop_offs WHERE  status = 'Pending' AND payment_status = 'Successful'") or die("Error2 : ". mysqli_error($con));

$sumTotal = mysqli_num_rows($sql3);
//$sumTotal = $query3 ['sumTotal'];

    if($sumTotal >= 1000)
      {
        $sumTotal = $sumTotal/1000;
        $sumTotal = ceil($sumTotal);
      $sumTotal = $sumTotal."K";
    }
    elseif ($sumTotal >= 1000000)
    {
      $sumTotal = $sumTotal / 1000000;
      $sumTotal = ceil($sumTotal);
      $sumTotal = $sumTotal."M";
    }

?>

    
                <h3 style="font-style: italic; font-size: 50px;"><?php echo $sumTotal; ?></h3>

             <!-- <p style="font-size: 20px; font-weight: bold; dfont-style: italic;">G / M</p>-->
             <h3 style="font-size: 20px; font-style: italic; padding-top: 30px; ">PENDING PICKUPS</h3>
            </div>
            <div class="icon" style="padding-top: 10px;">
              <i class="glyphicon glyphicon"></i>
            </div>
          </div>
        </div>
</a>
     






<a href="?p=accepted">
 <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
  
          <?php
    
//$sql3 = $con->query("SELECT SUM(amount) as sumTotal FROM wallet_trans WHERE  trans_type  = 'WPayout' AND account = 'Main' AND method = 'Transfer' AND status = 'Completed'") or die("Error2 : ". mysqli_error($con));

$sql3 = $con->query("SELECT * FROM drop_offs WHERE  status = 'Accepted'  AND payment_status = 'Successful'") or die("Error2 : ". mysqli_error($con));

$sumTotal = mysqli_num_rows($sql3);
//$sumTotal = $query3 ['sumTotal'];

    if($sumTotal >= 1000)
      {
        $sumTotal = $sumTotal/1000;
        $sumTotal = ceil($sumTotal);
      $sumTotal = $sumTotal."K";
    }
    elseif ($sumTotal >= 1000000)
    {
      $sumTotal = $sumTotal / 1000000;
      $sumTotal = ceil($sumTotal);
      $sumTotal = $sumTotal."M";
    }

?>

    
                <h3 style="font-style: italic; font-size: 50px;"><?php echo $sumTotal; ?></h3>

             <!-- <p style="font-size: 20px; font-weight: bold; dfont-style: italic;">G / M</p>-->
             <h3 style="font-size: 20px; font-style: italic; padding-top: 30px; ">ACCEPTED DROP-OFFS</h3>
            </div>
            <div class="icon" style="padding-top: 10px;">
              <i class="glyphicon glyphicon-wallet"></i>
            </div>
          </div>
        </div>
</a>
     




<a href="#">
 <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
  
          <?php
    
//$sql3 = $con->query("SELECT SUM(amount) as sumTotal FROM wallet_trans WHERE  trans_type  = 'WPayout' AND method = 'Withdrawal' AND status = 'Pending'") or die("Error2 : ". mysqli_error($con));

$sql3 = $con->query("SELECT * FROM drop_offs WHERE  status = 'Picked Up'") or die("Error2 : ". mysqli_error($con));

$sumTotal = mysqli_num_rows($sql3);
//$sumTotal = $query3 ['sumTotal'];

    if($sumTotal >= 1000)
      {
        $sumTotal = $sumTotal/1000;
        $sumTotal = ceil($sumTotal);
      $sumTotal = $sumTotal."K";
    }
    elseif ($sumTotal >= 1000000)
    {
      $sumTotal = $sumTotal / 1000000;
      $sumTotal = ceil($sumTotal);
      $sumTotal = $sumTotal."M";
    }

?>

    
                <h3 style="font-style: italic; font-size: 50px;"><?php echo $sumTotal; ?></h3>

             <!-- <p style="font-size: 20px; font-weight: bold; dfont-style: italic;">G / M</p>-->
             <h3 style="font-size: 20px; font-style: italic; padding-top: 30px;">PICKED UP</h3>
            </div>
            <div class="icon" style="padding-top: 10px;">
             <!-- <i class="glyphicon glyphicon-user"></i>-->
            </div>
          </div>
        </div>
</a>




<a href="#">
 <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
  
                <?php
    
$sql3 = $con->query("SELECT * FROM drop_offs WHERE  status = 'Completed'") or die("Error2 : ". mysqli_error($con));

//$sql3 = $con->query("SELECT SUM(amount) as sumTotal FROM wallet_trans WHERE  trans_type  = 'WPayout'  AND method = 'Withdrawal' AND status = 'Completed'") or die("Error2 : ". mysqli_error($con));

$sumTotal = mysqli_num_rows($sql3);
//$sumTotal = $query3 ['sumTotal'];

    if($sumTotal >= 1000)
      {
        $sumTotal = $sumTotal/1000;
        $sumTotal = ceil($sumTotal);
      $sumTotal = $sumTotal."K";
    }
    elseif ($sumTotal >= 1000000)
    {
      $sumTotal = $sumTotal / 1000000;
      $sumTotal = ceil($sumTotal);
      $sumTotal = $sumTotal."M";
    }

?>

    
                <h3 style="font-style: italic; font-size: 50px;"><?php echo $sumTotal; ?></h3>

  
             <!-- <p style="font-size: 20px; font-weight: bold; dfont-style: italic;">G / M</p>-->
             <h3 style="font-size: 20px; font-style: italic; padding-top: 30px;">HANDOVERS</h3>
            </div>
            <div class="icon" style="padding-top: 10px;">
             <!-- <i class="glyphicon glyphicon-user"></i>-->
            </div>
          </div>
        </div>
</a>




<!--<a href="?p=ongoing_disputes">
 <div class="col-lg-4 col-xs-6">
          <!-- small box -->
         <!-- <div class="small-box bg-red">
            <div class="inner">
  
          <?php
    
     /*$sql2=$con->query("SELECT * FROM  disputes WHERE status = 'Pending'") or die("Error2 : ". mysqli_error($con));
      $count2 = mysqli_num_rows($sql2);

 if($count2 >= 1000)
      {
        $count2 = $count2/1000;
        $count2 = ceil($count2);
        $count2 = $count2."K";
    }
    elseif ($count2 >= 1000000)
    {
      $count2 = $count2 / 1000000;
      $count2 = ceil($count2);
      $count2 = $count2."M";
    } 

*/

      ?>
    
                <h3 style="font-style: italic; font-size: 50px;"><?php echo $count2; ?></h3>

             <!-- <p style="font-size: 20px; font-weight: bold; dfont-style: italic;">G / M</p>-->
           <!--  <h3 style="font-size: 20px; font-style: italic; padding-top: 30px;">PENDING DISPUTES</h3>
            </div>
            <div class="icon" style="padding-top: 10px;">
            <!--  <i class="glyphicon glyphicon-user"></i>-->
           <!-- </div>
          </div>
        </div>
</a> -->
     


<!--<a href="?p=resolved_disputes">
 <div class="col-lg-4 col-xs-6">
          <!-- small box -->
         <!-- <div class="small-box bg-purple">
            <div class="inner">
  
          <?php
    
     /* $sql2=$con->query("SELECT * FROM  disputes WHERE status = 'Completed'") or die("Error2 : ". mysqli_error($con));
      $count2 = mysqli_num_rows($sql2);

 if($count2 >= 1000)
      {
        $count2 = $count2/1000;
        $count2 = ceil($count2);
        $count2 = $count2."K";
    }
    elseif ($count2 >= 1000000)
    {
      $count2 = $count2 / 1000000;
      $count2 = ceil($count2);
      $count2 = $count2."M";
    } 

*/

      ?>
    
                <h3 style="font-style: italic; font-size: 50px;"><?php echo $count2; ?></h3>

             <!-- <p style="font-size: 20px; font-weight: bold; dfont-style: italic;">G / M</p>-->
            <!-- <h3 style="font-size: 20px; font-style: italic; padding-top: 30px;">COMPLETED DISPUTES</h3>
            </div>
            <div class="icon" style="padding-top: 10px;">
             <!-- <i class="glyphicon glyphicon-user"></i>-->
            <!--</div>
          </div>
        </div>
</a> -->
     





<!--<a href="?p=profits">
 <div class="col-lg-4 col-xs-6">
          <!-- small box -->
         <!-- <div class="small-box bg-orange">
            <div class="inner">
  
                <?php
    
/* $sql3 = $con->query("SELECT SUM(profit) as sumTotal FROM profit") or die("Error2 : ". mysqli_error($con));

$query3 = mysqli_fetch_assoc($sql3);
$sumTotal = $query3 ['sumTotal'];

$sumTotal = 0.04 * $sumTotal;

    if($sumTotal >= 1000)
      {
        $sumTotal = $sumTotal/1000;
        $sumTotal = ceil($sumTotal);
      $sumTotal = $sumTotal."K";
    }
    elseif ($sumTotal >= 1000000)
    {
      $sumTotal = $sumTotal / 1000000;
      $sumTotal = ceil($sumTotal);
      $sumTotal = $sumTotal."M";
    }
*/
?>

    
                <h3 style="font-style: italic; font-size: 50px;">&#8358;<?php echo $sumTotal; ?></h3>

  
             <!-- <p style="font-size: 20px; font-weight: bold; dfont-style: italic;">G / M</p>-->
          <!--   <h3 style="font-size: 20px; font-style: italic; padding-top: 30px;">TOTAL PROFITS</h3>
            </div>
            <div class="icon" style="padding-top: 10px;">
             <!-- <i class="glyphicon glyphicon-user"></i>-->
           <!-- </div>
          </div>
        </div>
</a>-->

        
        <!-- ./col -->



<a href="?p=withdrawals">
 <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
  
<?php
//$sql3 = $con->query("SELECT SUM(amount) as sumTotal FROM wallet_trans WHERE  account = 'Main' AND method = 'Transfer' AND status = 'Pending'") or die("Error2 : ". mysqli_error($con));

$sql3 = $con->query("SELECT * FROM withdrawal WHERE  status = 'New' ") or die("Error2 : ". mysqli_error($con));

$sumTotal = mysqli_num_rows($sql3);
//$sumTotal = $query3 ['sumTotal'];

    if($sumTotal >= 1000)
      {
        $sumTotal = $sumTotal/1000;
        $sumTotal = ceil($sumTotal);
      $sumTotal = $sumTotal."K";
    }
    elseif ($sumTotal >= 1000000)
    {
      $sumTotal = $sumTotal / 1000000;
      $sumTotal = ceil($sumTotal);
      $sumTotal = $sumTotal."M";
    }

?>
 <h3 style="font-style: italic; font-size: 50px;"><?php echo $sumTotal; ?></h3>

<!-- <p style="font-size: 20px; font-weight: bold; dfont-style: italic;">G / M</p>-->
<h3 style="font-size: 20px; font-style: italic; padding-top: 30px; ">Withdrawal Request</h3>
</div>
<div class="icon" style="padding-top: 10px;">
 <i class="glyphicon glyphicon"></i>
</div>
</div>
</div>
</a>