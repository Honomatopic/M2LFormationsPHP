<?php
require_once ("_entete.inc.php");

// Algorithme qui permet de se désinscrire d'une session
if (isset($_GET["eemploye_id"], $_GET["ssession_id"])) {
    $req = "DELETE FROM inscrire WHERE employe_id='".$_GET["eemploye_id"]."' AND session_id='".$_GET["ssession_id"]."'";
    pg_query($cnx, $req);
    echo "<section class=\"reussie\">Vous êtes désinscris de cette session</section>";
    header("location:espaceDeLEmploye.php");
    pg_close($cnx);
}