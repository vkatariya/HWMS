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
                                        <i class="notika-icon notika-mail"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>Notifications</h2>
                                        <p>Check all notifications and messages.</p>
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
   <!-- Main Menu area End-->
	
    <!-- Dialog area Start-->
  <!--   <div class="dialog-area class="b" "> -->
        <div class="container">
            <?php $sql = "SELECT * FROM bil_client_mw_notify WHERE username_bil=".$sess_id." ORDER BY notification_date DESC  ";  
                             $result = mysqli_query($con, $sql);  
                             while($row = mysqli_fetch_array($result))  
                             { 
                              $notification= $row['notification_category'];
                           ?>
            <div class="row">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="dialog-inner sm-res-mg-t-30">
                       

                        <div class="contact-hd dialog-hd">
                            <h2><?php echo ucfirst($row['notice_title']);?></h2>
                            <p style="color:red">Dated: <?php echo $row['notification_date']; ?> Published By <?php echo   $notification= $row['issued_by'];?></p>
                        </div>
                        <!-- <div class="dialog-pro dialog">
                            <button class="btn btn-info" id="sa-title">Read Full..</button>
                        </div> -->
                       <!--  <?php     if (strlen($desc) > 50) {
                            $trimstring = substr($desc, 0, 50);
                         } else {
                            $trimstring = $desc;
                            }
                            echo $trimstring; ?>  -->
                        <button   class="btn btn-success show_hide " data-content="toggle-text">Read full</button>                     
                         <div class="content justify-content-lg-center"><br><?php echo $row['description']; ?></div><br><br><hr>

                     
                    </div>
              
                </div>
            </div>
              <?php } ?>
            </div>
       <!--  </div>
     -->
    <!-- Dialog area End-->
    <!-- Start Footer area-->
     <!-- Start Footer area-->
    <?php require_once('./layouts/footer.php');?>
</body>
</html>
<script type="text/javascript">
    
    
    $(document).ready(function () {
    $(".content").hide();
    $(".show_hide").on("click", function () {
        var txt = $(".content").is(':visible') ? 'Read More' : 'Read Less';
        $(".show_hide").text(txt);
        $(this).next('.content').slideToggle(200);
    });
});
</script>