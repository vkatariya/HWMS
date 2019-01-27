<?php session_start();
include('../db_config.php'); // Database configuration file
require_once('TCPDF-master/tcpdf.php');  
include('qr/qrlib.php'); 
// print_r($_POST);
// die;
$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'qr/temp'.DIRECTORY_SEPARATOR;
$PNG_WEB_DIR = 'qr/temp/';

// if (!file_exists($PNG_TEMP_DIR))
// mkdir($PNG_TEMP_DIR);

$lastNumber = 0;    
$sql = "SELECT id FROM bil_client_mw_generate_qrcode order by id DESC limit 1";
$result = mysqli_query($con, $sql);
//echo "count ".mysqli_num_rows($result);
if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
	//print_r($row);
	$lastNumber = $row['id'];
}else{
	// echo "manish";
	// die;
	$lastNumber = 0;
}
// print_r($_POST);
// //echo "string";
// die;
    //$lastNumber = $row['id'];
    
    $yellow = isset($_REQUEST['yellow'])?$_REQUEST['yellow']:0;
    $black = isset($_REQUEST['blue'])?$_REQUEST['blue']:0;
    $red = isset($_REQUEST['red'])?$_REQUEST['red']:0;
    $white = isset($_REQUEST['white'])?$_REQUEST['white']:0;
    $no_of_code = ($yellow+$black+$red+$white);
    // print_r($no_of_code);
    // die;
    function isExist($sno){
        // select 
        return 0;
    }
    $filenameArray=$color=$sequence_noArray = array();
    if($yellow){
        for($number = 1; $number<=$yellow; $number++){

$lastNumber = ($lastNumber+1);
$random ="BIL".str_pad($lastNumber,7,'0',STR_PAD_LEFT);
$date = date('d/m/Y');
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

            
            // if(isExist($random)){
            //     goto loop;    
            // }
            $sequence_no = $random;
            $filename = $PNG_WEB_DIR.$number.'_y_'.time().'.png';
            $filenameArray[]= $filename;
            $sequence_noArray[]= $random;
            $color[]= "YELLOW";
// echo $PNG_TEMP_DIR;
// die;
            QRcode::png($sequence_no, $filename, QR_ECLEVEL_M, 6); 
            echo "string";
            die;
        }
    }
    if($black){
        for($number = 1; $number<=$black; $number++){
            // loop_black:
            // $random = "BIL".rand();
            // if(isExist($random)){
            //     goto loop_black;    
            // }
             $lastNumber = ($lastNumber+1);
            $random ="BIL".str_pad($lastNumber,7,'0',STR_PAD_LEFT);
            //$random ="BIL".str_pad($lastNumber,7,'0',STR_PAD_LEFT);
$date = date('d/m/Y');
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
            $sequence_no = $random;
            $filename = $PNG_WEB_DIR.$number.'_b_'.time().'.png';
            $filenameArray[]= $filename;
            $sequence_noArray[]= $random;
            $color[]= "BLACK";
            QRcode::png($sequence_no, $filename, QR_ECLEVEL_M, 6); 
        }
    }

    if($red){
        for($number = 1; $number<=$red; $number++){
            // loop_red:
            // $random = "BIL".rand();
            // if(isExist($random)){
            //     goto loop_red;    
            // }
             $lastNumber = ($lastNumber+1);
            $random ="BIL".str_pad($lastNumber,7,'0',STR_PAD_LEFT);
            $random ="BIL".str_pad($lastNumber,7,'0',STR_PAD_LEFT);
$date = date('d/m/Y');
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
}
            $sequence_no = $random;
            $filename = $PNG_WEB_DIR.$number.'_r_'.time().'.png';
            $filenameArray[]= $filename;
            $sequence_noArray[]= $random;
            $color[]= "RED";
            QRcode::png($sequence_no, $filename, QR_ECLEVEL_M, 6); 
        }
    }
//die;
    if($white){
        for($number = 1; $number<=$white; $number++){
            // loop_white:
            // $random = "BIL".rand();
            // if(isExist($random)){
            //     goto loop_white;    
            // }
            $lastNumber = ($lastNumber+1);
            $random ="BIL".str_pad($lastNumber,7,'0',STR_PAD_LEFT);
            $random ="BIL".str_pad($lastNumber,7,'0',STR_PAD_LEFT);
$date = date('d/m/Y');
$time = date('h:m:s A');
$colorName = 'WHITE';
$username_bil = $_SESSION['uname'];
$sql = "INSERT INTO bil_client_mw_generate_qrcode (username_bil, username_pcb, qr_color,color_qr_count,generate_date,generate_time,sequence_no)
VALUES ('".$username_bil."', '', '".$colorName."','null','".$date."','".$time."','".$random."')";

if ($con->query($sql) === TRUE) {
	//echo "New record created successfully";
} else {
	//echo "Error: " . $sql . "<br>" . $conn->error;
}
            $sequence_no = $random;
            $filename = $PNG_WEB_DIR.$number.'_w_'.time().'.png';
            $filenameArray[]= $filename;
            $sequence_noArray[]= $random;
            $color[]= "WHITE";
            QRcode::png($sequence_no, $filename, QR_ECLEVEL_M, 6); 
        }
    }
    // echo $no_of_code;
    // die;


       $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("QR Code Gerenate");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();  
      $content = 'QR COde'; 
  	foreach ($filenameArray as $key => $value) { 
       $content .='<div style="display: inline-grid;width:200px;border: 1px solid red;">';
       $content .='<img src="'.$value.'" />';
       $content .='<div style="text-align: center;">'.$sequence_noArray[$key].'</div>';
       $content .='<div style="text-align: center;">'.$color[$key].'</div>';
       $content .='</div>';
    }
      $obj_pdf->writeHTML($content); 
 	//header('Content-type: application/pdf');
	// header('Content-Disposition: attachment; filename="sample.pdf"'); 
	$obj_pdf->Output("QR_".date('Y-m-d').".pdf", 'I');
	//$obj_pdf->Output('sample.pdf', 'I');
      ob_end_clean();
      header('Location: GQRcode.php');
      


echo "string";
die;
   
   foreach ($filenameArray as $key => $value) { ?>
       <div style="display: inline-grid;border: 1px solid red;">
       <img src="<?= $value; ?>" />
       <div style="text-align: center;"><?= $sequence_noArray[$key]; ?></div>
       <div style="text-align: center;"><?= $color[$key]; ?></div>
       </div>
   <?php } 
   die;
    // generating 
    
    //QRcode::png($codeContents, $PNG_WEB_DIR.'test1.png', QR_ECLEVEL_L, 3);

    // displaying 
  //  echo '<img src="'.EXAMPLE_TMP_URLRELPATH.'026.png" />'; 
     echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" />&nbsp;
     <img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>'; 
     
    // echo $codeContents ."<br>";
 

