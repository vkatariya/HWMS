<?php session_start(); 
if(!isset($_SESSION['uname'])){
    header('Location:../login.php');
}
 
include('../db_config.php'); // Database configuration file
$sess_id=$_SESSION['uname'];

require_once("dompdf/vendor/autoload.php"); 

/* Start to develop here. Best regards https://php-download.com/ */

Dompdf\Autoloader::register();


// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();





//echo $sess_id; 
//die();
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


$sql_yellow =  "SELECT username_bil, username_pcb,hcf_name,hcf_number,hcf_number_number,hcf_type,hcf_address,qr_generate_date,qr_sequence_number,entry_date,entry_time, SUM(bag_weight) AS total_weight_y, COUNT('bag_color') AS total_bag_y FROM  bil_client_mw_report_hcf WHERE  username_bil= ".$sess_id." AND  bag_color='YELLOW' AND entry_date=CURRENT_DATE "; 

$result_yellow=mysqli_query($con,$sql_yellow);
 if($result_yellow) {
        if(mysqli_num_rows($result_yellow) == 1) {
           $yellow = mysqli_fetch_assoc($result_yellow);
          // echo  $yellow['total_bag_y'];
         //  die();
             }else {
        die("Query failed");
    }
}                           


$sql_red =  "SELECT SUM(bag_weight) AS total_weight_r, COUNT('bag_color') AS total_bag_r FROM  bil_client_mw_report_hcf WHERE username_bil= ".$sess_id." AND bag_color='RED' AND entry_date=CURRENT_DATE"; 

$result_red=mysqli_query($con,$sql_red);
 if($result_red) {
        if(mysqli_num_rows($result_red) == 1) {
           $red = mysqli_fetch_assoc($result_red);
          // echo  $yellow['total_bag_y'];
         //  die();
             }else {
        die("Query failed");
    }
}                           

$sql_blue =  "SELECT SUM(bag_weight) AS total_weight_b, COUNT('bag_color') AS total_bag_b FROM  bil_client_mw_report_hcf WHERE username_bil= ".$sess_id." AND bag_color='BLUE' AND entry_date=CURRENT_DATE"; 

$result_blue=mysqli_query($con,$sql_blue);
 if($result_blue) {
        if(mysqli_num_rows($result_blue) == 1) {
           $blue = mysqli_fetch_assoc($result_blue);
          // echo  $yellow['total_bag_y'];
         //  die();
             }else {
        die("Query failed");
    }
}                           


$sql_white =  "SELECT SUM(bag_weight) AS total_weight_w, COUNT('bag_color') AS total_bag_w FROM  bil_client_mw_report_hcf WHERE username_bil= ".$sess_id." AND bag_color='WHITE' AND entry_date=CURRENT_DATE"; 

$result_white=mysqli_query($con,$sql_white);
 if($result_white) {
        if(mysqli_num_rows($result_white) == 1) {
           $white = mysqli_fetch_assoc($result_white);
          // echo  $yellow['total_bag_y'];
         //  die();
             }else {
        die("Query failed");
    }
}                           




$sql_yellow_cb =  "SELECT  username_pcb,hcf_name,hcf_number,hcf_number_number,hcf_type,hcf_address,qr_generate_date,qr_sequence_number,entry_date,entry_time, SUM(bag_weight) AS total_weight_y, COUNT('bag_color') AS total_bag_y FROM  bil_client_mw_report_bil WHERE username_bil= ".$sess_id." AND bag_color='YELLOW' AND entry_date=CURRENT_DATE"; 

$result_yellow_cb=mysqli_query($con,$sql_yellow_cb);
 if($result_yellow_cb) {
        if(mysqli_num_rows($result_yellow_cb) == 1) {
           $yellow_cb = mysqli_fetch_assoc($result_yellow_cb);
          // echo  $yellow['total_bag_y'];
         //  die();
             }else {
        die("Query failed");
    }
}                           


$sql_red_cb =  "SELECT SUM(bag_weight) AS total_weight_r, COUNT('bag_color') AS total_bag_r FROM  bil_client_mw_report_bil WHERE username_bil= ".$sess_id." AND bag_color='RED' AND entry_date=CURRENT_DATE"; 

$result_red_cb=mysqli_query($con,$sql_red_cb);
 if($result_red) {
        if(mysqli_num_rows($result_red_cb) == 1) {
           $red_cb = mysqli_fetch_assoc($result_red_cb);
          // echo  $yellow['total_bag_y'];
         //  die();
             }else {
        die("Query failed");
    }
}                           

