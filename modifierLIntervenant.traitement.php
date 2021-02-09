<?php
include_once ("_entete.inc.php");

// Algorithme permettant de modifier un intervenant
if (isset($_POST["modifierintervenant"])) {
    if (isset($_POST["id"], $_POST["nom"])) {
        modifierLIntervenant($_POST["id"], $_POST["nom"]);
        echo "<section class=\"reussie\">L'intervenant est bien modifié</section>";
        header("location:consulterToutLesIntervenants.php");
    } else {
        echo "<section class=\"echoue\">L'intervenant n'est pas modifié</section>";
    }
}
