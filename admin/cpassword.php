<?php session_start(); 
if(!isset($_SESSION['uname'])){
    header('Location:../login.php');
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



<?php 
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
  
  //  code for get data and  change client password 

  if(isset($_POST['changePassword']))
      {
    //  print_r($_POST['changePassword']);

   // die();
       // $username = $_POST['currentPassword'];
        $password = $_POST['currentPassword'];
        $newpassword = $_POST['newPassword'];
        $confirmnewpassword = $_POST['ConfirmNewPassword'];
    }
if (count($_POST) > 0) {
    $result = mysqli_query($con, "SELECT * from bil_client_mw_info WHERE username_bil='" . $_SESSION["uname"] . "'");
    $row = mysqli_fetch_array($result);
    if ($_POST["currentPassword"] == $row["password"]) {
        mysqli_query($con,"UPDATE bil_client_mw_info set password='" . $_POST["newPassword"] . "' WHERE username_bil='" . $_SESSION["uname"] . "'");

        $success  = "You are password change Successfully !";
        $failed   = "Password doesn't match !";

         $_SESSION["successmsg"]=$success;
          //echo $success;
          header('Location: cpassword.php');
           exit();
         return true;

    } else
    $failed   = "Password doesn't match !";
        $_SESSION["errormsg"]=$failed;
       header('Location: cpassword.php');
      // echo "login fail";
       exit();
        return false;
}
?>

<?php require_once('./layouts/top_header.php');?>
    <!-- End Header Top Area -->
    
  <!--   <div class = "container">
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
    </div>
     -->
    
    
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
										<i class="fa fa-key"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Change Account Password</h2>
										<p>Panel to change your account password.</p>
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
                            <?php  
                              if(isset($_GET['status'])){ 
                         if($_GET['status'] == 'success'){ ?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> 
                                <?=  $_SESSION['message']; ?>
                                </div>
                                <?php } ?>
                            </div>
                           <!--  <div class="alert alert-info alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> Heads up! This <a href="" class="alert-link">alert needs your attention</a>,
                                but it's not super important.
                            </div> -->
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> 
                                 <?=  $_SESSION['message']; ?>
                            </div>
                            <?php // } ?>
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
                            <!-- <div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> Oh snap! <a href="" class="alert-link">Change a few things up</a>                                <?php  // echo $_SESSION['successmsg'];  ?>
                            </div> -->
                       <!--  </div> -->
                    </div>
                </div>
            </div>
			</div>
			<br>
	<!-- Alert area end-->

	
    <!-- Dialog area Start-->
    <div class="dialog-area">
        <div class="container">
                       <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-example-wrap mg-t-30">
                        <div class="cmp-tb-hd cmp-int-hd">
                       
                        </div>

                        <form action="cpassword.php" method="post">
                       <!--  <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">User email </label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" name="user"  class="form-control input-sm" placeholder="Enter user id">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->


                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"> Current Password</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" name="currentPassword" id="password" onkeyup="checkpassword();" class="form-control input-sm" placeholder="Current Password">

                                        </div>
                                         <span id="password_status"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"> New Password</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" name="newPassword" id="newPassword" class="form-control input-sm" placeholder="New Password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Confirm New Password</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" name="ConfirmNewPassword" id="ConfirmNewPassword"   class="form-control input-sm" placeholder="Confirm New Password">
                                        </div>
                                    <!--  <div class="registrationFormAlert" id="divCheckPasswordMatch"> -->
                                        <span id='message'></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="form-example-int mg-t-15">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <button type="submit"  name="changePassword" class="btn btn-success" >Change Password</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    


    <!-- Dialog area End-->
    <!-- Start Footer area-->
    <?php require_once('./layouts/footer.php');?>
</body>


<script type="text/javascript">

$('#newPassword, #ConfirmNewPassword').on('keyup', function () {
    //alert();
    if ($('#newPassword').val() == $('#ConfirmNewPassword').val()) {
        $('#message').html('Your Password is Matching !').css('color', 'green');
    } else 
        $('#message').html('Password do Not Matching !').css('color', 'red');
});


  function checkpassword()
{
 var name=document.getElementById( "password" ).value;
    
 if(name)
 {
  $.ajax({
  type: 'post',
  url: 'cpassword1.php',
  data: {
   user_name:name,
  },
  success: function (response) {
   $( '#password_status' ).html(response);
   if(response=="OK")   
   {
    return true;    
   }
   else
   {
    return false;   
   }
  }
  });
 }

}

function checkall()
{
 var passwordhtml=document.getElementById("password_status").innerHTML;
 
 if((passwordhtml )=="OK")
 {
  return true;
 }
 else
 {
  return false;
 }
}

 </script>

</html>

