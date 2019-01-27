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
$sess_id=$_SESSION['uname'];
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
// print_r($row);

/*$sql_info =  "SELECT * FROM bil_client_mw_report_hcf WHERE entry_date=CURRENT_DATE"; 

$result_info=mysqli_query($con,$sql_info);
 if($result_info) {
        if(mysqli_num_rows($result_info) == 1) {
           $value = mysqli_fetch_assoc($result_info);
          // echo  $yellow['total_bag_y'];
         //  die();
             }else {
        die("Query failed");
    }
}                           
*/


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
?>






<?php require_once('./layouts/top_header.php');?>
    <!-- End Header Top Area -->
    
  <!--   <div class = "container">
        <div class = "row"> 
            <div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br><img src="images/logo.png" style="align-content:center; width: 400px; height:100px;" class="center-block"> 
            <hr style="color:black;">
            <h3 style="text-align:center; font-family: Times New Roman;">Welcome Back, Mr Ashutosh Dubey</h3>
            <h3 style="text-align:center; font-family: Times New Roman;">Hamidia Hospital</h3>
            <h5 style="text-align:center; font-family: Times New Roman;">Airport Rd, Royal Market, Near, Kohefiza, Bhopal, Madhya Pradesh 462001</h5>
            <hr style="color:black;">
            <h5 style="text-align:center; font-family: Times New Roman;">BIL ID: 01259955578 &nbsp &nbsp &nbsp PCB ID: 01259955578 </h5>
            <hr style="color:black;">
            </div>
        </div>
    </div> -->
    
    
    
   <?php include_once('./layouts/menu.php'); ?>
      
   <!-- Main Menu area End-->
	<!-- Breadcomb area Start-->
	<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
							<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="notika-icon notika-form"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Daily Waste Collection Report</h2>
										<p>Check and Download Daily waste collection reports</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
							 <div class="breadcomb-report">
<a  id =""  role='button' data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"    target="_blank" href="<?= $base_url.'admin/dailyreportPDF.php' ?>"><i class="notika-icon notika-sent"></i></a>
                   </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcomb area End-->
	<!-- Alert area start-->
	          <!-- <div class="container">
			   <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="alert-inner">
                       
                        <div class="alert-list">
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> Well done! You successfully read <a href="" class="alert-link">this important alert message.</a>
                            </div>
                            <div class="alert alert-info alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> Heads up! This <a href="" class="alert-link">alert needs your attention</a>,
                                but it's not super important.
                            </div>
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> Warning! Better check yourself, you're <a href="" class="alert-link">not looking too good.</a>
                            </div>
                            <div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> Oh snap! <a href="" class="alert-link">Change a few things up</a>                                and try submitting again.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			</div>
			<br>-->
	<!-- Alert area end-->
 <!-- Data Table area Start-->
    <div class="data-table-area">
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


                        <table id="" class="tg" style="undefined;table-layout: fixed; width: 1070px">
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
                        <?php  
                        //foreach ($reports as $key => $value) { ?>
                            <tr>
                           
                            <td class="tg-f8tx"><?= $yellow['hcf_name']; ?></td>
                            <td class="tg-f8tx"><?= $yellow['hcf_address']; ?></td>
                            <td class="tg-f8tx"><?= $yellow['hcf_type']; ?></td>
                            <td class="tg-f8tx"><?= $yellow['entry_date']; ?></td>
                            <td class="tg-f8tx"><?= $yellow['entry_time']; ?></td>


                            <td class="tg-f8tx"><?= $yellow['total_bag_y']; ?></td>
                            <td class="tg-f8tx"><?= $yellow['total_weight_y']; ?></td>
                             <td class="tg-f8tx"><?= $red['total_bag_r']; ?></td>
                            <td class="tg-f8tx"><?= $red['total_weight_r']; ?></td>
                             <td class="tg-f8tx"><?= $blue['total_bag_b']; ?></td>
                            <td class="tg-f8tx"><?= $blue['total_weight_b']; ?></td>
                             <td class="tg-f8tx"><?= $white['total_bag_w']; ?></td>
                            <td class="tg-f8tx"><?= $white['total_weight_w']; ?></td>

                            
                          </tr>
                        <?php // }
                        ?>
                          
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->
 
