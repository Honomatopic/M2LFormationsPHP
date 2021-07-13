<?php
require_once ("_entete.inc.php");

// / Algorithme qui permet de créer un intervenant
if (isset($_POST["creerintervenant"])) {
    $cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8") or die("Pas de connexion à la base de données");
    if (isset($_POST["nom"])) {
        $req = "INSERT INTO intervenant (nom) VALUES ('" . $_POST["nom"] . "')";
        pg_query($cnx, $req);
        echo "<section class=\"reussie\">L'intervenant est bien crée</section>";
        header("location:consulterTousLesIntervenants.php");
    } else {
        echo "<section class=\"echoue\">L'intervenant n'est pas crée</section>";
    }
    pg_close($cnx);
}