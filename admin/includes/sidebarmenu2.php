<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="icon/avatar.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="sales.php" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" value="<?php echo $_GET['q']; ?>" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
     <ul class="sidebar-menu" dstyle="line-height: 10px;">
      

         <!-- <li class="treeview">
          <a href="#">
           <i class="fa fa-folder"></i>  <span style="font-family: verdana; font-size: 13px; font-weight: normal;">BUSINESS UNIT</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

           <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="add_biz_unit.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>ADD BUSINESS UNIT</a></li>
           <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="add_product_class.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>ADD PRODUCT CLASS</a></li>
            
          </ul>
          </li> -->
  <li class="treeview">
          <a href="dashboard.php">
           <i class="fa fa-laptop"></i>  <span style="font-family: verdana; font-size: 13px; font-weight: normal;">DASHBOARD</span>
          <!--  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>-->
          </a>
          </li> 






          <li class="treeview">
          <a href="#">
           <i class="fa fa-laptop"></i>  <span style="font-family: verdana; font-size: 13px; font-weight: normal;">CUSTOMERS</span>
           <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">


             <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="all_customers.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>VIEW ALL CUSTOMERS</a></li>
              <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="customers1.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>VIEW CUSTOMERS BY MONTH</a></li>

            
                 
         </ul>
          </li> 



        
       <!-- <li class="treeview">
          <a href="#">
           <i class="fa fa-folder"></i>  <span style="font-family: verdana; font-size: 13px; font-weight: normal;">PRODUCTS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

           <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="add_products.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>ADD PRODUCTS</a></li>
            <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="add_coupon.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>ADD COUPON</a></li>
           
           <!-- <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="#" style="font-size: 12px;"><i class="fa fa-circle-o"></i> VIEW SALES</a></li> -->
         <!-- </ul>
          </li> -->




<!--<li class="treeview">
          <a href="#">
           <i class="fa fa-folder"></i>  <span style="font-family: verdana; font-size: 13px; font-weight: normal;">RESOURCES</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

           <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="resources.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>RESOURCES</a></li>
            
           <!-- <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="#" style="font-size: 12px;"><i class="fa fa-circle-o"></i> VIEW SALES</a></li> -->
       <!-- </ul>
          </li>



<!--<li class="treeview">
          <a href="#">
           <i class="fa fa-folder"></i>  <span style="font-family: verdana; font-size: 13px; font-weight: normal;">NEWS AND OFFERS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

           <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="add_offers.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>ADD OFFERS</a></li>
            
           <!-- <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="#" style="font-size: 12px;"><i class="fa fa-circle-o"></i> VIEW SALES</a></li> -->
         <!-- </ul>
          </li> -->


           



  <li class="treeview">
          <a href="#">
           <i class="fa fa-folder"></i>  <span style="font-family: verdana; font-size: 13px; font-weight: normal;">FINANCIALS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         <ul class="treeview-menu">

            <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="sales1.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>VIEW FINANCIALS</a></li>
          

            <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="till_date1.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>COLLECTION PLAN </a></li>

           <!--  <li style="font-family: verdana; font-size: 12px; text-transform: uppercase; font-weight: normal;"><a href="referral_tracker.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>Referal Tracker</a></li>
           
             <li style="font-family: verdana; font-size: 12px; text-transform: uppercase; font-weight: normal;"><a href="ref_pay.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>Referal Payment</a></li>-->
           

 <!--<li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="cost_of_sale.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>COST OF SALE </a></li>-->
         </ul>
          </li> 



<li class="treeview">
          <a href="#">
           <i class="fa fa-folder"></i>  <span style="font-family: verdana; font-size: 13px; font-weight: normal;">TRACK</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         <ul class="treeview-menu">

             <li style="font-family: verdana; font-size: 12px; text-transform: uppercase; font-weight: normal;"><a href="ref_track1.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>Referal Tracker</a></li>
           
             <li style="font-family: verdana; font-size: 12px; text-transform: uppercase; font-weight: normal;"><a href="ref_pay.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>Referal Payment</a></li>
           
  <li style="font-family: verdana; font-size: 12px; text-transform: uppercase; font-weight: normal;"><a href="edit_offers.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>Offers</a></li>
           
  <li style="font-family: verdana; font-size: 12px; text-transform: uppercase; font-weight: normal;"><a href="pme.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>UPDATE PME</a></li>

  <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="resources.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>UPDATE RESOURCES</a></li>
         
 <li style="font-family: verdana; font-size: 12px; text-transform: uppercase; font-weight: normal;"><a href="exam_dates.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>EXAM DATES</a></li>

 <li style="font-family: verdana; font-size: 12px; text-transform: uppercase; font-weight: normal;"><a href="view_exams_del.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>EXAM CANDIDATES</a></li>

 <!--<li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="cost_of_sale.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>COST OF SALE </a></li>-->
         </ul>
          </li> 





        <!-- <li>
  <a href="set_rate.php">
            <i class="fa fa-laptop"></i>
