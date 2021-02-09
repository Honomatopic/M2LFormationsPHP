<?php
include_once ("_entete.inc.php");

// Algorithme qui permet de supprimer une formation
if (isset($_POST["supprimerformation"])) {
    if (isset($_POST["id"])) {
       supprimerLaFormation($_POST["id"]);
        echo "<section class=\"reussie\">Votre formation est supprimée</section>";
        header("location:consulterToutesLesFormations.php");
    }
}