$sql_blue_cb =  "SELECT SUM(bag_weight) AS total_weight_b, COUNT('bag_color') AS total_bag_b FROM  bil_client_mw_report_bil WHERE username_bil= ".$sess_id." AND bag_color='BLUE' AND entry_date=CURRENT_DATE"; 

$result_blue_cb=mysqli_query($con,$sql_blue_cb);
 if($result_blue) {
        if(mysqli_num_rows($result_blue_cb) == 1) {
           $blue_cb = mysqli_fetch_assoc($result_blue_cb);
          // echo  $yellow['total_bag_y'];
         //  die();
             }else {
        die("Query failed");
    }
}                           


$sql_white_cb =  "SELECT SUM(bag_weight) AS total_weight_w, COUNT('bag_color') AS total_bag_w FROM  bil_client_mw_report_bil WHERE username_bil= ".$sess_id." AND bag_color='WHITE' AND entry_date=CURRENT_DATE"; 

$result_white_cb=mysqli_query($con,$sql_white_cb);
 if($result_white_cb) {
        if(mysqli_num_rows($result_white_cb) == 1) {
           $white_cb = mysqli_fetch_assoc($result_white_cb);
          // echo  $yellow['total_bag_y'];
         //  die();
             }else {
        die("Query failed");
    }
}                           

$diff_r= $red['total_weight_r'] - $red_cb['total_weight_r'];
                         $diff_y= $yellow['total_weight_y'] - $yellow_cb['total_weight_y'];
                          $diff_b= $blue['total_weight_b'] - $blue_cb['total_weight_b'];
                           $diff_w= $white['total_weight_w'] - $white_cb['total_weight_w'];
                    
