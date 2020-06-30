<?php
require_once("_entete.inc.php");

// Algorithme qui permet de se désinscrire d'une formation
if (isset($_GET["aadherent_id"], $_GET["fformation_id"])) {
    SeDesinscrireAMaFormation($_GET["aadherent_id"], $_GET["fformation_id"]);
    echo "<section class=\"reussie\">Vous êtes désinscris de cette formation</section>";
}