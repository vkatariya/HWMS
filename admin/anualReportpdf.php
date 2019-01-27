<?php 
session_start();
include('../db_config.php'); // Database configuration file
$sess_id=$_SESSION['uname'];
$select_year = $_REQUEST['year'];
?>


<?php 
require_once("dompdf/vendor/autoload.php"); 

/* Start to develop here. Best regards https://php-download.com/ */

Dompdf\Autoloader::register();


// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
//$dompdf->loadHtml('hello world');
// print_r($_POST);
// die;
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

$html = '<link rel="stylesheet" href="css/bootstrap.min.css"><div class="data-table-list">
    <div class="basic-tb-hd text text-center">
    <h2>'.$select_year.'&nbsp;Year Waste Collection Data</h2>
    </div>
                           
    <div class="table-responsive" id="dvData"> 
        <table id="" class="table table-striped table-bordered">
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
            <tbody>';                             

            if(!empty($annualReport)){
            foreach ($annualReport as $key => $value) {
            $total = 0;
            $html.='<tr>';
            $html.='<td class="tg-f8tx">'.$key.'</td>';
            $html.='<td class="tg-f8tx">'.$rowTotal=isset($value['YELLOW'])?$value['YELLOW'][0]['weight']:0;$total+=$rowTotal;$colume1+=$rowTotal.'</td>';
            $html.='<td class="tg-f8tx">'.$rowTotal=isset($value['BLUE'])?$value['BLUE'][0]['weight']:0;$total+=$rowTotal;$colume2+=$rowTotal.'</td>';
            $html.='<td class="tg-f8tx">'.$rowTotal=isset($value['RED'])?$value['RED'][0]['weight']:0;;$total+=$rowTotal;$colume3+=$rowTotal.'</td>';
            $html.='<td class="tg-f8tx">'.$rowTotal=isset($value['WHITE'])?$value['WHITE'][0]['weight']:0;$total+=$rowTotal;$colume4+=$rowTotal.'</td>';
            $html.='<td class="tg-f8tx">'.$total;$colume5+=$total.'></td>';

            $html.='</tr>';
            }
            }else{ 
            $html.='<tr>';
            $html.='<td colspan="6" class="alert alert-danger">No Result</td>';
            $html.='</tr>';
            }



            $html.='</tbody>
            <tfoot>
            <tr>
            <td>Average. per month</td>';
            $html.='<td>'.number_format($colume1/$monthCount, 2).'</td>';
            $html.='<td>'.number_format($colume2/$monthCount, 2).'</td>';    
            $html.='<td>'.number_format($colume3/$monthCount, 2).'</td>';               
            $html.='<td>'.number_format($colume4/$monthCount, 2).'</td>';
            $html.='<td>'.number_format($colume5/$monthCount, 2).'</td>';                                       

            $html.='</tr>
            </tfoot>
            <tfoot>
            <tr>
            <td>Total</td>';
            $html.='<td>'.$colume1.'</td>';
            $html.='<td>'.$colume2.'</td>';    
            $html.='<td>'.$colume3.'</td>';              
            $html.='<td>'.$colume4.'</td>';
            $html.='<td>'.$colume5.'</td>';                                       

            $html.='</tr>
            </tfoot>
        </table>
    </div>
    <br> <br>
                        
    <div class="table-responsive">
        <table id="" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Incineration Waste</th>';
                    $html.='<th>'.$colume1.'</th>';
                $html.='</tr><tr><th>Autoclave Waste</th>';
                    $html.='<th>'.($colume2 + $colume3+$colume4).'</th>';
                $html.='</tr></thead></table></div></div>';
 $dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('test',array("Attachment"=>0));
?>
