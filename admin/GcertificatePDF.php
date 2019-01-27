
<?php session_start(); 
if(!isset($_SESSION['uname'])){
    header('Location:../login.php');
}
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
$number = $_POST['number'];
$o_name = $_POST['o_name'];
$for_name = $_POST['for_name'];
$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];
$address = $_POST['address'];
$html = '
<style>
#section{
border: 5px solid #01a95b;
    padding: 7px;
    margin: 10px 10px;
    border-radius: 20px;
}
#section .innerSection{
      border: 5px solid #01a95b;
    padding: 20px;
    /* margin: 50px; */
    border-radius: 20px;
}
#section .logo{
  width: 15%;
  display: inline-block;
  position: relative;
}
#section .logo img{
  width: 100%;
  display: inline-table;
  /*border: 1px solid red;*/
}
#section .address{
  width: 74%;
  display: inline-block;
  position: relative;
  padding: 0px;
    margin: 0px;
    top: -50px;
    /*border: 1px solid red;*/
}
#section .address h1{
  text-transform: uppercase;
  /*border: 1px solid red;*/
  text-align: center;
  color: #00a85b;
  font-size: 20px;
  margin: 0px;
}
#section .address h3{
  /*text-transform: uppercase;*/
  /*border: 1px solid red;*/
  text-align: center;
  font-size: 15px;
  color: #000;
  margin: 0px;
}
#section .certification{
  text-align: center;
  font-weight: bolder;
  text-decoration: underline;
  color: #00a85b;
  font-size: 25px;
}
.breakLine{
  color: 000000;
      border: 1px solid;
}
.header{
  border: 1px solid red;
}
#section .generatedNumbr{
      padding-left: 115px;
    color: red;
    font-family: cursive;
    
}
#body{
  margin: 40px;
}
#body .blankSpace{
  width: 100%;
    border-bottom: 2px solid;
    padding: 10px;
    color: blue;
}
#agreementSection{
  text-align: left;
}
#agreementSection .agreement{
  border: 1px solid;
  margin: 0px 100px;
  border-radius: 15px;
    padding: 12px;
}
#agreementSection .agreement div{
  line-height: 30px;
}
.certificationNumber{
      color: red;
    border: 1px solid black;
    padding: 6px 70px;
    font-family: cursive;
}
</style>

<div id="section">
  <div class="innerSection">

    <div id="header">
      <div class="logo">
        <img src="img/Logo.jpg"  />
      </div>
      <div class="address">
        <h1>Bhopal Incinerators Limited</h1>
        <h3>6/5, Sector-H Industial Area, Govindpura, Bhopal -462 023 ( M. P.) <br/> Ph. 2580515, E-mail : bpl_incinerators@yahoo.com
        </h3>
        <hr class="breakLine" />
      </div>
     
      <div class="certification">CERTIFICATE</div>
    </div>

    <div id="body">
      <p><b>This is to certify that Bhopal Incinerator Ltd.</b> is running a common <br>Bio-Medical Waste Treatment facility (CBWTF).</p><p>Which is authorized by M.P. Pollution Control Boards (CBWTF).<br/><br/>Further certified that Bhopal Incinerator Ltd. has entered into an agreement with<div class="blankSpace">'.$o_name.'</div><div class="blankSpace">'.$address.'</div>
      </p>

      <p> for Collection,Reception,Transport,Storge,Treatment & Final disposal of <br>Bio-Medical Waste of the bove institution.</p>

      <div id="agreementSection">
        <div class="agreement">
          <div><strong>This agreement is valid:</strong></div>
          <div><strong>For</strong> <span class=""><i>'.$for_name.'</i></span></div>
          <div><strong>From&nbsp;&nbsp;</strong><span class="">'.$from_date.'</span><strong>&nbsp;to&nbsp;&nbsp;</strong><span class="">'.$to_date.'</span></div>
        </div>
      </div>
      <div>
      <br/>
        <p>This certification is given, to enable the institution, to apply for Fresh/Renewal of authoriation under Bio-Medical Waste rules 2016.</p>
        <p>This Certificate No <span class="certificationNumber">'.$_SESSION['uname'].'</span> Expires On 31st Dec. 2019</p>
      </div>
      <div style="text-align: right;">
        <div>
        <img src="img/logo/logo.png" style="padding-left: 50px" />
        </div>
        <div>Managing Director</div>
      </div>

    </div>

  <div>
<div>
';
 $dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('test',array("Attachment"=>0));
?>