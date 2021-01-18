<?php
include_once ("_entete.inc.php");

// Algorithme permettant d'éditer un prestataire
if (isset($_POST["editerprestataire"])) {
    if (isset($_POST["id"], $_POST["nom"])) {
        editerlePrestataire($_POST["id"], $_POST["nom"]);
        echo "<section class=\"reussie\">Le prestataire est bien édité</section>";
        header("location:liretouslesprestataires.php");
    } else {
        echo "<section class=\"echoue\">Le prestataire n'est pas édité</section>";
    }
}
