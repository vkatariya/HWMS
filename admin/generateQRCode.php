<?php session_start();
include('../db_config.php'); // Database configuration file
require_once('TCPDF-master/tcpdf.php');  
include('qr/qrlib.php'); 
// print_r($_POST);
// die;
$sess_id=$_SESSION['uname'];
$sql = "SELECT * FROM bil_client_mw_info WHERE   username_bil= ".$sess_id." ";
$result=mysqli_query($con,$sql);
    //Check whether the query was successful or not
    if($result) {
            $member = mysqli_fetch_assoc($result);
             }else {
        die("Query failed");
    }

date_default_timezone_set('Asia/Kolkata');
//ob_start();
$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'/qr/temp'.DIRECTORY_SEPARATOR;
$PNG_WEB_DIR = 'qr/temp/';

if (!file_exists($PNG_TEMP_DIR))
mkdir($PNG_TEMP_DIR);
$lastNumber = 0;    
$sql = "SELECT id FROM bil_client_mw_generate_qrcode order by id DESC limit 1";
$result = mysqli_query($con, $sql);
//echo "count ".mysqli_num_rows($result);
if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
	//print_r($row);
	$lastNumber = $row['id'];
}else{
	$lastNumber = 0;
}
    $yellow = isset($_REQUEST['yellow'])?$_REQUEST['yellow']:0;
    $black = isset($_REQUEST['blue'])?$_REQUEST['blue']:0;
    $red = isset($_REQUEST['red'])?$_REQUEST['red']:0;
    $white = isset($_REQUEST['white'])?$_REQUEST['white']:0;
    $no_of_code = ($yellow+$black+$red+$white);
    function isExist($sno){
        // select 
        return 0;
    }
    $filenameArray=$color=$sequence_noArray = array();
//**************************Yellow QR CODE**********************************************

    if($yellow){
        for($number = 1; $number<=$yellow; $number++){

$lastNumber = ($lastNumber+1);
$random ="BIL".$sess_id.str_pad($lastNumber,7,'0',STR_PAD_LEFT);
$date = date('Y-m-d');
$time = date('h:m:s A');
$colorName = 'YELLOW';
$username_bil = $_SESSION['uname'];
$sql = "INSERT INTO bil_client_mw_generate_qrcode (username_bil, username_pcb, qr_color,color_qr_count,generate_date,generate_time,sequence_no)
VALUES ('".$username_bil."', '', '".$colorName."','null','".$date."','".$time."','".$random."')";
if ($con->query($sql) === TRUE) {
	//echo "New record created successfully";
} else {
	//echo "Error: " . $sql . "<br>" . $conn->error;
}
    $dates       = date('d-m-Y');  
    $HCF_name    = $member['organization_name'];
    $HCF_number  = $member['hcf_number'];
    $HCF_Category= $member['category'];
    $hcf_other   = $member['ownership_other'];
    $username_pcb= $member['username_pcb'];
   // $HCF_Number  = $member['hcf_number'];
    $sequence_no=array(
            'color_name'   => $colorName,
            'generate_date'=> $dates,
            'generate_time'=> $time,
            'unique_QR_no' => $random,
            'HCF_name'     =>  $HCF_name,
            'HCF_Category' => $HCF_Category,
            'HCF_Number'    =>$HCF_number,
            'username_pcb' => $username_pcb,
            'username_bil' => $username_bil
 );       
   $generate_data = json_encode($sequence_no);
            // die();
            $filename = $PNG_WEB_DIR.$random.'.png';
            $filenameArray[]= $filename;
            $sequence_noArray[]= $random;
            $hcf_numberArray[]=$HCF_number;
            $color[]= "YELLOW";
            QRcode::png($generate_data, $filename, QR_ECLEVEL_L, 2); 
        }
    }
 //********************************************************************************   
    if($black){
        for($number = 1; $number<=$black; $number++){
             $lastNumber = ($lastNumber+1);
            $random ="BIL".$sess_id.str_pad($lastNumber,7,'0',STR_PAD_LEFT);
                 
$date = date('Y-m-d');
$time = date('h:m:s A');
$colorName = 'BLUE';
$username_bil = $_SESSION['uname'];
$sql = "INSERT INTO bil_client_mw_generate_qrcode (username_bil, username_pcb, qr_color,color_qr_count,generate_date,generate_time,sequence_no)
VALUES ('".$username_bil."', '', '".$colorName."','null','".$date."','".$time."','".$random."')";

if ($con->query($sql) === TRUE) {
	//echo "New record created successfully";
} else {
	//echo "Error: " . $sql . "<br>" . $conn->error;
}
    $dates       = date('d-m-Y');  
    $HCF_name    = $member['organization_name'];
    $HCF_number  = $member['hcf_number'];
    $HCF_Category= $member['category'];
    $hcf_other   = $member['ownership_other'];
    $username_pcb= $member['username_pcb'];
    $sequence_no=array(
            'color_name'    => $colorName,
            'generate_date' => $dates,
            'generate_time' => $time,
            'unique_QR_no'  => $random,
            'HCF_name'      =>  $HCF_name,
            'HCF_Number'    =>$HCF_number,
            'HCF_Category'  => $HCF_Category,
            'username_pcb'  => $username_pcb,
            'username_bil'  => $username_bil
 );       
   $generate_data = json_encode($sequence_no);

            $sequence_no = $random;
            $filename = $PNG_WEB_DIR.$random.'.png';
            $filenameArray[]= $filename;
            $sequence_noArray[]= $random;
            $hcf_numberArray[]=$HCF_number;
            $color[]= "BLUE";
            QRcode::png($generate_data, $filename, QR_ECLEVEL_L, 2); 
        }
    }
