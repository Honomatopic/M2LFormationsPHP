<?php
require_once ("_gestionBase.inc.php");
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;
$dompdf = new Dompdf();
$options = new Options();

$laSession = lireLaFormationParlId($_GET["id"]);
$html = "<link type=\"text/css\" rel=\"stylesheet\" href=\"css/style.css\">";
$html .= "<img alt=\"Logo\" src=\"images/m2l.png\">";
$html .= "<p>".$laSession["id"]."</p>";
$html .= "<p>".$laSession["intitule"]."</p>";
$html .= "<p>".date("d/m/Y", strtotime($laSession["datedebut"]))."</p>";
$html .= "<p>".date("d/m/Y", strtotime($laSession["datefin"]))."</p>";
$html .= "<p>".$laSession["salle"]."</p>";
$html .= "<p>".$laSession["prestataire"]."</p>";
$html .= "<p>".$laSession["intervenant"]."</p>";
$html .= "<hr>";
$html .= "&copy ".date('Y')." Honoré Rasamoelina";

$dompdf->loadHtml($html);
$options->set('isPhpEnabled', true);
$options->set('defaultFont', 'Calibri');
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("pdf/".$laformation["intitule"].".pdf", array("Attachment" => false));
file_put_contents("pdf/".$laformation["intitule"].".pdf", $dompdf->output());

?>