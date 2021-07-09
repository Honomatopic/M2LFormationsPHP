<?php
require_once ("_entete.inc.php");

// Algorithme qui permet de se désinscrire d'une session
if (isset($_GET["eemploye_id"], $_GET["ssession_id"])) {
    $cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8") or die("Pas de connexion à la base de données");
    $req = "DELETE FROM inscrire WHERE employe_id='".$_GET["eemploye_id"]."' AND session_id='".$_GET["ssession_id"]."'";
    pg_query($cnx, $req);
    echo "<section class=\"reussie\">Vous êtes désinscris de cette session</section>";
    header("location:espaceDeLEmploye.php");
    pg_close($cnx);
}