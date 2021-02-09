<?php
include_once ("_entete.inc.php");

// Algorithme permettant de s'inscrire à une session de formation
if (isset($_GET["employe_id"], $_GET["session_id"])) {
    sInscrireALaSession($_GET["employe_id"], $_GET["session_id"]);
    echo "<section class=\"reussie\">Vous etes bien inscris à la session</section>";
    header("location:consulterLesSessions.php");
}
