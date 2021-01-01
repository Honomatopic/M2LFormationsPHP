<?php
include_once ("_entete.inc.php");

// Algorithme permettant d'éditer une formation
if (isset($_POST["editerformation"])) {
    if (isset($_POST["id"], $_POST["intitule"])) {
        editerLaFormation($_POST["id"], $_POST["intitule"]);
        echo "<section class=\"reussie\">Votre formation est bien édité</section>";
        header("location:liretouteslesformations.php");
    } else {
        echo "<section class=\"echoue\">Votre formation n'est pas édité</section>";
    }
}