//**************************************************************************
    if($red){
        for($number = 1; $number<=$red; $number++){
           $lastNumber = ($lastNumber+1);
            $random ="BIL".$sess_id.str_pad($lastNumber,7,'0',STR_PAD_LEFT);
          //  $random ="BIL".str_pad($lastNumber,7,'0',STR_PAD_LEFT);
$date = date('Y-m-d');
$time = date('h:m:s A');
$colorName = 'RED';
$username_bil = $_SESSION['uname'];
$sql = "INSERT INTO bil_client_mw_generate_qrcode (username_bil, username_pcb, qr_color,color_qr_count,generate_date,generate_time,sequence_no)
VALUES ('".$username_bil."', '', '".$colorName."','null','".$date."','".$time."','".$random."')";
//echo $sql;
if ($con->query($sql) === TRUE) {
	//echo "New record created successfully";
} else {
	//echo "Error: " . $sql . "<br>" . $conn->error;
}          $dates       = date('d-m-Y');  
          $HCF_name    = $member['organization_name'];
          $HCF_number    = $member['hcf_number'];
          $HCF_Category= $member['category'];

          $hcf_other   = $member['ownership_other'];
          $username_pcb= $member['username_pcb'];
          $sequence_no=array(
            'color_name'    => $colorName,
            'generate_date' => $dates,
            'generate_time' => $time,
            'unique_QR_no'  => $random,
            'HCF_name'      => $HCF_name,
            'HCF_Number'    => $HCF_number,
            'HCF_Category'  => $HCF_Category,
            'username_pcb'  => $username_pcb,
            'username_bil'  => $username_bil
 );       
   $generate_data = json_encode($sequence_no);
            $sequence_no = $random;
            $filename = $PNG_WEB_DIR.$random.'.png';
            $filenameArray[]= $filename;
            $sequence_noArray[]= $random;
            $hcf_numberArray[]=$HCF_number;
            $color[]= "RED";
            QRcode::png($generate_data, $filename, QR_ECLEVEL_L, 2); 
        }
    }
