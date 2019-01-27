<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'bil_techworm_faat'); // your database name
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$base_url = "http://localhost/module25/"; 
//error_reporting(0);
date_default_timezone_set('Asia/Kolkata');
  

?>