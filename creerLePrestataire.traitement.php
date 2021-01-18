<?php
include_once ("_entete.inc.php");

/// Algorithme qui permet de créer un prestataire
if (isset($_POST["creerprestataire"])) {
    if (isset($_POST["nom"])) {
        creerLePrestataire($_POST["nom"]);
        echo "<section class=\"reussie\">Le prestataire est bien crée</section>";
        header("location:consulterToutLesPrestataires.php");
    } else {
        echo "<section class=\"echoue\">Le prestataire n'est pas crée</section>";
    }
}