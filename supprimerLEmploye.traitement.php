<?php
include_once ("_entete.inc.php");

// Algorithme qui permet de supprimer un employé
if (isset($_POST["supprimeremploye"])) {
    if (isset($_POST["id"])) {
        supprimerlEmploye($_POST["id"]);
        echo "<section class=\"reussie\">Votre employé est supprimé</section>";
        header("location:liretouslesemployes.php");
    }
}
