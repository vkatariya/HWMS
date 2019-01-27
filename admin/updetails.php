<?php session_start();
if(!isset($_SESSION['uname'])){
    header('Location:../login.php');
}

include('../db_config.php'); // Database configuration file
$sess_id=$_SESSION['uname'];
$sql = "SELECT * FROM bil_client_mw_info WHERE   username_bil= ".$sess_id." ";
$result=mysqli_query($con,$sql);
    //Check whether the query was successful or not
    if($result) {
        if(mysqli_num_rows($result) == 1) {
           $member = mysqli_fetch_assoc($result);
             }else {
        die("Query failed");
    }
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
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts -->


<?php require_once('./layouts/meta.php');?>

<?php require_once('./layouts/top_header.php');?>
    <!-- End Header Top Area -->
	
	<!-- <div class = "container">
		<div class = "row"> 
			<div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<br><img src="images/logo.png" style="align-content:center; width: 400px; height:100px;" class="center-block"> 
			<hr style="color:black;">
			<h3 style="text-align:center; font-family: Times New Roman;">Welcome Back, Mr Ashutosh Dubey</h3>
			<h3 style="text-align:center; font-family: Times New Roman;">Hamidia Hospital</h3>
			<h5 style="text-align:center; font-family: Times New Roman;">Airport Rd, Royal Market, Near, Kohefiza, Bhopal, Madhya Pradesh 462001</h5>
			<hr style="color:black;">
			<h5 style="text-align:center; font-family: Times New Roman;">BIL ID: 01259955578 &nbsp &nbsp &nbsp PCB ID: 01259955578 </h5>
			<hr style="color:black;">
			</div>
		</div>
	</div> -->
	
	
	
   <?php include_once('./layouts/menu.php'); ?>
       
   <!-- Main Menu area End-->
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
										<i class="fa fa-user"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Update Account Details</h2>
										<p>Panel to update your account details.</p>
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
                   <!--  <div class="alert-inner"> -->
                       
                        <div class="alert-list">
                        <?php  if(isset($_GET['status'])){ ?>
                        <?php  if($_GET['status'] == 'success'){ ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> 
                                <?=  $_SESSION['message']; ?>
                                </div>
                                <?php } ?>

                            <?php  if($_GET['status'] == 'error'){ ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> 
                                <?=  $_SESSION['message']; ?>
                            </div>
                            <?php } ?>
                            <?php } ?>
                            <?php if(isset($_SESSION['message'])){ unset($_SESSION['message']); } ?>
                            <?php 
                            if(isset($_SESSION['uname'])){  
                            if($_SESSION['uname'] == ''){  
                                ?> 
                                <script type="text/javascript">
                                    window.location.href = "<?= $base_url.'login.php' ?>";
                                </script>> 
                            <?php } } ?>

                            
                        </div>
                   <!--  </div> -->
                </div>
            </div>
			</div>
			<br>
	<!-- Alert area end-->

	
    <!-- Dialog area Start-->
    <div class="dialog-area">
        <div class="container">
                <form action="./update.php" method="POST" >   
                <input type="hidden" name="update_id" value="<?= $_SESSION['uname']; ?>">  
              <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="dialog-inner mg-t-30">
                        <div class="contact-hd dialog-hd" style="text-align:left;">
                            <h1>Details of Establishment</h1>
							<hr style="color:black;">
                             </div>
                          <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" >
                                <div class="nk-int-mk sl-dp-mn" style="float:left;">
                                    <p style="padding-top:10px;">Category: </p>
                                </div>
							</div>
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">							
                                <div class="bootstrap-select fm-cmp-mg" style="width:auto;">
                                    <select name="category" class="selectpicker"  style="width:auto;"  >
											<option value="Hospital"<?php if($member['category']=='Hospital'){echo 'selected';} ?>>Hospital</option>
											<option value="Blood Bank"<?php if($member['category']=='Blood Bank'){echo 'selected';} ?>>Blood Bank</option>
											<option value="Dental Clinic"<?php if($member['category']=='Dental Clinic'){echo 'selected';} ?>>Dental Clinic</option>
											<option value="Pathology Lab"<?php if($member['category']=='Pathology Lab'){echo 'selected';} ?>>Pathology Lab</option>
											<option value="Histopathology"<?php if($member['category']=='Histopathology'){echo 'selected';} ?>>Histopathology</option>
											<option value="Clinic"<?php if($member['category']=='Clinic'){echo 'selected';} ?>>Clinic</option>
											<option value="Dispensary"<?php if($member['category']=='Dispensary'){echo 'selected';} ?>>Dispensary</option>
											<option value="Veterinary Hospital"<?php if($member['category']=='Veterinary Hospital'){echo 'selected';} ?>>Veterinary Hospital</option>
											<option value="Veterinary Clinic"<?php if($member['category']=='Veterinary Clinic'){echo 'selected';} ?>>Veterinary Clinic</option>
											<option value="Others"<?php if($member['category']=='Others'){echo 'selected';} ?>>Others</option>
										</select>
                                </div>
                            </div>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="fa fa-building" style="color:grey;"></i>
                                    </div>
                                    <?php if(isset($member['organization_name'])){ ?>
                                    <div class="nk-int-st nk-toggled">
                                    <?php }else{ ?>
                                    <div class="nk-int-st">
                                    <?php } ?>
                                                                        
                                        <input type="text" name="organization" value="<?php echo $member['organization_name'];?>" class="form-control" placeholder="Organization Name">
                                        <label class="nk-label">Organization Name</label>
                                    </div>
                                </div>
                            </div>
							</div><br>
							<div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" >
                                <div class="nk-int-mk sl-dp-mn" style="float:left;">
                                    <p style="padding-top:10px;">Ownership: </p>
                                </div>
							</div>
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">							
                                <div class="bootstrap-select fm-cmp-mg" style="width:auto;">
                                    <select name="ownership"  class="selectpicker" style="width:auto;"  >
											<option value="Central Government" <?php if($member['ownership']=='Central Government'){ echo 'selected'; } ?>>Central Government</option>
											<option value="State Government"<?php if($member['ownership']=='State Government'){ echo 'selected';}?>>State Government</option>
											<option value="Public Ltd. Company"<?php if($member['ownership']=='Public Ltd. Company'){echo 'selected';}?>>Public Ltd. Company</option>
											<option value="Private Company" <?php if($member['ownership']=='Private Company'){echo 'selected';} ?>>Private Company</option>
											<option value="Partnership"<?php if($member['ownership']=='Partnership'){echo 'selected';} ?>>Partnership</option>
											<option value="Individual Owned"<?php if($member['ownership']=='Individual Owned'){echo 'selected';} ?>>Individual Owned</option>
											<option value="Others (Specify)"<?php if($member['ownership']=='Others (Specify)'){echo 'selected';} ?>>Others (Specify)</option>
										</select>
                                </div>
                            </div>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="fa fa-id-badge" style="color:grey;"></i>
                                    </div>
                       <?php if(isset($member['ownership_other'])){ ?>
                        <div class="nk-int-st nk-toggled">
                        <?php }else{ ?>
                        <div class="nk-int-st">
                        <?php } ?>

                                    <!-- <div class="nk-int-st"> -->
                                        <input type="text" name="ownership_other" value="<?php echo $member['ownership_other'];?>"  class="form-control">
                                        <label class="nk-label">Other Ownership</label>
                                    </div>
                                </div>
                            </div>
							
							</div><br>
							<div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" >
                                <div class="nk-int-mk sl-dp-mn" style="float:left;">
                                    <p style="padding-top:10px;">Date of Starting Establishment: </p>
                                </div>
							</div>
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">							
                                <div class="bootstrap-select fm-cmp-mg" style="width:auto;">
                                    <select name="dse" class="selectpicker" style="width:auto;"  >
											<option value="Already in Existence" <?php if($member['dse']=='Already in Existence'){ echo 'selected';} ?>>Already in Existence</option>
											<option value="To be started on"<?php if($member['dse']=='To be started on'){ echo 'selected';} ?>>To be started on</option>
											
										</select>
                                </div>
                            </div>
							 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-calendar"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" name="dse_date" value="<?php echo $member['dse_date'];?>"  class="form-control" data-mask="99/99/9999" placeholder="dd/mm/yyyy">
                                    </div>
                                </div>
                            </div>
							
							</div><br>
							<div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p>Name of the authorized person with designation who is authorized to do the agreement. </p>
					<div class="form-element-list mg-t-10">
                    
					
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                           <?php if(isset($member['authorized_person'])){ ?>
                                    <div class="nk-int-st nk-toggled">
                                    <?php }else{ ?>
                                    <div class="nk-int-st">
                                    <?php } ?>


                                   
                                        <input type="text" name="authorized_person" value="<?php echo $member['authorized_person'];?>"  class="form-control">
                                        <label class="nk-label">Full Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="fa fa-star-o"></i>
                                    </div>

                                 <?php if(isset($member['ap_designation'])){ ?>
                                    <div class="nk-int-st nk-toggled">
                                    <?php }else{ ?>
                                    <div class="nk-int-st">
                                    <?php } ?>

                                        <input type="text" name="ap_designation" value="<?php echo $member['ap_designation'];?>"  class="form-control">
                                        <label class="nk-label">Designation</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-phone"></i>
                                    </div>
                                     <?php if(isset($member['ap_contact'])){ ?>
                                    <div class="nk-int-st nk-toggled">
                                    <?php }else{ ?>
                                    <div class="nk-int-st">
                                    <?php } ?>
                                        <input type="text" name="ap_contact" value="<?php echo $member['ap_contact'];?>"  class="form-control">
                                        <label class="nk-label">Contact Number</label>
                                    </div>
                                </div>
                            </div>
                        </div>
						</div>
						</div>
						</div>
					    <br>
				<div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p>Number of Beds (in case of Hospital). </p>
					<div class="form-element-list mg-t-10">
                    
					
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="fa fa-bed" style="color:grey;"></i>
                                    </div>
                                    <?php if(isset($member['beds_icp'])){ ?>
                                    <div class="nk-int-st nk-toggled">
                                    <?php }else{ ?>
                                    <div class="nk-int-st">
                                    <?php } ?>
                                        <input type="number" name="beds_icp" value="<?php echo $member['beds_icp'];?>"  class="form-control">
                                        <label class="nk-label">Beds in ICU/CCU/PICU</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                           <i class="fa fa-bed" style="color:grey;"></i>
                                    </div>
                                    <?php if(isset($member['beds_other'])){ ?>
                                    <div class="nk-int-st nk-toggled">
                                    <?php }else{ ?>
                                    <div class="nk-int-st">
                                    <?php } ?>
                                        <input type="number" name="bed_other" value="<?php echo $member['beds_other'];?>"  class="form-control">
                                        <label class="nk-label">Others</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                           <i class="fa fa-bed" style="color:grey;"></i>
                                    </div>
                                     <?php if(isset($member['beds_ot'])){ ?>
                                    <div class="nk-int-st nk-toggled">
                                    <?php }else{ ?>
                                    <div class="nk-int-st">
                                    <?php } ?>
                                        <input type="number" name="n_of_ot" value="<?php echo $member['beds_ot'];?>"  class="form-control">
                                        <label class="nk-label">No. of OT</label>
                                    </div>
                                </div>
                            </div>
							 <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                          <i class="fa fa-bed" style="color:grey;"></i>
                                    </div>
                                     <?php if(isset($member['total_beds'])){ ?>
                                    <div class="nk-int-st nk-toggled">
                                    <?php }else{ ?>
                                    <div class="nk-int-st">
                                    <?php } ?>
                                        <input type="number" name="total_beds" value="<?php echo $member['total_beds'];?>"  class="form-control">
                                        <label class="nk-label">Total Beds</label>
                                    </div>
                                </div>
                            </div>
                        </div>
						</div>
						</div>
						</div>
					    <br>
									<div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p>Complete and detailed address from where Bio-Medical waste is to be collected. </p>
					<div class="form-element-list mg-t-10">
                    
					
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="" style="color:grey;"></i>
                                    </div>
                                   <?php if(isset($member['flat_no'])){ ?>
                                    <div class="nk-int-st nk-toggled">
                                    <?php }else{ ?>
                                    <div class="nk-int-st">
                                    <?php } ?>
                                        <input type="text" name="flat_no" value="<?php echo $member['flat_no'];?>"  class="form-control">
                                        <label class="nk-label">Flat/House No.</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                           <i class="" style="color:grey;"></i>
                                    </div>
                                     <?php if(isset($member['street'])){ ?>
                                    <div class="nk-int-st nk-toggled">
                                    <?php }else{ ?>
                                    <div class="nk-int-st">
                                    <?php } ?>
                                        <input type="text" name="street" value="<?php echo $member['street'];?>"  class="form-control">
                                        <label class="nk-label">Street</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                           <i class="" style="color:grey;"></i>
                                    </div>
                                     <?php if(isset($member['area'])){ ?>
                                    <div class="nk-int-st nk-toggled">
                                    <?php }else{ ?>
                                    <div class="nk-int-st">
                                    <?php } ?>
                                        <input type="text" name="area" value="<?php echo $member['area'];?>"  class="form-control">
                                        <label class="nk-label">Locality/Area</label>
                                    </div>
                                </div>
                            </div>
							 <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                          <i class="" style="color:grey;"></i>
                                    </div>
                                    <?php if(isset($member['pincode'])){ ?>
                                    <div class="nk-int-st nk-toggled">
                                    <?php }else{ ?>
                                    <div class="nk-int-st">
                                    <?php } ?>
                                        <input type="number" name="pincode" value="<?php echo $member['pincode'];?>"  class="form-control">
                                        <label class="nk-label">Pincode</label>
                                    </div>
                                </div>
                            </div>
                        </div>
						 <div class="row">
                           
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">							
                                <div class="bootstrap-select fm-cmp-mg" style="width:auto; padding-left:20px;">
                                    <select name="city" class="selectpicker" style="width:auto;"  >
											<option value="other">Select City</option>
											<option value="Bhopal"<?php if($member['city']=='Bhopal'){ echo 'selected';} ?>>Bhopal</option>
										</select>
                                </div>
                            </div>
							 <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">							
                                <div class="bootstrap-select fm-cmp-mg" style="width:auto; padding-left:20px;">
                                    <select name="district" class="selectpicker" style="width:auto;"  >
											<option value="other">Select District</option>
											<option value="Bhopal"<?php if($member['city']=='Bhopal'){ echo 'selected';} ?>>Bhopal</option>
										</select>
                                </div>
                            </div>
							 <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">							
                                <div class="bootstrap-select fm-cmp-mg" style="width:auto; padding-left:20px;">
                                    <select name="state" class="selectpicker" style="width:auto;"  >
											<option value="other">Select State</option>
											<option value="Madhya Pradesh"<?php if($member['state']=='Madhya Pradesh'){ echo 'selected';} ?>>Madhya Pradesh</option>
										</select>
                                </div>
                            </div>
							 <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">							
                                <div class="bootstrap-select fm-cmp-mg" style="width:auto; padding-left:20px;">
                                    <select name="country" class="selectpicker" style="width:auto;"  >
											<option value="Other">Select Country</option>
											<option value="India"<?php if($member['country']=='India'){ echo 'selected';} ?>>India</option>
										</select>
                                </div>
                            </div>
						</div>
						</div>
						</div>
					    <br>
										<div class="row" style="padding-left:12px;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p> Number of authorized person / persons, to whom the Bhopal Incinerators Ltd. driver will report who shall be responsible to give Bio-Medical Waste, after weighing. </p>
					<div class="form-element-list mg-t-10">
                    
					
                        <div class="row" style="padding-left:12px;">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="fa fa-user" style="color:grey;"></i>
                                    </div>
                                    <?php if(isset($member['collection_supervisor_a'])){ ?>
                                    <div class="nk-int-st nk-toggled">
                                    <?php }else{ ?>
                                    <div class="nk-int-st">
                                    <?php } ?>
                                        <input type="text" name="collection_supervisor_a" value="<?php echo $member['collection_supervisor_a'];?>"  class="form-control">
                                        <label class="nk-label">First Person Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                           <i class="fa fa-phone" style="color:grey;"></i>
                                    </div>
                                     <?php if(isset($member['cs_a_contact'])){ ?>
                                    <div class="nk-int-st nk-toggled">
                                    <?php }else{ ?>
                                    <div class="nk-int-st">
                                    <?php } ?>
                                        <input type="text" name="cs_a_contact" value="<?php echo $member['cs_a_contact'];?>"  class="form-control">
                                        <label class="nk-label">Contact Number</label>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
						   <div class="row" style="padding-left:12px;">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="fa fa-user" style="color:grey;"></i>
                                    </div>
                                    <?php if(isset($member['collection_supervisor_b'])){ ?>
                                    <div class="nk-int-st nk-toggled">
                                    <?php }else{ ?>
                                    <div class="nk-int-st">
                                    <?php } ?>
                                        <input type="text" name="collection_supervisor_b" value="<?php echo $member['collection_supervisor_b'];?>"  class="form-control">
                                        <label class="nk-label">Second Person Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                           <i class="fa fa-phone" style="color:grey;"></i>
                                    </div>
                                   <?php if(isset($member['cs_b_contact'])){ ?>
                                    <div class="nk-int-st nk-toggled">
                                    <?php }else{ ?>
                                    <div class="nk-int-st">
                                    <?php } ?>
                                        <input type="text" name="cs_b_contact" value="<?php echo $member['cs_b_contact'];?>"  class="form-control">
                                        <label class="nk-label">Contact Number</label>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
						</div>
						</div>
						</div>
					    <br>
						<div class="row" style="padding-left:12px;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p> Name, Designation & Mobile No. of supervisor to whom if any, irregularity, non co-operation etc. is to be repeated.</p>
					<div class="form-element-list mg-t-10">
                    
					
                        <div class="row" style="padding-left:12px;">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="fa fa-user" style="color:grey;"></i>
                                    </div>
                                   <?php if(isset($member['collection_incharge_a'])){ ?>
                                    <div class="nk-int-st nk-toggled">
                                    <?php }else{ ?>
                                    <div class="nk-int-st">
                                    <?php } ?>
                                   
                                        <input type="text" name="collection_incharge_a" value="<?php echo $member['collection_incharge_a']; ?>"  class="form-control">
                                        <label class="nk-label">First Person Name</label>
                                    </div>
                                </div>
                            </div>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="fa fa-star-o" style="color:grey;"></i>
                                    </div>
                                    <?php if(isset($member['ci_a_designation'])){ ?>
                                    <div class="nk-int-st nk-toggled">
                                    <?php }else{ ?>
                                    <div class="nk-int-st">
                                    <?php } ?>
                                        <input type="text" name="ci_a_designation" value="<?php echo $member['ci_a_designation']; ?>"  class="form-control">
                                        <label class="nk-label">Designation</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                           <i class="fa fa-phone" style="color:grey;"></i>
                                    </div>
                                    <?php if(isset($member['ci_a_contact'])){ ?>
                                    <div class="nk-int-st nk-toggled">
                                    <?php }else{ ?>
                                    <div class="nk-int-st">
                                    <?php } ?>
                                        <input type="text" name="ci_a_contact" value="<?php echo $member['ci_a_contact']; ?>"  class="form-control">
                                        <label class="nk-label">Contact Number</label>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
						   <div class="row" style="padding-left:12px;">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="fa fa-user" style="color:grey;"></i>
                                    </div>
                                    <?php if(isset($member['collection_incharge_b'])){ ?>
                                    <div class="nk-int-st nk-toggled">
                                    <?php }else{ ?>
                                    <div class="nk-int-st">
                                    <?php } ?>
                                        <input type="text" name="collection_incharge_b" value="<?php echo $member['collection_incharge_b']; ?>"  class="form-control">
                                        <label class="nk-label">Second Person Name</label>
                                    </div>
                                </div>
                            </div>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="fa fa-star-o" style="color:grey;"></i>
                                    </div>
                                     <?php if(isset($member['ci_b_designation'])){ ?>
                                    <div class="nk-int-st nk-toggled">
                                    <?php }else{ ?>
                                    <div class="nk-int-st">
                                    <?php } ?>
                                        <input type="text" name="ci_b_designation" value="<?php echo $member['ci_b_designation']; ?>"  class="form-control">
                                        <label class="nk-label">Designation</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                           <i class="fa fa-phone" style="color:grey;"></i>
                                    </div>
                                     <?php if(isset($member['ci_b_contact'])){ ?>
                                    <div class="nk-int-st nk-toggled">
                                    <?php }else{ ?>
                                    <div class="nk-int-st">
                                    <?php } ?>
                                        <input type="text" name="ci_b_contact" value="<?php echo $member['ci_b_contact']; ?>" class="form-control">
                                        <label class="nk-label">Contact Number</label>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
						</div>
						</div>
						</div>
					    <br>
						<hr style="color:black;">
					 <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="dialog-inner mg-t-10">
                        <div class="contact-hd dialog-hd" style="text-align:left;">
                            <h1>Instructions</h1>
							<hr style="color:black;">
                            
							
							
							<hr style="color:black;">
                        </div>
					</div>
			</div>	
			</div>
                        <div class="row" style="padding-left:20px;">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="fm-checkbox">
                                    <label style="font-weight:bold">
                                        <input type="checkbox" name="declartion_status" value="<?php echo $member['declartion_status'] ?>" class="i-checks"  <?php if($member['declartion_status']=='1'){ echo 'checked'; } ?>> <i></i> I hereby declare that all the above details are correct according to my knowledge. In case of rejection of application because of wrong details, I am responsible for this.</label>
                                </div>
                            </div>
                        </div>
						<hr style="color:black;">
                        <div class="dialog-pro11 dialog1" >
                            <button name="update"  class="btn btn-info" id="sa-params1" style=" margin:auto;display:block;width:200px;">Save and Update Details</button>
                        </div>
                    </div>
                </div>  
                
            </div>
            </form>  <!--form close -->
            </div>
        
         </div>
    
    <!-- Dialog area End-->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2019
. All rights reserved.<a href="https://www.bhopalincinerators.com">Bhopal Incinerators</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->
    <!-- jquery
        ============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
        ============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
        ============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sparkline JS
        ============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
        ============================================ -->
    <script src="js/flot/jquery.flot.js"></script>
    <script src="js/flot/jquery.flot.resize.js"></script>
    <script src="js/flot/flot-active.js"></script>
    <!-- knob JS
        ============================================ -->
    <script src="js/knob/jquery.knob.js"></script>
    <script src="js/knob/jquery.appear.js"></script>
    <script src="js/knob/knob-active.js"></script>
    <!--  wave JS
        ============================================ -->
    <script src="js/wave/waves.min.js"></script>
    <script src="js/wave/wave-active.js"></script>
    <!--  Chat JS
        ============================================ -->
    <script src="js/dialog/sweetalert2.min.js"></script>
    <script src="js/dialog/dialog-active.js"></script>
    <!--  Chat JS
        ============================================ -->
    <script src="js/chat/jquery.chat.js"></script>
    <!--  todo JS
        ============================================ -->
    <script src="js/todo/jquery.todo.js"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="js/main.js"></script>
    <!-- tawk chat JS
        ============================================ -->
    <script src="js/tawk-chat.js"></script>
     <!-- bootstrap select JS
        ============================================ -->
    <script src="js/bootstrap-select/bootstrap-select.js"></script>
</body>

</html>