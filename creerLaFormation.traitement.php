<?php
require_once ("_entete.inc.php");

/// Algorithme qui permet de créer une formation
if (isset($_POST["creerformation"])) {
    if (isset($_POST["intitule"])) {
        $cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8")
        or die("Pas de connexion à la base de données");
        $req = "INSERT INTO formation (intitule) VALUES ('".$_POST["intitule"]."')";
        pg_query($cnx, $req);
        echo "<section class=\"reussie\">La formation est bien créée</section>";
        header("location:consulterToutesLesFormations.php");
    } else {
        echo "<section class=\"echoue\">La formation n'est pas créée</section>";
    }
    pg_close($cnx);
}