<?php
require_once ("_entete.inc.php");

// / Algorithme qui permet de créer une salle
if (isset($_POST["creersalle"])) {
    $cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8") or die("Pas de connexion à la base de données");
    if (isset($_POST["nom"])) {
        $req = "INSERT INTO salle (nom) VALUES ('" . $_POST["nom"] . "')";
        pg_query($cnx, $req);
        echo "<section class=\"reussie\">La salle est bien créée</section>";
        header("location:consulterToutesLesSalles.php");
    } else {
        echo "<section class=\"echoue\">La salle n'est pas créée</section>";
    }
    pg_close($cnx);
}