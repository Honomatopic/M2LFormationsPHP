<?php
require_once ("_entete.inc.php");
// / Algorithme qui permet de créer une durée
if (isset($_POST["creerduree"])) {
    $cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8")
    or die("Pas de connexion à la base de données");
    if (isset($_POST["datedebut"], $_POST["datefin"])) {
        $req = "INSERT INTO duree (datedebut, datefin) VALUES ('" . $_POST["datedebut"] . "', '" . $_POST["datefin"] . "')";
        pg_query($cnx, $req);
        echo "<section class=\"reussie\">La durée est bien créée</section>";
        header("location:consulterToutesLesDurees.php");
    } else {
        echo "<section class=\"echoue\">La durée n'est pas créée</section>";
        header("location:consulterToutesLesDurees.php");
    }
    pg_close($cnx);
}