<?php
require_once("_entete.inc.php");

// Algorithme qui permet de supprimer un adhérent en fonction de son id
if (isset($_POST["supprimer"])) {
    if (isset($_POST["id"])) {
        supprimerUnAdherent($_POST["id"]);
        echo "<section class=\"reussie\">Votre espace est supprimée</section>";
        header("location:index.php");
    }
}
