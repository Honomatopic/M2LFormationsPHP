<?php
require_once ("_entete.inc.php");

// Algorithme qui permet de supprimer une session
if (isset($_POST["supprimersession"])) {
    if (isset($_POST["id"])) {
        supprimerlaSession($_POST["id"]);
        echo "<section class=\"reussie\">La session est supprimée</section>";
        header("location:liretouteslessessions.php");
    }
}