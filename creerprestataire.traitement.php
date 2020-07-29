<?php
require_once ("_entete.inc.php");

/// Algorithme qui permet de créer un prestataire
if (isset($_POST["creerprestataire"])) {
    if (isset($_POST["nom"])) {
        creerUnPrestataire($_POST["nom"]);
        echo "<section class=\"reussie\">Le prestataire est bien crée</section>";
        header("location:liretouslesprestataires.php");
    } else {
        echo "<section class=\"echoue\">Le prestataire n'est pas crée</section>";
    }
}