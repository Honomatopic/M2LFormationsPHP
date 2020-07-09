<?php
require_once("_entete.inc.php");

/// Algorithme qui permet de créer une formation
if (isset($_POST["creer"])) {
    if (isset($_POST["intitule"], $_POST["datedebut"], $_POST["datefin"], $_POST["lieu"], $_POST["prestataire"])) {
        creerUneFormation($_POST["intitule"], $_POST["datedebut"], $_POST["datefin"], $_POST["lieu"], $_POST["prestataire"]);
        echo "<section class=\"reussie\">La formation est bien créée</section>";
    } else {
        echo "<section class=\"echoue\">La formation n'est pas créée</section>";
    }
}