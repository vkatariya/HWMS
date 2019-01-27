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

     
<?php 
include('../db_config.php'); // Database configuration file
$sess_id=$_SESSION['uname'];


if(isset($_POST['annualreportyear']))
{
    $select_year = $_POST['year'];
    //echo $select_year;  

}else
{echo "error";}



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

?>     

<?php require_once('./layouts/top_header.php');?>
   
    
   <?php include_once('./layouts/menu.php'); ?>
            
   <!-- Main Menu area End-->
    <!-- Breadcomb area Start-->
    <div class="breadcomb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="breadcomb-wp">
                                    <div class="breadcomb-icon">
                                        <i class="notika-icon notika-form"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>Annual Waste Collection Report &nbsp <?php echo  $select_year;  ?></h2>
                                        <p>Check your Annual Waste Collection Records.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="breadcomb-report">
<a href="javascript:void(0)" id ="export"  role='button' data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></a>
<a target="_blank" href="<?= $base_url.'admin/anualReportpdf.php?year='.$select_year; ?>" title="Download in PDF">download</a>
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcomb area End-->
    <!-- Alert area start-->
           <!--    <div class="container">
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
            <br> -->
    <!-- Alert area end-->
 <!-- Data Table area Start-->
  
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="data-table-list">
    <div class="basic-tb-hd">
    <h2><?php echo  $select_year;  ?>&nbsp;Year Waste Collection Data</h2>
    </div>
                           
    <div class="table-responsive" id="dvData"> 
        <table id="report" class="table table-striped table-bordered">
            <thead>
                <tr>
                    
                    <th>Month</th>
                    <th>Yellow</th> 
                    <th>Blue</th>
                    <th>Red</th>
                    <th>White</th>
                    <th>Total</th>
              </tr>
            </thead>
            <tbody>                             
            <?php 

            function groupArray($arr, $group, $preserveGroupKey = false, $preserveSubArrays = false) {
            $temp = array();
            foreach($arr as $key => $value) {
            $groupValue = $value[$group];
            if(!$preserveGroupKey)
            {
            unset($arr[$key][$group]);
            }
            if(!array_key_exists($groupValue, $temp)) {
            $temp[$groupValue] = array();
            }

            if(!$preserveSubArrays){
            $data = count($arr[$key]) == 1? array_pop($arr[$key]) : $arr[$key];
            } else {
            $data = $arr[$key];
            }
            $temp[$groupValue][] = $data;
            }
            return $temp;
            }
            $reportResult =$annualReport= array();
            $sql ="SELECT MONTHNAME(`entry_date`) as monthName,SUM(`bag_weight`) as weight,`bag_color` FROM `bil_client_mw_report_hcf`   WHERE Year(entry_date) = ".$select_year." AND    username_bil = ".$sess_id." GROUP BY  MONTH(`entry_date`),`bag_color`";

            $result=mysqli_query($con,$sql);
            if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result))
            {
            $reportResult[]=  $row; 
            }
            }

            // print_r($reportResult);
            // die;
            if(!empty($reportResult)){
            $reportResults = groupArray($reportResult, "monthName",true);
            foreach ($reportResults as $key => $reportResults) {
            $annualReport[$key] = groupArray($reportResults, "bag_color",true);
            }
            }

            $colume1=$colume2=$colume3=$colume4=$colume5=0;
            $monthCount = count($annualReport);
            if(!empty($annualReport)){
            foreach ($annualReport as $key => $value) {
            $total = 0;
            ?>
            <tr>
            <td class="tg-f8tx"><?= $key; ?></td>
            <td class="tg-f8tx"><?php echo $rowTotal=isset($value['YELLOW'])?$value['YELLOW'][0]['weight']:0;$total+=$rowTotal;$colume1+=$rowTotal; ?></td>
            <td class="tg-f8tx"><?php echo $rowTotal=isset($value['BLUE'])?$value['BLUE'][0]['weight']:0;$total+=$rowTotal;$colume2+=$rowTotal; ?></td>
            <td class="tg-f8tx"><?php echo $rowTotal=isset($value['RED'])?$value['RED'][0]['weight']:0;;$total+=$rowTotal;$colume3+=$rowTotal; ?></td>
            <td class="tg-f8tx"><?php echo $rowTotal=isset($value['WHITE'])?$value['WHITE'][0]['weight']:0;$total+=$rowTotal;$colume4+=$rowTotal; ?></td>
            <td class="tg-f8tx"><?= $total;$colume5+=$total; ?></td>

            </tr>
            <?php }
            }else{ ?>
            <tr>
            <td colspan="6" class="alert alert-danger">No Result</td>
            </tr>
            <?php }
            ?>



            </tbody>
            <tfoot>
            <tr>
            <td>Average. per month</td>
            <td><?= number_format($colume1/$monthCount, 2); ?></td>
            <td><?= number_format($colume2/$monthCount, 2); ?></td>    
            <td><?= number_format($colume3/$monthCount, 2); ?></td>               
            <td><?= number_format($colume4/$monthCount, 2); ?></td>
            <td><?= number_format($colume5/$monthCount, 2); ?></td>                                       

            </tr>
            </tfoot>
            <tfoot>
            <tr>
            <td>Total</td>
            <td><?= $colume1 ?></td>
            <td><?= $colume2 ?></td>    
            <td><?= $colume3 ?></td>               
            <td><?= $colume4 ?></td>
            <td><?= $colume5 ?></td>                                       

            </tr>
            </tfoot>
        </table>
    </div>
    <br> <br>
                        
    <div class="table-responsive">
        <table id="" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Incineration Waste</th>
                    <th><?= $colume1 ?></th>
                    
                </tr>
                <tr>
                    <th>Autoclave Waste</th>
                    <th><?= $colume2 + $colume3+$colume4 ?></th>
                    
                </tr>
            </thead>
            
            
        </table>
    </div>
                        
</div>
                </div>
            </div>
        </div>
    </div>




    <!-- Data Table area End-->
   <!-- Start Footer area-->
<?php require_once('./layouts/footer.php');?>

 <!-- Scripts ----------------------------------------------------------- -->
       <script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.min.js'></script> 
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
                //alert(r);
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
    $('#report').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

</script>