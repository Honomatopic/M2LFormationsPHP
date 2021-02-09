<?php
include_once ("_entete.inc.php");

// Algorithme qui permet de supprimer un intervenant
if (isset($_POST["supprimerintervenant"])) {
    if (isset($_POST["id"])) {
        supprimerLIntervenant($_POST["id"]);
        echo "<section class=\"reussie\">L'intervenant est supprimé</section>";
        header("location:consulterToutLesIntervenants.php");
    }
}
