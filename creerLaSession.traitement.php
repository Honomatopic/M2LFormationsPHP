<?php
require_once ("_entete.inc.php");

// / Algorithme qui permet de créer une session de formation
if (isset($_POST["creersession"])) {
    $cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8") or die("Pas de connexion à la base de données");
    if (isset($_POST["formation"], $_POST["duree"], $_POST["salle"], $_POST["intervenant"], $_POST["prestataire"])) {
        $req = "INSERT INTO session (formation_id, duree_id, salle_id, intervenant_id, prestataire_id) VALUES ('" . $_POST["formation"] . "', '" . $_POST["duree"] . "', '" . $_POST["salle"] . "', '" . $_POST["intervenant"] . "', '" . $_POST["prestataire"] . "')";
        pg_query($cnx, $req);
        echo "<section class=\"reussie\">La session de formation est bien créée</section>";
        header("location:consulterToutesLesSessions.php");
    } else {
        echo "<section class=\"echoue\">La session de formation n'est pas créée</section>";
    }
    pg_close($cnx);
}