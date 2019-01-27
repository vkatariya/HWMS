<?php 

//     require_once('TCPDF-master/tcpdf.php');  
//       $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
//       $obj_pdf->SetCreator(PDF_CREATOR);  
//       $obj_pdf->SetTitle("Certificate Gerenate");  
//       $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
//       $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
//       $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
//       $obj_pdf->SetDefaultMonospacedFont('helvetica');  
//       $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
//       $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
//       $obj_pdf->setPrintHeader(false);  
//       $obj_pdf->setPrintFooter(false);  
//       $obj_pdf->SetAutoPageBreak(TRUE, 10);  
//       $obj_pdf->SetFont('helvetica', '', 12);  
//       $obj_pdf->AddPage();  
//       $content = 'QR COde';  
//       $content .= '<img src="temp/1_1547750534.png"><img src="temp/1_1547750534.png">'; $content .= '<img src="temp/1_1547750534.png">';   
//       $content .= '<img src="temp/1_1547750534.png">';   
//       $obj_pdf->writeHTML($content);  
//       ob_end_clean();
//       $obj_pdf->Output('sample.pdf', 'I');


// echo "pdf generate";
// die;
  date_default_timezone_set('Asia/Kolkata');
   $timestamp = date("Y-m-d H:i:s");
   // echo  $timestamp;
    //include('../lib/full/qrlib.php'); 
    include('qr/qrlib.php'); 
    //"BIL-".rand(6);
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    $PNG_WEB_DIR = 'temp/';
     if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    $lastNumber = 40;
    $yellow = "1";
    $black = "8";
    $red = "1";
    $white = "2";
    $no_of_code = ($yellow+$black+$red+$white);
    
    function isExist($sno){
        // select 
        return 0;
    }
    $filenameArray=$color=$sequence_noArray = array();
    if($yellow){
        for($number = 1; $number<=$yellow; $number++){
            // loop:
            // $random = rand();
            $lastNumber = ($lastNumber+1);
            $random ="BIL".str_pad($lastNumber,7,'0',STR_PAD_LEFT);
            // if(isExist($random)){
            //     goto loop;    
            // }
            $sequence_no = $random;
            $filename = $PNG_WEB_DIR.$number.'_y_'.time().'.png';
            $filenameArray[]= $filename;
            $sequence_noArray[]= $random;
            $color[]= "YELLOW";
            QRcode::png($sequence_no, $filename, QR_ECLEVEL_M, 10); 
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
            $sequence_no = $random;
            $filename = $PNG_WEB_DIR.$number.'_b_'.time().'.png';
            $filenameArray[]= $filename;
            $sequence_noArray[]= $random;
            $color[]= "BLACK";
            QRcode::png($sequence_no, $filename, QR_ECLEVEL_M, 10); 
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
            $sequence_no = $random;
            $filename = $PNG_WEB_DIR.$number.'_r_'.time().'.png';
            $filenameArray[]= $filename;
            $sequence_noArray[]= $random;
            $color[]= "RED";
            QRcode::png($sequence_no, $filename, QR_ECLEVEL_M, 10); 
        }
    }

    if($white){
        for($number = 1; $number<=$white; $number++){
            // loop_white:
            // $random = "BIL".rand();
            // if(isExist($random)){
            //     goto loop_white;    
            // }
            $lastNumber = ($lastNumber+1);
            $random ="BIL".str_pad($lastNumber,7,'0',STR_PAD_LEFT);
            $sequence_no = $random;
            $filename = $PNG_WEB_DIR.$number.'_w_'.time().'.png';
            $filenameArray[]= $filename;
            $sequence_noArray[]= $random;
            $color[]= "WHITE";
            QRcode::png($sequence_no, $filename, QR_ECLEVEL_M, 10); 
        }
    }
    // echo $no_of_code;
    // die;
   
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
 

   