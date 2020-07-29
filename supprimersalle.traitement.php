<?php
require_once ("_entete.inc.php");

// Algorithme qui permet de supprimer une salle
if (isset($_POST["supprimersalle"])) {
    if (isset($_POST["id"])) {
        supprimerlaSalle($_POST["id"]);
        echo "<section class=\"reussie\">La salle est supprimée</section>";
        header("location:liretouteslessalles.php");
    }
}
