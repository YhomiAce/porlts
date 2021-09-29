<aside class="main-sidebar" style="min-height: 400px;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="min-height: 400px;">
      <!-- Sidebar user panel -->
      <!-- search form -->
     <!-- <form action="sales.php" method="get" class="sidebar-form">
        <div class="input-group">
         <!-- <input type="text" name="q" value="<?php //echo $_GET['q']; ?>" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
     <ul class="sidebar-menu" dstyle="line-height: 10px;">
      

         <!-- <li class="treeview">
          <a href="#">
           <i class="fa fa-folder"></i>  <span style="font-family: verdana; font-size: 13px; font-weight: normal;">BUSINESS UNIT</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

           <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="add_biz_unit.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>ADD BUSINESS UNIT</a></li>
           <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="add_product_class.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>ADD PRODUCT CLASS</a></li>
            
          </ul>
          </li> -->
  <li class="treeview">
          <a href="?p=dashboard">
           <i class="far fa-clock"></i>  <span style="font-family: verdana; font-size: 13px; font-weight: normal;"> &nbsp; DASHBOARD</span>
          <!--  <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>-->
          </a>
          </li> 






          <li class="treeview">
          <a href="#">
           <i class="fa fa-user-friends"></i>  <span style="font-family: verdana; font-size: 13px; font-weight: normal;">USERS</span>
           <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
      <li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=customers" style="font-size: 13px;"><i class="fa fa-circle-o"></i>All Users</a></li>
      <li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=pending_kyc" style="font-size: 13px;"><i class="fa fa-circle-o"></i>Awaiting Approval</a></li>
      <li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=approved_kyc" style="font-size: 13px;"><i class="fa fa-circle-o"></i>Approved Users</a></li>
      <li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=rejected_kyc" style="font-size: 13px;"><i class="fa fa-circle-o"></i>Rejected Users</a></li>
       <!-- <li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=sub_categories" style="font-size: 13px;"><i class="fa fa-circle-o"></i>Sub Categories</a></li>-->                 
         </ul>
          </li> 



 <li class="treeview">
          <a href="#">
          <i class="fa fa-folder"></i>  <span style="font-family: verdana; font-size: 13px; font-weight: normal;">PACKAGES</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
         <ul class="treeview-menu">


  <li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=pending" style="font-size: 13px;"><i class="fa fa-circle-o"></i>Pending Packages</a></li>
  <li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=unpaid_package" style="font-size: 13px;"><i class="fa fa-circle-o"></i>Unpdaid Packages</a></li>
  <li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=accepted" style="font-size: 13px;"><i class="fa fa-circle-o"></i>Accepted Packages</a></li>
  <li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=pickups" style="font-size: 13px;"><i class="fa fa-circle-o"></i>Pick Ups</a></li>
  <li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=handovers" style="font-size: 13px;"><i class="fa fa-circle-o"></i>Handovers</a></li>
        
         </ul>
          </li> 



   <li class="treeview">
          <a href="?p=chats">
           <i class="fa fa-comment"></i>  <span style="font-family: verdana; font-size: 13px; font-weight: normal;">Chat</span>
           <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          </li> 


<?php
$level =  $_SESSION['porlt_level'];

if($level == 1)
{
?>
 <li class="treeview">
          <a href="#">
          <i class="fa fa-cog"></i>  <span style="font-family: verdana; font-size: 13px; font-weight: normal;">SETTINGS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
         <ul class="treeview-menu">
  <li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=states" style="font-size: 13px;"><i class="fa fa-circle-o"></i>States</a></li>
  <li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=pickup_cities" style="font-size: 13px;"><i class="fa fa-circle-o"></i>Pickup Cities</a></li>
  <li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=des_cities" style="font-size: 13px;"><i class="fa fa-circle-o"></i>Destination Cities</a></li>
  <li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=intra_costs" style="font-size: 13px;"><i class="fa fa-circle-o"></i>Set Intra-State Cost</a></li>
  <li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=inter_costs" style="font-size: 13px;"><i class="fa fa-circle-o"></i>Set Inter-State Cost</a></li>
   <li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=kg_range" style="font-size: 13px;"><i class="fa fa-circle-o"></i>Set KG Range</a></li>
  <!--<li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=commission" style="font-size: 13px;"><i class="fa fa-circle-o"></i>Set Commission</a></li>-->
  <li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=parcel" style="font-size: 13px;"><i class="fa fa-circle-o"></i>Parcel</a></li>
 
         </ul>
          </li> 

<li class="treeview">
  <a href="#">
  <i class="fas fa-wallet"></i>   <span style="font-family: verdana; font-size: 13px; font-weight: normal;">&nbsp; Withdraws</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-right pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=withdrawals" style="font-size: 13px;"><i class="fa fa-circle-o"></i>Pending</a></li>
    <li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=approved" style="font-size: 13px;"><i class="fa fa-circle-o"></i>Approved</a></li>
    <li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=disapproved" style="font-size: 13px;"><i class="fa fa-circle-o"></i>Disapproved</a></li>

  </ul>
</li> 
<?php
}
?>

<!--<li class="treeview">
          <a href="#">
          <i class="fa fa-folder"></i>  <span style="font-family: verdana; font-size: 13px; font-weight: normal;">WITHDRAWALS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
         <ul class="treeview-menu">


  <!--<li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=transactions" style="font-size: 13px;"><i class="fa fa-circle-o"></i>Recent Transactions</a></li>-->
<!-- <li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=pending_withdrawals" style="font-size: 13px;"><i class="fa fa-circle-o"></i>Pending Withdrawals</a></li>
   <li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=completed_withdrawals" style="font-size: 13px;"><i class="fa fa-circle-o"></i>Completed Withdrawals</a></li>
  <!--<li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=withdrawals" style="font-size: 13px;"><i class="fa fa-circle-o"></i>Recent Withdrawals</a></li>-->
        
        <!-- </ul>
          </li> 



     <li class="treeview">
          <a href="#">
           <i class="fa fa-folder"></i>  <span style="font-family: verdana; font-size: 13px; font-weight: normal;">DISPUTES</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
         <ul class="treeview-menu">


  <li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=new_disputes" style="font-size: 13px;"><i class="fa fa-circle-o"></i>New Disputes</a></li>
  <li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=ongoing_disputes" style="font-size: 13px;"><i class="fa fa-circle-o"></i>Ongoing Disputes </a></li>
  <li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=resolved_disputes" style="font-size: 13px;"><i class="fa fa-circle-o"></i>Resolved Disputes</a></li>
 
       </li>
            
         </ul>
          </li> -->




<?php 

/*$level = $_SESSION['payondeliver_level'];
if($level == 1)
{ */
?>
<?php
$level =  $_SESSION['porlt_level'];

if($level == 1)
{
?>

 <li class="treeview">
          <a href="#">
           <i class="fa fa-folder"></i>  <span style="font-family: verdana; font-size: 13px; font-weight: normal;">ADMIN USERS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
         <ul class="treeview-menu">
  <li style="font-family: verdana; font-size: 14px; font-weight: normal;"><a href="?p=admin_users" style="font-size: 13px;"><i class="fa fa-circle-o"></i>ADMIN USERS</a></li>
 
       </li>

</ul>
</li>
<?php
}
?>

<li class="treeview">
          <a href="logout.php">
           <i class="fa fa-laptop"></i>  <span style="font-family: verdana; font-size: 13px; font-weight: normal;">LOGOUT</span>
            </a>
          </li> 








</ul>
</section>
</aside>





    </section>
    <!-- /.sidebar -->
  </aside>