<?php
require_once ("_gestionBase.inc.php");
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;
$dompdf = new Dompdf();
$options = new Options();

$laformation = lireLaFormationParlId($_GET["id"]);
$html = "<link type=\"text/css\" rel=\"stylesheet\" href=\"css/style.css\">";
$html .= "<img alt=\"Logo\" src=\"images/m2l.png\">";
$html .= "<p>".$laformation["id"]."</p>";
$html .= "<p>".$laformation["intitule"]."</p>";
$html .= "<p>".$laformation["datedebut"]."</p>";
$html .= "<p>".$laformation["datefin"]."</p>";
$html .= "<p>".$laformation["lieu"]."</p>";
$html .= "<p>".$laformation["prestataire"]."</p>";
$html .= "<hr>";
$html .= "&copy ".date('Y')." Honoré Rasamoelina";

$dompdf->loadHtml($html);
$options->set('isPhpEnabled', true);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("pdf/".$laformation["intitule"].".pdf", array("Attachment" => true));
file_put_contents("pdf/".$laformation["intitule"].".pdf", $dompdf->output());

?>