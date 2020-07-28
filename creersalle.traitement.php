<?php
require_once ("_entete.inc.php");

/// Algorithme qui permet de créer une salle
if (isset($_POST["creersalle"])) {
    if (isset($_POST["nom"])) {
        creerUneSalle($_POST["nom"]);
        echo "<section class=\"reussie\">La salle est bien créée</section>";
    } else {
        echo "<section class=\"echoue\">La salle n'est pas créée</section>";
    }
}