<!-- Data Table area Start-->
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
<table class="tg" style="undefined;table-layout: fixed; width: 1070px">
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
  <tr">
   
    <tr>
   
    <td class="tg-f8tx"><?= $yellow_cb['hcf_name']; ?></td>
    <td class="tg-f8tx"><?= $yellow_cb['hcf_address']; ?></td>
    <td class="tg-f8tx"><?= $yellow_cb['hcf_type']; ?></td>
    <td class="tg-f8tx"><?= $yellow_cb['entry_date']; ?></td>
    <td class="tg-f8tx"><?= $yellow_cb['entry_time']; ?></td>


    <td class="tg-f8tx"><?= $yellow_cb['total_bag_y']; ?></td>
    <td class="tg-f8tx"><?= $yellow_cb['total_weight_y']; ?></td>
     <td class="tg-f8tx"><?= $red_cb['total_bag_r']; ?></td>
    <td class="tg-f8tx"><?= $red_cb['total_weight_r']; ?></td>
     <td class="tg-f8tx"><?= $blue_cb['total_bag_b']; ?></td>
    <td class="tg-f8tx"><?= $blue_cb['total_weight_b']; ?></td>
     <td class="tg-f8tx"><?= $white_cb['total_bag_w']; ?></td>
    <td class="tg-f8tx"><?= $white_cb['total_weight_w']; ?></td>

    
  </tr>
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
                        <div class="basic-tb-hd">
                      <?php 
                        $diff_r= $red['total_weight_r'] - $red_cb['total_weight_r'];
                         $diff_y= $yellow['total_weight_y'] - $yellow_cb['total_weight_y'];
                          $diff_b= $blue['total_weight_b'] - $blue_cb['total_weight_b'];
                           $diff_w= $white['total_weight_w'] - $white_cb['total_weight_w'];
                       // echo $diff_y;
                      ?>

                            <h2>Difference in waste collected and received (+/- in Kg)</h2>
							<p>Red Bag:&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <?php echo $diff_r; ?>&nbspKg</p> <br>
							<p>Yellow Bag: &nbsp &nbsp &nbsp &nbsp &nbsp<?php echo $diff_y; ?>&nbspKg</p> <br>
							<p>Blue Bag: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<?php echo $diff_b; ?>&nbspKg</p> <br>
							<p>White Bag: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <?php echo $diff_w; ?>&nbspKg </p> <br>
                           </div>
						</div>   
                     </div>
					 </div>
					 </div>
					 </div>




 <!-- Start Footer area-->
 <!-- Start Footer area-->
<?php require_once('./layouts/footer.php');?>
<!-- <script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.min.js'></script> -->
        <!-- If you want to use jquery 2+: https://code.jquery.com/jquery-2.1.0.min.js -->
        <script type='text/javascript'>
        $(document).ready(function () {

            console.log("HELLO")
            function exportTableToCSV($table, filename) {
                var $headers = $table.find('tr:has(th)')
                    ,$rows = $table.find('tr:has(td)')

                    // Temporary delimiter characters unlikely to be typed by keyboard
                    // This is to avoid accidentally splitting the actual contents
                    ,tmpColDelim = String.fromCharCode(11) // vertical tab character
                    ,tmpRowDelim = String.fromCharCode(0) // null character

                    // actual delimiter characters for CSV format
                    ,colDelim = '","'
                    ,rowDelim = '"\r\n"';

                    // Grab text from table into CSV formatted string
                    var csv = '"';
                    csv += formatRows($headers.map(grabRow));
                    csv += rowDelim;
                    csv += formatRows($rows.map(grabRow)) + '"';

                    // Data URI
                    var csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

                // For IE (tested 10+)
                if (window.navigator.msSaveOrOpenBlob) {
                    var blob = new Blob([decodeURIComponent(encodeURI(csv))], {
                        type: "text/csv;charset=utf-8;"
                    });
                    navigator.msSaveBlob(blob, filename);
                } else {
                    $(this)
                        .attr({
                            'download': filename
                            ,'href': csvData
                            //,'target' : '_blank' //if you want it to open in a new window
                    });
                }

                //------------------------------------------------------------
                // Helper Functions 
                //------------------------------------------------------------
                // Format the output so it has the appropriate delimiters
                function formatRows(rows){
                    return rows.get().join(tmpRowDelim)
                        .split(tmpRowDelim).join(rowDelim)
                        .split(tmpColDelim).join(colDelim);
                }
                // Grab and format a row from the table
                function grabRow(i,row){
                     
                    var $row = $(row);
                    //for some reason $cols = $row.find('td') || $row.find('th') won't work...
                    var $cols = $row.find('td'); 
                    if(!$cols.length) $cols = $row.find('th');  

                    return $cols.map(grabCol)
                                .get().join(tmpColDelim);
                }
                // Grab and format a column from the table 
                function grabCol(j,col){
                    var $col = $(col),
                        $text = $col.text();

                    return $text.replace('"', '""'); // escape double quotes

                }
            }


            // This must be a hyperlink
            $("#export").click(function (event) {
                // var outputFile = 'export'
                var r = confirm('Are You Sure To Download File');
                if(r){
                var outputFile = window.prompt("What do you want to name your output file") || 'export';
                outputFile = outputFile.replace('.csv','') + '.csv'
                 
                // CSV
                exportTableToCSV.apply(this, [$('#dvData > table'), outputFile]);
                    
                }
                
                //IF CSV, don't do event.preventDefault() or return false
                // We actually need this to be a typical hyperlink
            });
        });
    </script>


    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<style type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></style>
<style type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"></style>

    <script type="text/javascript">
  $(document).ready(function() {
    $('#report1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

</script>

    
