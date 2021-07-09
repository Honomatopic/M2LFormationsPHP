<?php
require_once ("_entete.inc.php");

/// Algorithme qui permet de créer un intervenant
if (isset($_POST["creerintervenant"])) {
    if (isset($_POST["nom"])) {
        $req = "INSERT INTO intervenant (nom) VALUES ('".$_POST["nom"]."')";
        pg_query($cnx, $req);
        echo "<section class=\"reussie\">L'intervenant est bien crée</section>";
        header("location:consulterToutLesIntervenants.php");
    } else {
        echo "<section class=\"echoue\">L'intervenant n'est pas crée</section>";
    }
    pg_close($cnx);
}