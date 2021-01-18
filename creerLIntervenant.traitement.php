<?php
include_once ("_entete.inc.php");

/// Algorithme qui permet de créer un intervenant
if (isset($_POST["creerintervenant"])) {
    if (isset($_POST["nom"])) {
        creerUnIntervenant($_POST["nom"]);
        echo "<section class=\"reussie\">L'intervenant est bien crée</section>";
        header("location:liretouslesintervenants.php");
    } else {
        echo "<section class=\"echoue\">L'intervenant n'est pas crée</section>";
    }
}