//die;
//****************************CODE for WHITE*********************************************
    if($white){
        for($number = 1; $number<=$white; $number++){
            $lastNumber = ($lastNumber+1);
            $random ="BIL".$sess_id.str_pad($lastNumber,7,'0',STR_PAD_LEFT);
         
$date = date('Y-m-d');
$time = date('h:m:s A');
$colorName = 'WHITE';
$username_bil = $_SESSION['uname'];
$sql = "INSERT INTO bil_client_mw_generate_qrcode (username_bil, username_pcb, qr_color,color_qr_count,generate_date,generate_time,sequence_no)
VALUES ('".$username_bil."', '', '".$colorName."','null','".$date."','".$time."','".$random."')";

if ($con->query($sql) === TRUE) {
	//echo "New record created successfully";
} else {
	//echo "Error: " . $sql . "<br>" . $conn->error;
}             $dates       = date('d-m-Y');  
              $HCF_name    = $member['organization_name'];
              $HCF_number    = $member['hcf_number'];
              $HCF_Category= $member['category'];

              $hcf_other   = $member['ownership_other'];
              $username_pcb= $member['username_pcb'];
    $sequence_no=array(
            'color_name'    => $colorName,
            'generate_date' => $dates,
            'generate_time' => $time,
            'unique_QR_no'  => $random,
            'HCF_name'      => $HCF_name,
            'HCF_Number'    => $HCF_number,
            'HCF_Category'  => $HCF_Category,
            'username_pcb'  => $username_pcb,
            'username_bil'  => $username_bil
 );       
   $generate_data = json_encode($sequence_no);
            $sequence_no = $random;
            $filename = $PNG_WEB_DIR.$random.'.png';
            $filenameArray[]= $filename;
            $sequence_noArray[]= $random;
            $hcf_numberArray[]=$HCF_number;
            $color[]= "WHITE";
            QRcode::png($generate_data, $filename, QR_ECLEVEL_L, 2); 
        }
    }

 //************************PDF file header and Footer setting*********************************   

      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("QR Code Gerenate");  
      $obj_pdf->SetHeaderData('', 'QR Code', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, 'QR Code', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '1', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);  
      $obj_pdf->SetFont('helvetica', '1', 12);  
        
      // $txt = "You can also export 1D barcodes in other formats (PNG, SVG, HTML). Check the examples inside the barcodes directory.\n";
      // $obj_pdf->MultiCell(70, 50, $txt, 0, 'J', false, 1, 125, 30, true, 0, false, true, 0, 'T', false);
      // $obj_pdf->MultiCell(70, 50, $txt, 0, 'J', false, 1, 125, 30, true, 0, false, true, 0, 'T', false);
      $content = ''; 



      //$obj_pdf->SetFont('helvetica', '', 10);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// set style for barcode

  //**********************display QR code *************************************************
//$obj_pdf->AddPage();
$obj_pdf->AddPage();
// define some HTML content with style
$content = <<<EOF
<!-- EXAMPLE OF CSS STYLE -->
<style>
    section{
      border:2px solid red;
    }
    div{

        color: navy;
        font-family: times;
        font-size: 12pt;
        text-align:center;
        border:2px solid black;
        padding-bottom:20px; 
        float:left;  
        }
    p{
      padding:0px;
      
    }
   
</style>

EOF;


// output the HTML content

  	foreach ($filenameArray as $key => $value) { 
        $content .='<span>';
       $content .='<div>';
       $content .='&nbsp;&nbsp;&nbsp;<span>'.$color[$key].'</span>';
       $content .='&nbsp;&nbsp;&nbsp;<span>'.substr($sequence_noArray[$key],0,-12).str_repeat("X",10).'</span>';
       
       $content .='<div><img src="'.$value.'" />';
       $content .='<p>&nbsp;&nbsp;&nbsp;'.$hcf_numberArray[$key].'</p>';
       
      $content .='</div>';
      $content .='<br/></span>';
      //$content .='<br/>';
 }
 

      $obj_pdf->writeHTML($content, true, false, true, false, ''); 
      $obj_pdf->Output("sample.pdf", 'I');
      //$obj_pdf->Output("QR_".date('Y-m-d').".pdf", 'D');
     // 	header('Content-type: application/pdf');
    	// header('Content-Disposition: attachment; filename="sample.pdf"'); 

      ob_end_clean();
      ?>
      <script type="text/javascript">
        alert();
          window.location.href = "<?= $base_url.'GQRcode.php' ?>";
     </script>
 <?php 
  //   //QRcode::png($codeContents, $PNG_WEB_DIR.'test1.png', QR_ECLEVEL_L, 3);
  // //  echo '<img src="'.EXAMPLE_TMP_URLRELPATH.'026.png" />'; 
  //    echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" />&nbsp;
  //    <img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>'; 
    ?>
 