<span style="font-family: verdana; font-size: 13px; font-weight: normal;">SET EXCHANGE RATE</span>
            </li>
            <!--<span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>-->
         <!-- </a>
        </li>-->



 <li class="treeview">
          <a href="#">
           <i class="fa fa-folder"></i>  <span style="font-family: verdana; font-size: 13px; font-weight: normal;">P2 DATA</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <!--  <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="add_delegates.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>ADD DELEGATES</a></li>-->
            <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="p2_upcoming.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>P2F INFO</a></li>
             <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="view_dates.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>VIEW TRAINING DATES</a></li>
           
             <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="p2f_summary.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>P2F SUMMARY TABLE</a></li>
             <!-- <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="add_p2f_summary.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>ADD MONTHLY SUMMARY</a></li>-->
               <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="upsell_analysis.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>UPSELL ANALYSIS TABLE</a></li>
               <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="ceb_report.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>CEB REPORT TABLE</a></li>
                <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="action_sheet1.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>ACTION SHEET</a></li>
             
            


            <!-- <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="refreshers.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>VIEW REFRESHERS</a></li>-->
           
            

           
          </ul>
          </li> 


       
<?php
$level = $_SESSION['agile_level'];

if($level == 1)
{

?>
  <li class="treeview">
          <a href="#">
           <i class="fa fa-folder"></i>  <span style="font-family: verdana; font-size: 13px; font-weight: normal;">TOOLS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

             <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="edit_unit.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i> VIEW BUSINESS UNIT</a></li>
           <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="edit_class.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i> VIEW PRODUCT CLASS</a></li>
            <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="edit_product.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>VIEW PRODUCTS</a></li>
             <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="view_coupon.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>VIEW COUPON</a></li>
             <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="customers.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>VIEW CUSTOMERS </a></li>
            <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="manage_resource.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>MANAGE RESOURCES</a></li>
          <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="view_rc.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>SET REFERRAL COMMISION</a></li>

           <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="edit_comp.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i> VIEW ORGANISATION</a></li>
            <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="edit_location.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>VIEW LOCATIONS</a></li>
            
            <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="other_dates.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>VIEW OTHER TRAINING DATES</a></li>
           
            <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="edit_venue.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>VIEW VENUES</a></li>
           
        <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="edit_virtual.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>VIRTUAL CLASSROOM</a></li>
           

          <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="view_class_items.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>ADD CLASS ITEMS</a></li>
    
              <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="view_pmp.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>VIEW PMP</a></li>
           
             <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="view_msp.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>VIEW MS PROJECT</a></li>
           
           

            <!-- <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="ref_date.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i> REFRESHER DATES</a></li>-->
           


           <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="gen_invoice.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>GENERATE INVOICE</a></li>
            <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="send_receipt.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>SEND RECEIPT</a></li>
            <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="confirm_transfer.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>CONFIRM TRANSFER</a></li>
             <!--<li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="update_payment.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>
             UPDATE PAYMENT</a></li>-->
              <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="feedback.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>FEEDBACKS</a></li>
          

             <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="referals.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>VIEW REFERRALS</a></li>
           <!-- <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="#" style="font-size: 12px;"><i class="fa fa-circle-o"></i> VIEW SETTLEMENTS  </a></li>-->
           
            <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="edit_admin.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i> MANAGE USERS</a></li>
          
          
           <!--<li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="add_date.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>ADD TRAINING DATES</a></li>
           
          <!-- <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="add_exam.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>ADD P2F EXAM DATES</a></li>
            <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="edit_date.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>EDIT P2F EXAM DATES</a></li>-->
          

          <!-- <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="individuals.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>VIEW APPLICANTS</a></li>-->
           
            
           <!-- <li style="font-family: verdana; font-size: 12px; font-weight: normal; text-transform: uppercase;"><a href="comments.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>Testimonial & Comments</a></li>-->
        
        <!--<li style="font-family: verdana; font-size: 12px; font-weight: normal; text-transform: uppercase;"><a href="comments.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i>Referrals via Feedback</a></li>-->
       
          </ul>
          </li> 

 
      <?php 

        }

        ?>
    


       
       
       


        <li class="header">LABELS</li>


<?php 
//$level = $_SESSION['agile_level'];

//if($level == 1)
//{

?>
        <!--  <li class="treeview">
          <a href="#">
           <i class="fa fa-folder"></i>  <span style="font-family: verdana; font-size: 13px; font-weight: normal;">ADMIN USERS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

             <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="add_admin.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i> ADD ADMIN</a></li>
            
          </ul>
          </li> 


          <?php 

        //}

        ?>

      <!-- <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="#"><i class="fa fa-circle-o text-blue"></i> <span>My Profile</span></a></li>
      <!-- <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>Add New Class</span></a></li>-->
       
       <!-- <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Settings</span></a></li>-->

        <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="#"><i class="fa fa-circle-o text-blue"></i> <span>Change Password</span></a></li>
        <li style="font-family: verdana; font-size: 12px; font-weight: normal;"><a href="signout.php"><i class="fa fa-circle-o text-red"></i> <span>Logout</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>