$html = '<div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>HCF Waste Collection Data</h2>
                           </div>
                         <div class="table-responsive" id="dvData">
                             <style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-wuhm{font-family:Verdana, Geneva, sans-serif !important;;background-color:#ffffff;color:#036400;border-color:#9b9b9b;text-align:center}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-ecul{font-family:Verdana, Geneva, sans-serif !important;;background-color:#ffffff;color:#036400;border-color:#9b9b9b;text-align:center;vertical-align:top}
.tg .tg-f8tx{color:#000000;text-align:center;vertical-align:top}
</style>
                    <table id="" class="tg" style="undefined;">
                        <colgroup>

                        <col style="width: 102px">
                        <col style="width: 103px">
                        <col style="width: 102px">
                        <col style="width: 83px">
                        <col style="width: 78px">
                        <col style="width: 87px">
                        <col style="width: 50px">
                        <col style="width: 85px">
                        <col style="width: 56px">
                        <col style="width: 86px">
                        <col style="width: 57px">
                        <col style="width: 94px">
                        <col style="width: 53px">
                        </colgroup>
                          <tr>
                            
                            <th class="tg-wuhm" rowspan="3">Name of HCF</th>
                            <th class="tg-wuhm" rowspan="3">HCF Address</th>
                            <th class="tg-wuhm" rowspan="3">Type of HCF</th>
                            <th class="tg-ecul" colspan="10">Details of BioMedical Generated by the HCF<br>(Qty. of BMW in Kg)</th>
                          </tr>
                          <tr>
                            <td class="tg-wuhm" rowspan="2">Date</td>
                            <td class="tg-wuhm" rowspan="2">Time</td>
                            <td class="tg-ecul" colspan="2">Yellow</td>
                            <td class="tg-ecul" colspan="2">Red</td>
                            <td class="tg-ecul" colspan="2">Blue</td>
                            <td class="tg-ecul" colspan="2">White</td>
                          </tr>
                          <tr>
                            <td class="tg-ecul">No. of Bags</td>
                            <td class="tg-ecul">Qty.</td>
                            <td class="tg-ecul">No. of Bags</td>
                            <td class="tg-ecul">Qty.</td>
                            <td class="tg-ecul">No. of Bags</td>
                            <td class="tg-ecul">Qty.</td>
                            <td class="tg-ecul">No. of Bags</td>
                            <td class="tg-ecul">Qty.</td>
                          </tr>
                        
                            <tr>
                           
                            <td class="tg-f8tx">'.$yellow['hcf_name'].'</td>
                            <td class="tg-f8tx">'.$yellow['hcf_address'].'</td>
                            <td class="tg-f8tx">'.$yellow['hcf_type'].'</td>
                            <td class="tg-f8tx">'.$yellow['entry_date'].'</td>
                            <td class="tg-f8tx">'. $yellow['entry_time'].'</td>


                            <td class="tg-f8tx">'. $yellow['total_bag_y'] .'</td>
                            <td class="tg-f8tx">'. $yellow['total_weight_y'].'</td>
                             <td class="tg-f8tx">'. $red['total_bag_r'].'</td>
                            <td class="tg-f8tx">'. $red['total_weight_r'].'</td>
                             <td class="tg-f8tx">'. $blue['total_bag_b'].'</td>
                            <td class="tg-f8tx">'. $blue['total_weight_b'].'</td>
                             <td class="tg-f8tx">'. $white['total_bag_w'].'</td>
                            <td class="tg-f8tx">'. $white['total_weight_w'].'</td>

                            
                          </tr>
                       
                          
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>CBWTF Waste Collection Data</h2>
                           </div>
                        <div class="table-responsive" id="dvData">
                            <style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-wuhm{font-family:Verdana, Geneva, sans-serif !important;;background-color:#ffffff;color:#036400;border-color:#9b9b9b;text-align:center}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-ecul{font-family:Verdana, Geneva, sans-serif !important;;background-color:#ffffff;color:#036400;border-color:#9b9b9b;text-align:center;vertical-align:top}
.tg .tg-f8tx{color:#000000;text-align:center;vertical-align:top}
</style>
                      <table class="tg" style="undefined;">
                      <colgroup>

                      <col style="width: 102px">
                      <col style="width: 103px">
                      <col style="width: 102px">
                      <col style="width: 83px">
                      <col style="width: 78px">
                      <col style="width: 87px">
                      <col style="width: 50px">
                      <col style="width: 85px">
                      <col style="width: 56px">
                      <col style="width: 86px">
                      <col style="width: 57px">
                      <col style="width: 94px">
                      <col style="width: 53px">
                      </colgroup>
                        <tr>
                          
                          <th class="tg-wuhm" rowspan="3">Name of HCF</th>
                          <th class="tg-wuhm" rowspan="3">HCF Address</th>
                          <th class="tg-wuhm" rowspan="3">Type of HCF</th>
                          <th class="tg-ecul" colspan="10">Details of BioMedical Generated by the CBWTF<br>(Qty. of BMW in Kg)</th>
                        </tr>
                        <tr>
                          <td class="tg-wuhm" rowspan="2">Date</td>
                          <td class="tg-wuhm" rowspan="2">Time</td>
                          <td class="tg-ecul" colspan="2">Yellow</td>
                          <td class="tg-ecul" colspan="2">Red</td>
                          <td class="tg-ecul" colspan="2">Blue</td>
                          <td class="tg-ecul" colspan="2">White</td>
                        </tr>
                        <tr>
                          <td class="tg-ecul">No. of Bags</td>
                          <td class="tg-ecul">Qty.</td>
                          <td class="tg-ecul">No. of Bags</td>
                          <td class="tg-ecul">Qty.</td>
                          <td class="tg-ecul">No. of Bags</td>
                          <td class="tg-ecul">Qty.</td>
                          <td class="tg-ecul">No. of Bags</td>
                          <td class="tg-ecul">Qty.</td>
                        </tr>
                          <tr>
                          <td class="tg-f8tx">'. $yellow_cb['hcf_name'].'</td>
                          <td class="tg-f8tx">'. $yellow_cb['hcf_address'].'</td>
                          <td class="tg-f8tx">'. $yellow_cb['hcf_type'].'</td>
                          <td class="tg-f8tx">'. $yellow_cb['entry_date'].'</td>
                          <td class="tg-f8tx">'. $yellow_cb['entry_time'].'</td>
                          <td class="tg-f8tx">'. $yellow_cb['total_bag_y'].'</td>
                          <td class="tg-f8tx">'. $yellow_cb['total_weight_y'].'</td>
                           <td class="tg-f8tx">'. $red_cb['total_bag_r'].'</td>
                          <td class="tg-f8tx">'. $red_cb['total_weight_r'].'</td>
                           <td class="tg-f8tx">'. $blue_cb['total_bag_b'].'</td>
                          <td class="tg-f8tx">'. $blue_cb['total_weight_b'].'</td>
                           <td class="tg-f8tx">'. $white_cb['total_bag_w'].'</td>
                          <td class="tg-f8tx">'. $white_cb['total_weight_w'].'</td>  
                        </tr>
                        
                      </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->
  <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd"><h2>Difference in waste collected and received (+/- in Kg)</h2>
              <p>Red Bag:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; '.$diff_r.'&nbsp;Kg</p> <br>
              <p>Yellow Bag: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;'.$diff_y.' &nbsp;Kg</p> <br>
              <p>Blue Bag: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;'.$diff_b.'&nbsp;Kg</p> <br>
              <p>White Bag: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  '.$diff_w.'&nbsp;Kg </p> <br>
               </div>
       
            </div>   
          </div>
       </div>
   </div>
</div>

';

//echo $html;

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('test',array("Attachment"=>0));
?>
