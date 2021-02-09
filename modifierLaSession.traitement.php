<?php
include_once ("_entete.inc.php");

// Algorithme permettant de modifier une session de formation
if (isset($_POST["modifiersession"])) {
    if (isset($_POST["id"], $_POST["formation"], $_POST["duree"], $_POST["salle"], $_POST["intervenant"], $_POST["prestataire"])) {
        modifierLaSession($_POST["id"], $_POST["formation"], $_POST["duree"], $_POST["salle"], $_POST["intervenant"], $_POST["prestataire"]);
        echo "<section class=\"reussie\">La session de formation est bien modifiée</section>";
        header("location:consulterToutesLesSessions.php");
    } else {
        echo "<section class=\"echoue\">La session de formation n'est pas modifiée</section>";
    }
}
