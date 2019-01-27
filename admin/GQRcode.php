<?php session_start(); 
if(!isset($_SESSION['uname'])){
    header('Location:../login.php');
}
include('../db_config.php');
$sess_id=$_SESSION['uname'];
$sql = "SELECT * FROM bil_client_mw_info WHERE   username_bil= ".$sess_id." ";
$sql1 = "SELECT * FROM bil_client_mw_generate_qrcode WHERE generate_date = '".date('Y-m-d')."' AND username_bil= ".$sess_id." ";
$result1=mysqli_query($con,$sql1);
$result=mysqli_query($con,$sql);
$flag = mysqli_num_rows($result1);
// echo $sql1;
// echo $flag;
// die;
    //Check whether the query was successful or not
    if($result) {
                      $member = mysqli_fetch_assoc($result);
             }else {
        die("Query failed");
    }

//echo $member['organization_name'];
//die();

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
    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font awesome CSS
        ============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- meanmenu CSS
        ============================================ -->
    <link rel="stylesheet" href="css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- Notika icon CSS
        ============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
    <!-- wave CSS
        ============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
    <!-- dialog CSS
        ============================================ -->
    <link rel="stylesheet" href="css/dialog/sweetalert2.min.css">
    <link rel="stylesheet" href="css/dialog/dialog.css">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="style.css">
<!-- bootstrap select CSS
        ============================================ -->
    <link rel="stylesheet" href="css/bootstrap-select/bootstrap-select.css"> 
 <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
        ============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>


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
										<i class="fa fa-qrcode"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Generate QR Codes</h2>
										<p>Generate and print QR Codes to paste them on bags.</p>
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
	
    <!-- Dialog area Start-->
    <div class="dialog-area">
        <div class="container">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="dialog-inner mg-t-30">
                        <div class="contact-hd dialog-hd" style="text-align:center;">
                            <h2>Generate QR Codes</h2>
							<?php  $timestamp = date("d-M-Y "); ?>
                            <h5 style="color:red;">Today's Date:<?php
    echo  $timestamp; ?></h5>
                            <p style="color:red;">You can only generate QR codes once a day. For security purpose save it in pdf format. <p>
                        </div>
<!-- <form id="myForm" onsubmit="return myForm(this);" method="POST"> -->
<form target="_blank" id="myForm" action="generateQRCode.php" method="POST">
    <div class="row">    
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="padding-top:10px;">
            <p>Yellow Bags:</p>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <center>
                <div class="">
                    <div class="nk-int-mk sl-dp-mn">
                    </div>
                    <div class="bootstrap-select fm-cmp-mg">
                        <select name="yellow" class="selectpicker">
                            <option value="0" selected="" >Select</option>
                        	<option value="1">1</option>
                        	<option value="2">2</option>
                        	<option value="3">3</option>	
                        </select>
                    </div>
                </div>
            </center>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="padding-top:10px;">
            <p>Blue Bags:</p>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <center>
                <div class="" >
                    <div class="nk-int-mk sl-dp-mn">
                    </div>
                    <div class="bootstrap-select fm-cmp-mg">
                        <select name="blue" class="selectpicker">
                            <option value="0" selected="">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="1">3</option>
                        </select>
                    </div>
                </div>
            </center>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="padding-top:10px;">
            <p>Red Bags:</p>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <center>
                <div class="" >
                    <div class="nk-int-mk sl-dp-mn">
                    </div>
                    <div class="bootstrap-select fm-cmp-mg">
                        <select name="red" class="selectpicker">
                            <option value="0" selected="">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>
            </center>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="padding-top:10px;">
            <p>White Bags:</p>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <center>
                <div class="">
                    <div class="nk-int-mk sl-dp-mn">
                    </div>
                    <div class="bootstrap-select fm-cmp-mg">
                        <select name="white" class="selectpicker">
                            <option value="0" selected="">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>
            </center>
        </div>
    </div>
    <div class="dialog-pro dialog" >
        
<button type="submit" <?php if($flag){echo 'disabled'; } ?> class="btn btn-info" id="sa-params22" style=" margin:auto;display:block;width:200px;">Generate Now</button>
        
        
    </div>
</form>
							<br>

                    </div>
                </div>  
                
            </div>
            
            </div>
        </div>
    
    <!-- Dialog area End-->
    <!-- Start Footer area-->
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

<script type="text/javascript">
    $('#sa-params22').click(function(){
        //alert();
$(this).prop('disabled',true);
$('#myForm').submit();
    });
    function myForm1(obj){
        alert('inside');
        $.ajax({
            url: 'generateQRCode.php',
            type: 'POST',
            data: $(obj).serialize(),
            beforeSend:function(){
alert('before');
            },
            success:function(result){
alert('success');
console.log(result);
            }
        });
        
        return false;
    }
</script>