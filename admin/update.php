<?php session_start();
//Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location:../login.php');
} 
include('../db_config.php'); // Database configuration file
$sess_id=$_SESSION['uname'];
// echo "string";
// die;
if(isset($_POST['update']))
{
    $data = $_POST['update'];
    echo "<pre>";
   $info = $_POST;
   $id = $info['update_id'];
   // unset($info['update']);
   // unset($info['update_id']);
    // print_r($info);
    //  exit();

    $Category         = $_REQUEST['category'];
     $organization    = $_REQUEST['organization'];
     $ownership       = $_REQUEST['ownership'];
    $other_ownership  = $_REQUEST['ownership_other'];
    $date_est         = $_REQUEST['dse'];
    $date_start       = $_REQUEST['dse_date'];
     $ap_fullname     = $_REQUEST['authorized_person']; 
    $ap_designation   = $_REQUEST['ap_designation'];
    $ap_contact       = $_REQUEST['ap_contact'];
    $beds_icp         = $_REQUEST['beds_icp'];
    $beds_other       = $_REQUEST['bed_other'];
    $no_of_OT         = $_REQUEST['n_of_ot'];
    $total_beds       = $_REQUEST['total_beds'];
    $flat_no          = $_REQUEST['flat_no'];
    $area             = $_REQUEST['area'];
    $street           = $_REQUEST['street'];
    $pincode          = $_REQUEST['pincode'];
    $city             = $_REQUEST['city'];
    $district         = $_REQUEST['district'];
    $state            = $_REQUEST['state'];
    $country          = $_REQUEST['country'];
    $coll_super_a     = $_REQUEST['collection_supervisor_a'];
    $coll_super_cont_a =$_REQUEST['cs_a_contact'];
    $coll_super_b     = $_REQUEST['collection_supervisor_b'];
    $coll_super_cont_b= $_REQUEST['cs_b_contact'];

    $coll_inchr_a     = $_REQUEST['collection_incharge_a'];
    $coll_desig_a     = $_REQUEST['ci_a_designation'];
    $coll_inchr_cont_a= $_REQUEST['ci_a_contact'];
    $coll_inchr_b     = $_REQUEST['collection_incharge_b'];
    $coll_desig_b     = $_REQUEST['ci_b_designation'];
    $coll_inchr_cont_b= $_REQUEST['ci_b_contact'];
    $declartion_status =$_REQUEST['declartion_status'];
    $update_date     =  date("j, n, Y");

//echo "UPDATE bil_client_mw_info SET category ='".$Category."', organization_name='".$organization."' WHERE username_bil = '".$id."'";
                   // die;
     $update = "UPDATE bil_client_mw_info SET category ='".$Category."', organization_name='".$organization."', 

   category = '".$Category."',      
organization_name      ='".$organization."',  
ownership              ='".$ownership."',
ownership_other        ='".$other_ownership."',
dse                    ='".$date_est."',
dse_date               ='".$date_start."',
authorized_person      ='".$ap_fullname."',
ap_designation         ='".$ap_designation."',
ap_contact              ='".$ap_contact."',
beds_icp               ='".$beds_icp."',
beds_other              ='".$beds_other."',
beds_ot                 ='".$no_of_OT."',
total_beds              ='".$total_beds."',
flat_no                  ='".$flat_no."',
area                     ='".$area."',
street                   ='".$street."',
city                     ='".$city."',
district                 ='".$district."',
state                    ='".$state."',
country                  ='".$country."',
collection_supervisor_a  ='".$coll_super_a."',
cs_a_contact             ='".$coll_super_cont_a."',
collection_supervisor_b  ='".$coll_super_b."',
cs_b_contact             ='".$coll_super_cont_b."',
collection_incharge_a    ='".$coll_inchr_a."',
ci_a_designation         ='".$coll_desig_a."',
ci_a_contact             ='".$coll_inchr_cont_a."',
collection_incharge_b    ='".$coll_inchr_b."',
ci_b_designation         ='".$coll_desig_b."',
ci_b_contact             ='".$coll_inchr_cont_b."',
declartion_status        ='".$declartion_status."', 
profile_update_date      ='".$update_date."'


     WHERE username_bil = '".$id."'";
  
  //print_r($update);
  //exit();
     $result = mysqli_query($con,$update);
mysqli_close($con);

     // echo $result;
     // die;
     if($result){
      $_SESSION['message']="Records Update Successfully";
      header("location: updetails.php?status=success");
     }else{
      $_SESSION['message']="Something went wrong";
      header("location: updetails.php?status=error");
     }

}
else
{
  $_SESSION['message']="Invalid Request";
  header("location: updetails.php?status=error");
}

?>