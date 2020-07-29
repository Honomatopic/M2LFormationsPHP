<?php
require_once ("_entete.inc.php");

// Algorithme permettant d'éditer une session de formation
if (isset($_POST["editersession"])) {
    if (isset($_POST["id"], $_POST["formation"], $_POST["duree"], $_POST["salle"], $_POST["intervenant"], $_POST["prestataire"])) {
        editerlaSession($_POST["id"], $_POST["formation"], $_POST["duree"], $_POST["salle"], $_POST["intervenant"], $_POST["prestataire"]);
        echo "<section class=\"reussie\">La session de formation est bien éditée</section>";
        header("location:liretouteslessessions.php");
    } else {
        echo "<section class=\"echoue\">La session de formation n'est pas éditée</section>";
    }
}
