<?php
include_once ("_entete.inc.php");

// Algorithme qui permet de supprimer une salle
if (isset($_POST["supprimersalle"])) {
    if (isset($_POST["id"])) {
        supprimerLaSalle($_POST["id"]);
        echo "<section class=\"reussie\">La salle est supprimée</section>";
        header("location:consulterToutesLesSalles.php");
    }
}
