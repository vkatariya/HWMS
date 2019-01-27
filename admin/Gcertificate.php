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
//include_once('pdf_gernator/fpdf.php');


$sess_id=$_SESSION['uname'];
$sql = "SELECT * FROM bil_client_mw_info WHERE   username_bil= ".$sess_id." ";
$sql1 = "SELECT * FROM bil_client_mw_payment WHERE   username_bil= ".$sess_id." ORDER BY `s.no` DESC limit 1";
$result=mysqli_query($con,$sql);
    //Check whether the query was successful or not
    if($result) {
        if(mysqli_num_rows($result) == 1) {
           $member = mysqli_fetch_assoc($result);
             }else {
        die("Query failed");
    }
}
$result1=mysqli_query($con,$sql1);
//print_r($result1);
$payment = mysqli_fetch_assoc($result1);
print_r($payment);

//code start for gernate pdf
 /*function fetch_data()  
 {  
      $output = '';  
      $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME); 
    // include('../db_config.php'); // Database configuration file 
      $sql = "SELECT * FROM bil_client_mw_info ORDER BY sno ASC";  
      $result = mysqli_query($con, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          <td>'.$row["organization_name"].'</td>  
                          <td>'.$row["authorized_person"].'</td>  
                          <td>'.$row["category"].'</td>  
                          <td>'.$row["ap_contact"].'</td>  
                          <td>'.$row["ap_designation"].'</td>  
                     </tr>  
                          ';  
      }  
      return $output;  
 }  */

?>
<?php require_once('./layouts/top_header.php');?>
    <!-- End Header Top Area -->
    
    
    
<?php include_once('./layouts/menu.php'); ?>
    <br>
    <div class="dialog-area">
        <div class="container">
            <div class="row">
              <div class="col-lg-12 col-md-10 col-sm-10 col-xs-10">
                    <div class="dialog-inner mg-t-30">
                        <div class="contact-hd dialog-hd" style="text-align:center;">
                            <h2>Generate Your Certificate</h2>
                            <?php  $timestamp = date("d-m-Y "); ?>
                            <h5 style="color:red;">Today's Date:<?php
                            echo  $timestamp; ?></h5>
                <div class="table-responsive">  
                     <?php  
                    //fetch_data();  
                     ?>  
                    <!--  </table>   -->
                     <br />  
                     <form method="post" action="GcertificatePDF.php">
                     <?php  
//print_r($payment);
                     ?>  
                        <div class="col-sm-12 form-group">
                          <div class="col-sm-6">
                            <input type="hidden" name="number" class="form-control" placeholder="Number" value="<?= $member['sno']; ?>">
                            <input type="hidden" name="o_name" class="form-control" placeholder="Organization Name" value="<?= $member['organization_name'].' (PCB Id : '.$member['username_pcb'].')'; ?>">
                          </div>
                          <div class="col-sm-6">
                            <input type="hidden" name="for_name" class="form-control" placeholder="For name"  value="<?= $member['organization_name']; ?>">
                            
                          </div>
                        </div>
                        
                        <div class="col-sm-12 form-group">
                          <div class="col-sm-6">
                            <input type="hidden" name="from_date" class="form-control" placeholder="From date" value="<?= $payment['starting_date']; ?>">
                          </div>
                          <div class="col-sm-6">
                            <input type="hidden" name="to_date" class="form-control" placeholder="To date" value="<?= $payment['ending_date']; ?>">
                          </div>
                        </div>
                        <div class="col-sm-12 form-group">
                          <div class="col-sm-6">
                            
                          <textarea hidden name="address" class="form-control" placeholder="Address"><?= $member['street'].' '.$member['area'].' '.$member['city'].' '.$member['state'].' '.$member['pincode'] ?></textarea>  
                          </div>

                        </div>
                          <button type="submit" name="create_pdf"  class="btn btn-info" >Generate Now</button>  
                     </form>  
                </div>  
                          <!-- <div class="dialog-pro dialog" >
                            <button  name="create_pdf" class="btn btn-info" >Generate Now</button>
                        </div> -->
                    </div>
                </div>  
                
            </div>
            
            </div>
        </div>
    <!-- Dialog area End-->
    <!-- Start Footer area-->
<?php require_once('./layouts/footer.php');?>
</body>

</html>