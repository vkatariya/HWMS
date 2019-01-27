<?php 
require_once("vendor/autoload.php"); 

/* Start to develop here. Best regards https://php-download.com/ */

Dompdf\Autoloader::register();


// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$document = new Dompdf();
//$dompdf->loadHtml('hello world');

//$document->loadHtml($html);
//$page = file_get_contents("cat.html");

//$document->loadHtml($page);

$connect = mysqli_connect("localhost", "root", "", "testing");

$query = "SELECT * FROM crud";
$result = mysqli_query($connect, $query);

$output = "
 <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<table>
 <tr>
  <th>Roll</th>
  <th> Name</th>
  
 </tr>
";

while($row = mysqli_fetch_array($result))
{
 $output .= '
  <tr>
   <td>'.$row["rollno"].'</td>
   <td>'.$row["fname"].'</td>
   
  </tr>
 ';
}


$output .= '</table>';

//echo $output;

$document->loadHtml($output);

//set page size and orientation

$document->setPaper('A4', 'landscape');

//Render the HTML as PDF

$document->render();

//Get output of generated pdf in Browser

$document->stream("Webslesson", array("Attachment"=>0));
//1  = Download
//0 = Preview


?>