<?php

 // starting a session

include('db_config.php'); // Database configuration file
if(isset($_GET['forgetPassword'])){
 $email = mysqli_real_escape_string($con,$_GET['email']);
    //echo $email;

    if ($email != "" ){

        $sql_query = "select count(*) as cntUser from bil_client_mw_info where email_id='".$email."'";

        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $email;
            $_SESSION['success'] = "Link has been sent your Email  ";
           header('Location: login.php');
            echo "success";
        }else{
           //  $_SESSION['failed'] = "Your Registred mail doesn't match";
            //  header("Location: login.php");
            echo "fail";
        }

    }

}
?>