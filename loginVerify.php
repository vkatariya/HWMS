<?php
session_start();

 // starting a session
include('db_config.php'); // Database configuration file
if(isset($_POST['hcf_submit'])){
 $uname = mysqli_real_escape_string($con,$_POST['email']);
 $password = mysqli_real_escape_string($con,$_POST['password']);
 //$errormsg ="please try again";
if ($uname != "" && $password != "" ){
//echo $password;
//exit();
 $sql_query ="SELECT * FROM bil_client_mw_info WHERE username_bil='".$uname."' and password='".$password."'";
  //print_r($sql_query);
          $result= mysqli_query($con,$sql_query);
          $count=mysqli_num_rows($result);

  if($count==1){
    $row = mysqli_fetch_assoc($result);
          $_SESSION['uname'] = $uname;
          $_SESSION["successmsg"]="You are Login Successfully !";
          header('Location: admin/Dashboard.php');
           exit();
         return true;
      }
     else{
       $_SESSION["errormsg"]="Something went wrong !";
       header('Location: login.php');
     //  echo "login fail";
        return false;
}
       
}
$_SESSION["errormsg"]="Something went wrong !";
       header('Location: login.php');
}

if(isset($_POST['PCB_submit'])){
 $uname = mysqli_real_escape_string($con,$_POST['email']);
 $password = mysqli_real_escape_string($con,$_POST['password']);
 //$errormsg ="please try again";
if ($uname != "" && $password != "" ){
 $sql_query = "select * from pcb_details where user_name='".$uname."' and password='".$password."'";
             $result= mysqli_query($con,$sql_query);
          $count=mysqli_num_rows($result);

  if($count==1){
    $row = mysqli_fetch_assoc($result);
          $_SESSION['uname'] = $uname;
          $_SESSION["successmsg"]="You are Login Successfully !";
          header('Location: admin/Dashboard.php');
           exit();
         return true;
      }
     else{
       $_SESSION["errormsg"]="Something went wrong !";
       header('Location: login.php');
       echo "login fail";
        return false;
}
       
}
$_SESSION["errormsg"]="Something went wrong !";
       header('Location: login.php');
}


if(isset($_POST['BIL_submit'])){
 $uname = mysqli_real_escape_string($con,$_POST['email']);
 $password = mysqli_real_escape_string($con,$_POST['password']);



 //$errormsg ="please try again";
if ($uname != "" && $password != "" ){
 $sql_query = "select * from bil_details where user_name='".$uname."' and password='".$password."'";
             $result= mysqli_query($con,$sql_query);
          $count=mysqli_num_rows($result);

  if($count==1){
    $row = mysqli_fetch_assoc($result);
          $_SESSION['uname'] = $uname;
          $_SESSION["successmsg"]="You are Login Successfully !";
          header('Location: admin/Dashboard.php');
           exit();
         return true;
      }
     else{
       $_SESSION["errormsg"]="Something went wrong !";
       header('Location: login.php');
       echo "login fail";
        return false;
}
       
}
$_SESSION["errormsg"]="Something went wrong !";
       header('Location: login.php');
}
    ?>