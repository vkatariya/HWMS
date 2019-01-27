<?php  session_start();?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->


<!-- Mirrored from webdesign-finder.com/html/gogreen/admin_signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Nov 2018 10:19:54 GMT -->
<head>
	<title>Bhopal Incinerators Ltd.</title>
	<meta charset="utf-8">
	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<![endif]-->
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animations.css">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="css/main.css" class="color-switcher-link">
	<link rel="stylesheet" href="css/dashboard.css" class="color-switcher-link">
	<script src="js/vendor/modernizr-2.6.2.min.js"></script>

	<!--[if lt IE 9]>
		<script src="js/vendor/html5shiv.min.js"></script>
		<script src="js/vendor/respond.min.js"></script>
		<script src="js/vendor/jquery-1.12.4.min.js"></script>
	<![endif]-->

</head>

<body class="admin">
	<!--[if lt IE 9]>
		<div class="bg-danger text-center">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" class="highlight">upgrade your browser</a> to improve your experience.</div>
	<![endif]-->

	<div class="preloader">
		<div class="preloader_image"></div>
	</div>

	<!-- search modal -->
	<div class="modal" tabindex="-1" role="dialog" aria-labelledby="search_modal" id="search_modal">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">
				<i class="rt-icon2-cross2"></i>
			</span>
		</button>
		<div class="widget widget_search">
			<form method="get" class="searchform search-form form-inline" action="http://webdesign-finder.com/html/gogreen/">
				<div class="form-group">
					<input type="text" value="" name="search" class="form-control" placeholder="Search keyword" id="modal-search-input">
				</div>
				<button type="submit" class="theme_button">Search</button>
			</form>
		</div>
	</div>

	<!-- Unyson messages modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="messages_modal">
		<div class="fw-messages-wrap ls with_padding">
			<!-- Uncomment this UL with LI to show messages in modal popup to your user: -->
			<!--
		<ul class="list-unstyled">
			<li>Message To User</li>
		</ul>
		-->

		</div>
	</div>
	<!-- eof .modal -->

	<!-- Unyson messages modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="admin_contact_modal">
		<!-- <div class="ls with_padding"> -->
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<form class="with_padding contact-form" method="post" action="">
					<div class="row">
						<div class="col-sm-12">
							<h3>Contact Admin</h3>
							<div class="contact-form-name">
								<label for="name">Full Name
									<span class="required">*</span>
								</label>
								<input type="text" aria-required="true" size="30" value="" name="name" id="name" class="form-control" placeholder="Full Name">
							</div>
						</div>
						<div class="col-sm-12">
							<div class="contact-form-subject">
								<label for="subject">Subject
									<span class="required">*</span>
								</label>
								<input type="text" aria-required="true" size="30" value="" name="subject" id="subject" class="form-control" placeholder="Subject">
							</div>
						</div>

						<div class="col-sm-12">

							<div class="contact-form-message">
								<label for="message">Message</label>
								<textarea aria-required="true" rows="6" cols="45" name="message" id="message" class="form-control" placeholder="Message"></textarea>
							</div>
						</div>

						<div class="col-sm-12 text-center">
							<div class="contact-form-submit">
								<button type="submit" id="contact_form_submit" name="contact_submit" class="theme_button wide_button color1">Send Message</button>
								<button type="reset" id="contact_form_reset" name="contact_reset" class="theme_button wide_button">Clear Form</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- eof .modal -->

	<!-- wrappers for visual page editor and boxed version of template -->
	<div id="canvas">
		<div id="box_wrapper">

			<!-- template sections -->

			<section class="page_topline cs two_color section_padding_top_5 section_padding_bottom_5 table_section">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-6 text-center text-sm-left">
							<p class="divided-content">
					<span class="medium black">
						Welcome to Bhopal Incinerators Ltd.
					</span>
					<a href="contact.html">How to Find Us</a>
					
				</p>
						</div>
						<div class="col-sm-6 text-center text-sm-right">
                          <!--  <div class="header_right_buttons display_table_cell text-right hidden-xs align-right">
								<div class="darklinks">
									<a href="#" class="social-icon border-icon rounded-icon soc-facebook"></a>
									<a href="#" class="social-icon border-icon rounded-icon soc-twitter"></a>
									<a href="#" class="social-icon border-icon rounded-icon soc-google"></a>
								</div>
							</div>  -->
							

						</div>
					</div>
				</div>
			</section>

			<header class="page_header header_white toggler_xs_right section_padding_20">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12 display_table">
							<div class="header_left_logo display_table_cell">
								<a href="index.html" class="logo top_logo" >
									<img src="images/Logo.jpg" alt="" >
									<span class="logo_text">
										<span class="big">Bhopal Incinerators Ltd.</span>
										
									</span>
								</a>
							</div>

									<div class="header_mainmenu display_table_cell text-center">
								<!-- main nav start -->
								<nav class="mainmenu_wrapper">
									<ul class="mainmenu nav sf-menu">
										<li class="">
											<a href="index.html">Home</a>
										</li>
										<li class="">
											<a href="about.html">About</a>
										</li>
										<li class="">
											<a href="services.html">Services</a>
											<ul>
												<li>
													<a href="index-2.html">Service1</a>
												</li>
											</ul>
										</li>
										<li class="">
											<a href="projects.html">Projects</a>
											<ul>
												<li>
													<a href="index-2.html">project1</a>
												</li>
											</ul>
										</li>
										<li class="">
											<a href="csr.html">CSR</a>
											
										</li>
										<li class="">
											<a href="blog.html">Blog</a>
										</li>
										<li class="">
											<a href="career.html">Career</a>
											
										</li>
										<li class="active">
											<a href="services.html">Contact us</a>
											
										</li>
									</ul>
								</nav>
								<!-- eof main nav -->
								<!-- header toggler -->
								<span class="toggle_menu">
									<span></span>
								</span>
							</div>

							<div class="header_right_buttons display_table_cell text-right hidden-xs">
								<div class="darklinks">
									<a href="#" class="social-icon border-icon rounded-icon soc-facebook"></a>
									<a href="#" class="social-icon border-icon rounded-icon soc-twitter"></a>
									</div>
							</div>
						</div>
					</div>
					<hr style="
  margin-top: 0.5em;
  margin-bottom: 0.5em;
  margin-left: auto;
  margin-right: auto;
  border-style: inset;
  border-width: 1px;">
				</div>
			</header>

	
	
	
	<!-- wrappers for visual page editor and boxed version of template -->
	<div id="canvas">
		<div id="box_wrapper">

			<!-- template sections -->
			<section class="ls section_padding_top_20 section_padding_bottom_20 ">
				<div class="container">
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 to_animate">
							<div class="with_border with_padding">

								<h4 class="text-center">
									Sign In to Your Account
								</h4>
								<?php 
                              
                                if (isset($_SESSION['errormsg']))
									{ 
									 ?>
									<div id='alert error'><div class=' alert alert-dismissible alert-block  alert-danger fade in center error'><?php echo   $_SESSION['errormsg']; ?></div></div>
								<?php	unset($_SESSION['errormsg']); 
									}
									                         
								 ?>
								 <script type="text/javascript">
								 	$("#error").show();
                                 setTimeout(function() { $("#error").hide(); }, 5000);
								 </script>
								<hr class="bottommargin_30">
								<div class="wrap-forms">
									<form action="loginVerify.php" method="post">										<div class="row">
                                              
											<div class="col-sm-12">
												<div class="form-group has-placeholder">
													<label for="login-email"> Enter Email/UserID</label>
													<i class="grey fa fa-envelope-o"></i>
													<input type="text" class="form-control" id="login-email email"  name="email"  placeholder="Email/UserID">
												</div>

											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group has-placeholder">
													<label for="login-password">Password</label>
													<i class="grey fa fa-pencil-square-o"></i>
													<input type="password" class="form-control" name="password" id="login-password password"  placeholder="Password">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<div class="checkbox">
													<input type="checkbox" name="remember" id="remember_me_checkbox remember">
													<label for="remember_me_checkbox">Rememrber Me
													</label>
												</div>
											</div>
										</div>
										<input type="submit" name="hcf_submit"value="Log In as HCF"   class="theme_button block_button color2">
										<input type="submit"  name="PCB_submit" value="Log In as PCB" class="theme_button block_button color2">
										<input type="submit" name="BIL_submit" value="Log In as BIL" class="theme_button block_button color2">
									</form>
								</div>

								<div class="darklinks text-center topmargin_20">

									<a role="button" data-toggle="collapse"  href="#signin-resend-password" aria-expanded="false" aria-controls="signin-resend-password">
							Forgot your password?
						</a>

								</div>
								<div class="collapse form-inline-button" id="signin-resend-password">
									<form class="form-inline topmargin_20" action="forgetMailVerify.php" method="get">
										<div class="form-group">
											<label class="sr-only">Enter your e-mail</label>
											<input type="email" name="email" class="form-control" required placeholder="E-mail">
										</div>

										<button type="submit" name="forgetPassword"  class="theme_button with_icon"  required>
											<i class="fa fa-share"></i>
										</button>
									</form>
								</div>


							</div>
							<!-- .with_border -->

							<p class="divider_20 text-center">
					Not registered? <a href="admin_signup.html">Create an account</a>.<br>
					or go <a href="index.html">Home</a>
				</p>

						</div>
						<!-- .col-* -->
					</div>
					<!-- .row -->
				</div>
				<!-- .container -->
			</section>
		</div>
		<!-- eof #box_wrapper -->
	</div>
	<!-- eof #canvas -->


	<section class="ls page_copyright section_padding_15">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<p class="small-text small-spacing grey">&copy; Copyright 2018. Bhopal Incinerators Ltd. All Rights Reserved</p>
						</div>
					</div>
				</div>
			</section>

		</div>
		<!-- eof #box_wrapper -->
	</div>


	
 <script>
