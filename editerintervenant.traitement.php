<?php
include_once ("_entete.inc.php");

// Algorithme permettant d'éditer un intervenant
if (isset($_POST["editerintervenant"])) {
    if (isset($_POST["id"], $_POST["nom"])) {
        editerlIntervenant($_POST["id"], $_POST["nom"]);
        echo "<section class=\"reussie\">L'intervenant est bien édité</section>";
        header("location:liretouslesintervenants.php");
    } else {
        echo "<section class=\"echoue\">L'intervenant n'est pas édité</section>";
    }
}
