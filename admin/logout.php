<?php 
session_start();
unset($_SESSION['uname']);
session_destroy();
ob_start();
//header("location:dashboard.html");
header("Location: ../login.php");
ob_end_flush(); 


exit();



?>