<?php
require_once ("_entete.inc.php");

// / Algorithme qui permet de créer un prestataire
if (isset($_POST["creerprestataire"])) {
    $cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8") or die("Pas de connexion à la base de données");
    if (isset($_POST["nom"])) {
        $req = "INSERT INTO prestataire (nom) VALUES ('" . $_POST["nom"] . "')";
        pg_query($cnx, $req);
        echo "<section class=\"reussie\">Le prestataire est bien crée</section>";
        header("location:consulterTousLesPrestataires.php");
    } else {
        echo "<section class=\"echoue\">Le prestataire n'est pas crée</section>";
    }
    pg_close($cnx);
}