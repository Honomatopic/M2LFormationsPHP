<?php
require_once ("_entete.inc.php");

// / Algorithme qui permet de créer un employé
if (isset($_POST["creeremploye"])) {
    $cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8") or die("Pas de connexion à la base de données");
    if (isset($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["motpasse"], $_POST["statut"])) {
        $req = "INSERT INTO employe (nom, prenom, email, motpasse, statut) VALUES ('" . $_POST["nom"] . "', '" . $_POST["prenom"] . "', '" . $_POST["email"] . "', '" . $_POST["motpasse"] . "', '" . $_POST["statut"] . "')";
        pg_query($cnx, $req);
        echo "<section class=\"reussie\">L'employé est bien crée</section>";
        header("location:consulterTousLesEmployes.php");
    } else {
        echo "<section class=\"echoue\">L'employé n'est pas crée</section>";
    }
    pg_close($cnx);
}