<?php
include_once ("_gestionBase.inc.php");
include_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;
$dompdf = new Dompdf();
$options = new Options();

$laSession = lirelaSessionAvecInformationParlId($_GET["id"]);
$html = "<link type=\"text/css\" rel=\"stylesheet\" href=\"css/style.css\">";
$html .= "<img alt=\"Logo\" src=\"images/m2l.png\">";
$html .= "<p>".$laSession["id"]."</p>";
$html .= "<p>".$laSession["intitule_formation"]."</p>";
$html .= "<p>".date("d/m/Y", strtotime($laSession["datedebut"]))."</p>";
$html .= "<p>".date("d/m/Y", strtotime($laSession["datefin"]))."</p>";
$html .= "<p>".$laSession["nom_salle"]."</p>";
$html .= "<p>".$laSession["nom_intervenant"]."</p>";
$html .= "<p>".$laSession["nom_prestataire"]."</p>";
$html .= "<hr>";
$html .= "&copy ".date('Y')." Honoré Rasamoelina";
$dompdf->loadHtml($html);
$options->set('isPhpEnabled', true);
$options->set('defaultFont', 'Calibri');
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("pdf/".$laSession["intitule_formation"].".pdf", array("Attachment" => false));
file_put_contents("pdf/".$laSession["intitule_formation"].".pdf", $dompdf->output());

?>