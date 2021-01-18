<?php
include_once ("_entete.inc.php");

// Algorithme qui permet de supprimer un prestataire
if (isset($_POST["supprimerprestataire"])) {
    if (isset($_POST["id"])) {
        supprimerlePrestataire($_POST["id"]);
        echo "<section class=\"reussie\">Le prestataire est supprimé</section>";
        header("location:consulterToutLesPrestataires.php");
    }
}
