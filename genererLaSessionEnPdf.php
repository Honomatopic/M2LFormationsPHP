<?php

include_once ("_gestionBase.inc.php");
include_once('fpdf/fpdf.php');



$pdf = new FPDF();
$pdf->AddPage();
$pdf->AddFont('Calibri', '', 'calibri.php');
$pdf->SetFont('Calibri', '', 16);
$laSession = consulterLesInformationsDeLaSessionParLId($_GET["id"]);
$pdf->SetTitle($laSession["intitule_formation"]);
$pdf->Image('images/m2l.png', 50, 20, 100);
$pdf->Text(100, 100, $laSession["id_session"]);
$pdf->Text(100, 110, utf8_decode($laSession["intitule_formation"]));
$pdf->Text(90, 120, date("d/m/Y", strtotime($laSession["datedebut"])));
$pdf->Text(90, 130, date("d/m/Y", strtotime($laSession["datefin"])));
$pdf->Text(100, 140, utf8_decode($laSession["nom_salle"]));
$pdf->Text(90, 150, utf8_decode($laSession["nom_intervenant"]));
$pdf->Text(95, 160, utf8_decode($laSession["nom_prestataire"]));
$chemin = "pdf/".utf8_decode($laSession["intitule_formation"]).".pdf";
$pdf->output("",$chemin, utf8_decode($laSession["intitule_formation"]).".pdf");
/*file_put_contents("pdf/".$laSession["intitule_formation"].".pdf", $pdf->output('', 'pdf/'.$laSession["intitule_formation"].'.pdf',true));*/



?>