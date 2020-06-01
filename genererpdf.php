<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;
$html = require_once ("_entete.inc.php");
     
$laformation = lireLaFormationParlId($_GET["id"]);
$html .="<p>".$laformation["id"]."</p>";
$html .="<p>".$laformation["intitule"]."</p>";
$html .="<p>".$laformation["datedebut"]."</p>";
$html .="<p>".$laformation["datefin"]."</p>";
$html .="<p>".$laformation["lieu"]."</p>";
$html .= "<p>".$laformation["prestataire"]."</p>";

$html .=require_once ("_piedpage.inc.php");

$dompdf = new DOMPDF();
$options = new Options();
$options->setIsPhpEnabled(true);
$dompdf->setPaper('A4', 'landscape');
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream("formation".$_GET["id"].".pdf", array("Attachment" => true));