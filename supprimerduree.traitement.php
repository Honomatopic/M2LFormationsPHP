<?php
require_once ("_entete.inc.php");

// Algorithme qui permet de supprimer une durée
if (isset($_POST["supprimer"])) {
    if (isset($_POST["id"])) {
        supprimerLaDuree($_POST["id"]);
        echo "<section class=\"reussie\">La durée est supprimée</section>";
        header("location:liretouteslesdurees.php");
    }
}
