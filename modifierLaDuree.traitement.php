<?php
include_once ("_entete.inc.php");

// Algorithme permettant de modifier une durée
if (isset($_POST["modifierduree"])) {
    if (isset($_POST["id"], $_POST["datedebut"], $_POST["datefin"])) {
        modifierLaDuree($_POST["id"], $_POST["datedebut"], $_POST["datefin"]);
        echo "<section class=\"reussie\">La durée est bien modifiée</section>";
        header("location:consulterToutesLesDurees.php");
    } else {
        echo "<section class=\"echoue\">La durée n'est pas modifiée</section>";
    }
}
