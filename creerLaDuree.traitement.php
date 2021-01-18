<?php
include_once ("_entete.inc.php");

/// Algorithme qui permet de créer une durée
if (isset($_POST["creerduree"])) {
    if (isset($_POST["datedebut"], $_POST["datefin"])) {
        creerLaDuree($_POST["datedebut"], $_POST["datefin"]);
        echo "<section class=\"reussie\">La durée est bien créée</section>";
        header("location:consulterToutesLesDurees.php");
    } else {
        echo "<section class=\"echoue\">La durée n'est pas créée</section>";
    }
}