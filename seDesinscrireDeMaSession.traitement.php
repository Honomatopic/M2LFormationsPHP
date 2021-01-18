<?php
include_once ("_entete.inc.php");

// Algorithme qui permet de se désinscrire d'une session
if (isset($_GET["eemploye_id"], $_GET["ssession_id"])) {
    SeDesinscrireAMaSession($_GET["eemploye_id"], $_GET["ssession_id"]);
    echo "<section class=\"reussie\">Vous êtes désinscris de cette session</section>";
    header("location:espaceemploye.php");
}