<?php
require_once ('fpdf/fpdf.php');
$cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8") or die("Pas de connexion à la base de données");
$pdf = new FPDF();
$pdf->AddPage();
$pdf->AddFont('Calibri', '', 'calibri.php');
$pdf->SetFont('Calibri', '', 16);
$req = "SELECT session.id, formation.intitule AS intitule_formation,
        duree.datedebut, duree.datefin,
        salle.nom AS nom_salle,
        intervenant.nom AS nom_intervenant,
        prestataire.nom AS nom_prestataire
        FROM session
        JOIN formation ON session.formation_id = formation.id
        JOIN duree ON session.duree_id = duree.id
        JOIN salle ON session.salle_id = salle.id
        JOIN intervenant ON session.intervenant_id = intervenant.id
        JOIN prestataire ON session.prestataire_id = prestataire.id
        WHERE session.id='" . $_GET["id"] . "'";
$requete_exec = pg_query($cnx, $req);
while ($laSession = pg_fetch_assoc($requete_exec)) {
    $pdf->SetTitle($laSession["intitule_formation"]);
    $pdf->Image('images/m2l.png', 50, 20, 100);
    $pdf->Text(100, 100, $laSession["id"]);
    $pdf->Text(100, 110, utf8_decode($laSession["intitule_formation"]));
    $pdf->Text(90, 120, date("d/m/Y", strtotime($laSession["datedebut"])));
    $pdf->Text(90, 130, date("d/m/Y", strtotime($laSession["datefin"])));
    $pdf->Text(100, 140, utf8_decode($laSession["nom_salle"]));
    $pdf->Text(90, 150, utf8_decode($laSession["nom_intervenant"]));
    $pdf->Text(95, 160, utf8_decode($laSession["nom_prestataire"]));
    $chemin = "pdf/" . utf8_decode($laSession["intitule_formation"]) . ".pdf";
    $pdf->output("", $chemin, utf8_decode($laSession["intitule_formation"]) . ".pdf");
}
pg_close($cnx);
/* file_put_contents("pdf/".$laSession["intitule_formation"].".pdf", $pdf->output('', 'pdf/'.$laSession["intitule_formation"].'.pdf',true)); */

?>