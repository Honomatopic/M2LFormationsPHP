<?php
include_once ("_entete.inc.php");

// Algorithme permettant de modifier un prestataire
if (isset($_POST["modifierprestataire"])) {
    if (isset($_POST["id"], $_POST["nom"])) {
        modifierLePrestataire($_POST["id"], $_POST["nom"]);
        echo "<section class=\"reussie\">Le prestataire est bien modifié</section>";
        header("location:consulterToutLesPrestataires.php");
    } else {
        echo "<section class=\"echoue\">Le prestataire n'est pas modifié</section>";
    }
}
