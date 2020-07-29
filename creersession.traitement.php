<?php
require_once ("_entete.inc.php");

/// Algorithme qui permet de créer une session de formation
if (isset($_POST["creersession"])) {
    if (isset($_POST["formation"], $_POST["duree"], $_POST["salle"], $_POST["intervenant"], $_POST["prestataire"])) {
        creerUneSession($_POST["formation"], $_POST["duree"], $_POST["salle"], $_POST["intervenant"], $_POST["prestataire"]);
        echo "<section class=\"reussie\">La session de formation est bien créée</section>";
        header("location:liretouteslessessions.php");
    } else {
        echo "<section class=\"echoue\">La session de formation n'est pas créée</section>";
    }
}