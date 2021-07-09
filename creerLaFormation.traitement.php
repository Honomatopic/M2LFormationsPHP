<?php
require_once ("_entete.inc.php");

/// Algorithme qui permet de créer une formation
if (isset($_POST["creerformation"])) {
    if (isset($_POST["intitule"])) {
        $req = "INSERT INTO formation (intitule) VALUES ('".$_POST["intitule"]."')";
        pg_query($cnx, $req);
        echo "<section class=\"reussie\">La formation est bien créée</section>";
        header("location:consulterToutesLesFormations.php");
    } else {
        echo "<section class=\"echoue\">La formation n'est pas créée</section>";
    }
    pg_close($cnx);
}