if ($('#remember').attr('checked')) {
var username = $('#email').attr("value");
var password = $('#password').attr("value");
// set cookies to expire in 14 days
$.cookie('email', email, { expires: 14 });
$.cookie('password', password, { expires: 14 });
$.cookie('remember', true, { expires: 14 });
} else {
// reset cookies
$.cookie('email', null);
$.cookie('password', null);
$.cookie('remember', null);
}

var remember = $.cookie('remember');
if ( remember == 'true' ) {
var email = $.cookie('email');
var password = $.cookie('password');
// autofill the fields
$('#email').attr("value", email);
$('#password').attr("value", password);
}

</script>
	<!-- template init -->
	<script src="js/compressed.js"></script>
	<script src="js/main.js"></script>

	<!-- dashboard libs -->

	<!-- events calendar -->
	<script src="js/admin/moment.min.js"></script>
	<script src="js/admin/fullcalendar.min.js"></script>
	<!-- range picker -->
	<script src="js/admin/daterangepicker.js"></script>

	<!-- charts -->
	<script src="js/admin/Chart.bundle.min.js"></script>
	<!-- vector map -->
	<script src="js/admin/jquery-jvectormap-2.0.3.min.js"></script>
	<script src="js/admin/jquery-jvectormap-world-mill.js"></script>
	<!-- small charts -->
	<script src="js/admin/jquery.sparkline.min.js"></script>

	<!-- dashboard init -->
	<script src="js/admin.js"></script>
	<script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"/>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" />


</body>


<!-- Mirrored from webdesign-finder.com/html/gogreen/admin_signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Nov 2018 10:19:54 GMT -->
</html>