<?php 
session_start();
// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: login.php');
}
$utype=$_SESSION['utype'];
switch ($utype) {
    case "HCF":
        echo "Welcome!" .$_SESSION['uname'];

      
        echo "<h1>Admin</h2>";
        echo "<h1>HCF</h2>";
        echo "<h1>PBC</h2>";
        echo "<h1>BIS</h2>";

        break;
    case "PCB":
        echo "Welcome!" .$_SESSION['uname'];

        echo "<h1>PBC</h2>";
        echo "<h1>BIS</h2>";
        break;
    case "BIL":
        echo "Welcome!" .$_SESSION['uname'];
        echo "<h1>BIS</h2>";
        break;
    default:
        echo "Your are not Authorized user!";
}

?>
<br>
<a href="logout.php">Logout</a>


