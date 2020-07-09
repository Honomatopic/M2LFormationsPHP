<?php
require_once("_entete.inc.php");

// Algorithme permettant d'éditer une formation
if (isset($_POST["editerformation"])) {
    if (isset($_POST["id"], $_POST["intitule"], $_POST["datedebut"], $_POST["datefin"], $_POST["lieu"], $_POST["prestataire"])) {
        editerLaFormation($_POST["id"], $_POST["intitule"], $_POST["datedebut"], $_POST["datefin"], $_POST["lieu"], $_POST["prestataire"]);
        echo "<section class=\"reussie\">Votre formation est bien édité</section>";
    } else {
        echo "<section class=\"echoue\">Votre formation n'est pas édité</section>";
    }
}
