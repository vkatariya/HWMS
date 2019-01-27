<?php 
require_once("vendor/autoload.php"); 

/* Start to develop here. Best regards https://php-download.com/ */

Dompdf\Autoloader::register();


// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
//$dompdf->loadHtml('hello world');


$html = '
<style>

div{
   
    
    
    border-radius: 15px;
    border: 10px solid #54BE73; 
    outline: 5px solid #54BE73;
}
article {
  text-align: center;
 }
h1{
  color:#54BE73;
  text-align :center;
}
h7{
  color:Black;
  text-align :center;
}

</style>
<div>
          <p align="Left">
            <img src="Logo.jpg" width="100px;" height="100px;"/>
             <h1 >Bhopal Incinerators Ltd.</h1>
        <h7><Airport Rd, Royal Market, Near, Kohefiza, Bhopal, Madhya Pradesh 462001</h6>
     

 
      <hr width="500px;"><br>
              <h1 align="center">CERTIFICATE</h1>
              <hr width="200px;">
     <article>
     <p><b>This is to certify that Bhopal Incinerator Ltd.</b> is running a common Bio-Medical Waste Treatment facility (CBWTF).</p><p>Which is authorized by M.P. Pollution Control Boards (CBWTF).Further certified that Bhopal Incinerator Ltd. has entered into an agreement with____________________________________________________________________________<br>

        ____________________________________________________________________________</p>

        <p> for Collection,Reception,Transport,Storge,Treatment & Final disposal of Bio-Medical Waste of the bove institution.</p>
  
            <table border="0.1px;" border-radius: 15px; align="center" width ="500px;" height="100%;">
            <tr><td></br
                           This agreement is valid:<br>   
                                            For ________________________<br>
                                            From_______________________ to 31 DEC 2019</br>
           </td>
           </tr>
         </table>
     <p>This certification is given, to enable the institution, to apply for Fresh/Renewal of authoriation under Bio-Medical Waste rules 2016.</p>
 <p>This Certificate No. ....... Expires On 31st Dec. 2019</p>
<p>
 <table align="right">
            <tr><td>Managing Director</td></tr>
         </table></p>
   </article>
   
</div>
</scetion>
       ';
 $dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('test',array("Attachment"=>0));
?>