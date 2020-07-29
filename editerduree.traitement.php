<?php
require_once ("_entete.inc.php");

// Algorithme permettant d'éditer une durée
if (isset($_POST["editerduree"])) {
    if (isset($_POST["id"], $_POST["datedebut"], $_POST["datefin"])) {
        editerLaDuree($_POST["id"], $_POST["datedebut"], $_POST["datefin"]);
        echo "<section class=\"reussie\">La durée est bien édité</section>";
        header("location:liretouteslesdurees.php");
    } else {
        echo "<section class=\"echoue\">La durée n'est pas édité</section>";
    }
}
