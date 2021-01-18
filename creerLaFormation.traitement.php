<?php
include_once ("_entete.inc.php");

/// Algorithme qui permet de créer une formation
if (isset($_POST["creerformation"])) {
    if (isset($_POST["intitule"])) {
        creerUneFormation($_POST["intitule"]);
        echo "<section class=\"reussie\">La formation est bien créée</section>";
        header("location:liretouteslesformations.php");
    } else {
        echo "<section class=\"echoue\">La formation n'est pas créée</section>";
    }
}