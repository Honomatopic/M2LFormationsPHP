<?php
require_once("_entete.inc.php");

// Algorithme permettant de s'inscrire à une formation
if (isset($_GET["employe_id"], $_GET["formation_id"])) {
    sinscrireAMaFormation($_GET["employe_id"], $_GET["formation_id"]);
    echo "<section class=\"reussie\">Vous etes bien inscris à la formation</section>";
}
