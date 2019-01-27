<?php session_start();
//Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location:../login.php');
}
 include('../db_config.php'); // Database configuration file
$sess_id=$_SESSION['uname'];
$sql = "SELECT * FROM bil_client_mw_info WHERE   username_bil= ".$sess_id." ";
$result=mysqli_query($con,$sql);
    //Check whether the query was successful or not
    if($result) {
//              if(mysqli_num_rows($result) == 1) {
            //Login Successful
           // session_regenerate_id();
            $member = mysqli_fetch_assoc($result);
             }else {
        die("Query failed");
    }
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Client Admin | Bhopal Incinerators</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include_once('./layouts/meta.php'); ?>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
 <?php require_once('./layouts/top_header.php');?>
    <!-- End Header Top Area -->
	
	
	
	
	
    <!-- Mobile Menu start -->
    <!-- //menu -->
    <?php include_once('./layouts/menu.php'); ?>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    
    <!-- Main Menu area End-->
    <!-- Start Status area -->
    <!-- Breadcomb area Start-->
	<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="notika-icon notika-star"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Dashboard</h2>
										<p>Welcome to Bhopal Incinerators 
                                           <?php if (isset($_SESSION['successmsg']))
                                    { 
                                     echo   $_SESSION['successmsg']; 
                                     unset($_SESSION['successmsg']); 
                                    }
                                                             
                                 ?> 
											<span class="bread-ntd">Client Admin Dashboard</span></p>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Breadcomb area End-->
	<!-- Alert area start-->
	    


               <div class="container">
               <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="alert-inner">
                       
                        <div class="alert-list">
                          <?php     
                           $sql = "SELECT * FROM bil_client_mw_notify WHERE username_bil=".$sess_id." ORDER BY notification_date DESC LIMIT 1   ";  
                             $result = mysqli_query($con, $sql);  
                             while($row = mysqli_fetch_array($result))  
                             { 
                              $notification= $row['notification_category'];
                              $desc = $row['notice_title'];

                                switch ($notification) { 
                                    case "1": ?>
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">
                                    <i class="notika-icon notika-close"></i></span></button> 
                           <?php     if (strlen($desc) > 50) {
                            $trimstring = substr($desc, 0, 50);
                         } else {
                            $trimstring = $desc;
                            }
                            echo $trimstring; ?>
                            <a href="Notifications.php" class="alert-link">.Read full details click here...</a>
                                 </div>  <?php
                                    break;
                                    case "2": ?>

                                <div class="alert alert-info alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                                <?php     if (strlen($desc) > 50) {
                            $trimstring = substr($desc, 0, 50);
                         } else {
                            $trimstring = $desc;
                            }
                            echo $trimstring; ?> <a href="Notifications.php" class="alert-link">Read More..</a>
                                     </div>
                                       <?php 
                                        break;
                                    case "3": ?>  
                                   <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> <?php     if (strlen($desc) > 50) {
                            $trimstring = substr($desc, 0, 50);
                         } else {
                            $trimstring = $desc;
                            }
                            echo $trimstring; ?> <a href="Notifications.php" class="alert-link">Read More..</a>
                            </div>
                                    <?php
                                  break;
                                         case "4": ?>  
                              <div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>  <?php     if (strlen($desc) > 50) {
                            $trimstring = substr($desc, 0, 50);
                         } else {
                            $trimstring = $desc;
                            }
                            echo $trimstring; ?> <a href="Notifications.php" class="alert-link">Read More..</a> 
                            </div> 

                                    <?php
                                       
                                        break;
                                    default:
                                        echo "No Notification!";
                                }
                                  }
                         ?>
                           
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <br>
	<!-- Alert area end-->	
	<!-- Status area start-->
	  <div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="fa fa-shopping-bag" style="color:red;"></i>
									</div>
									<div class="breadcomb-ctn">
										<?php 
                                         $sql = "SELECT COUNT(bag_color) as bag_total FROM bil_client_mw_report_hcf WHERE username_bil=".$sess_id." ";  
                             $result = mysqli_query($con, $sql);  
                             while($row = mysqli_fetch_array($result))  
                             { 
										?>
										<h2><?php echo $row['bag_total']; ?></h2>
									<?php } ?>
										<p>Total Bags Collected </p>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="fa fa-snowflake-o" style="color:red;"></i>
									</div>
									<div class="breadcomb-ctn">
										<?php 
                                         $sql = "SELECT * FROM bil_client_mw_payment WHERE username_bil=".$sess_id." ORDER BY vehicle_status DESC LIMIT 1   ";  
                             $result = mysqli_query($con, $sql);  
                             while($row = mysqli_fetch_array($result))  
                             {  ?>
										<h2><?php echo $row['vehicle_status']; ?></h2>
									<?php } ?>
										
										<p>Service/Vehicle Status </p>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="fa fa-check" style="color:green;"></i>
									</div>
									<div class="breadcomb-ctn">
										<?php 
                                         $sql = "SELECT * FROM bil_client_mw_payment WHERE username_bil=".$sess_id." ORDER BY payment_status DESC LIMIT 1   ";  
                             $result = mysqli_query($con, $sql);  
                             while($row = mysqli_fetch_array($result))  
                             {  ?>
										<h2><?php echo $row['payment_status']; ?></h2>
									<?php } ?>
										
										<p>Payment Status </p>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="fa fa-clock-o" style="color:orange;"></i>
									</div>
									<div class="breadcomb-ctn">
									 <?php  $timestamp = date("d-M-Y "); ?>

									 	<h2><?php  echo $timestamp; ?></h2>
										<p> Today's Date </p>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Status area end-->
	<!-- Dashboard profile start-->
	
	<div class="breadcomb-area">
		<div class="container">
			<div class="row">						
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
					
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="breadcomb-wp">
									
									<div class="breadcomb-ctn">
										<h2>Client Information</h2> 
										<p>Complete information about client. You can edit it from profile tab.</span></p>
										<hr style="color:black;">
										<h4 style="Color:green;" >Details of the Establishment</h4> <br>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										<p><span style="font-weight:bold; ">1. Category: </span> </p><br>
                                        <p><span style="font-weight:bold;  ">2. Ownership: </span> </p><br>
										<p><span style="font-weight:bold;  ">3. Date of Starting Establishment: </span>  </p><br>
										
                                      
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										<p> <span style="text-align:left;"> <?php echo $member['category'];  ?> </span></p><br>
                                        <p><span style="text-align:left;"> <?php echo $member['ownership'];  ?> </span></p><br>
										<p><span style="text-align:left;"> <?php echo $member['dse'];  ?><?php echo $member['dse_date'];  ?></span></p><br>
                                      
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<p><span style="font-weight:bold; ">4. Name of authorized person with designation who is authorized to do the agreement. </span> </p><br>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										 <p><span style="font-weight:bold; ">Name: </span>  </p>   <br>
                                        <p><span style="font-weight:bold; ">Designation:  </span></p>   <br>
                                        <p><span style="font-weight:bold; ">Contact No.: </span>  </p>   <br>
                                               
                                      
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										 <p style="text-align:left;"> <?php echo $member['authorized_person'];  ?> </p>   <br>
                                        <p style="text-align:left;"> <?php echo $member['ap_designation'];  ?> </p>   <br>
                                        <p style="text-align:left;"> <?php echo $member['ap_contact'];  ?> </p>   <br>
                                               
                                      
										</div>
									                                  
									   </div>
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<p><span style="font-weight:bold; ">5. Number of Beds (in case of hospital)</span> </p><br>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										 <p><span style="font-weight:bold; ">Beds in ICU / CCU / PICU: </span>  </p>   <br>
                                        <p><span style="font-weight:bold; ">Others:  </span></p>   <br>
                                        <p><span style="font-weight:bold; ">Number of OT: </span>  </p>   <br>
                                        <p><span style="font-weight:bold; ">Total Beds: </span>  </p>   <br>
                                               
                                      
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										 <p style="text-align:left;"><?php echo $member['beds_icp'];  ?> </p>   <br>
                                        <p style="text-align:left;"> <?php echo $member['beds_other'];  ?> </p>   <br>
                                        <p style="text-align:left;"> <?php echo $member['beds_ot'];  ?></p>   <br>
                                        <p style="text-align:left;"> <?php echo $member['total_beds'];  ?> </p>   <br>  <br> <br> <br>  <br>
                                     
										</div>
										</div>
										
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="breadcomb-wp">
									
									<div class="breadcomb-ctn">
										<hr style="color:black;">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<p><span style="font-weight:bold; ">6. Complete and detailed address from where bio-medical waste is collected.</span> </p><br>
                                        <p><?php echo $member['street']; ?>,<?php echo $member['area']; ?>,<?php echo $member['city']; ?>,<?php echo $member['district']; ?>,<?php echo $member['state']; ?>,<?php echo $member['country']; ?>,<?php echo $member['pincode']; ?></p><br>
                                         </div>
										
										<div class="col-lg-12 col,-md-12 col-sm-12 col-xs-12">
										<p><span style="font-weight:bold; ">7. Number of authorized person / persons, to whom the Bhopal Incinerators Ltd. driver will report who shall be responsible to give Bio-Medical Waste, after weighing.</span> </p><br>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										 <p><span style="font-weight:bold; ">First Person: </span>  </p>   <br>
                                        <p><span style="font-weight:bold; ">Mob. No.:  </span></p>   <br>
                                        <p><span style="font-weight:bold; ">Second Person: </span>  </p>   <br>
                                        <p><span style="font-weight:bold; ">Mob. No.: </span>  </p>   <br>
                                               
                                      
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										 <p style="text-align:left;"> <?php echo $member['collection_supervisor_a'];  ?> </p>   <br>
                                        <p style="text-align:left;"> <?php echo $member['cs_a_contact'];  ?> </p>   <br>
                                        <p style="text-align:left;"> <?php echo $member['collection_supervisor_b'];  ?></p>   <br>
                                        <p style="text-align:left;"> <?php echo $member['cs_b_contact'];  ?> </p>   <br>
                                               
                                      
										</div>
										
									  

										</div>
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<p><span style="font-weight:bold; ">8. Name, Designation & Mobile No. of supervisor to whom if any, irregularity, non co-operation etc. is to be repeated. </span> </p><br>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										 <p><span style="font-weight:bold; ">First Person: </span>  </p>   <br>
                                         <p><span style="font-weight:bold; ">Designation: </span>  </p>   <br>
                                                                              
									   <p><span style="font-weight:bold; ">Mob. No.:  </span></p>   <br>
                                        <p><span style="font-weight:bold; ">Second Person: </span>  </p>   <br>
										<p><span style="font-weight:bold; ">Designation: </span>  </p>   <br>
                                        <p><span style="font-weight:bold; ">Mob. No.: </span>  </p>   <br>
                                               
                                      
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										 <p style="text-align:left;"> <?php echo $member['collection_incharge_a'];  ?> </p>   <br>
										 <p style="text-align:left;"> <?php echo $member['ci_a_designation'];  ?> </p>   <br>
                                        <p style="text-align:left;"> <?php echo $member['ci_a_contact'];  ?></p>   <br>
                                        <p style="text-align:left;"> <?php echo $member['collection_incharge_b'];  ?></p>   <br>
										<p style="text-align:left;"> <?php echo $member['ci_b_designation'];  ?></p>   <br>
                                        <p style="text-align:left;"><?php echo $member['ci_b_contact'];  ?> </p>   <br>
                                               
                                      
										</div>
										</div>
										<hr style="color:black;">
									   <a class="btn btn-primary notika-btn-primary" name="update_profile" href="updetails.php" style="float:right;">Update Profile </a>

										</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			
			
			
		</div>
	</div>
	
	<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="fa fa-money"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Subsciption Plans</h2>
										<p>Check our subscription plans for your payment calculations.</span></p>
										<hr style="color:black;">
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="fa fa-volume-control-phone"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Contact BPL</h2>
										<p>Contact us if you have any query.</span></p>
										<hr style="color:black;">
									<div class="contact-inner">
                        
                        <div class="contact-dt">
                            <ul class="contact-list widget-contact-list">
                                <li><i class="notika-icon notika-phone"></i> +8801962067309</li>
                                <li><i class="notika-icon notika-mail"></i> lucid@gmail.com</li>
                                <li><i class="notika-icon notika-facebook"></i> facebook</li>
                                <li><i class="notika-icon notika-twitter"></i> @lucid twitter</li>
                                <li><i class="notika-icon notika-map"></i> 44-46 uttara Road, Bangladesh</li>
                            </ul>
                        </div>
                        
                    </div>
									
									</div>
									
								</div>
							</div>
							
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- Dashboard profile start-->
    <!-- Start Footer area-->
<?php require_once('./layouts/footer.php');?>
</body>

</html>