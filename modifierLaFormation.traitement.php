<?php
include_once ("_entete.inc.php");

// Algorithme permettant de modifier une formation
if (isset($_POST["modifierformation"])) {
    if (isset($_POST["id"], $_POST["intitule"])) {
        modifierLaFormation($_POST["id"], $_POST["intitule"]);
        echo "<section class=\"reussie\">Votre formation est bien modifiée</section>";
        header("location:consulterToutesLesFormations.php");
    } else {
        echo "<section class=\"echoue\">Votre formation n'est pas modifiée</section>";
    }
}
