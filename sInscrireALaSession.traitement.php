<?php
require_once ("_entete.inc.php");

// Algorithme permettant de s'inscrire à une session de formation
if (isset($_GET["employe_id"], $_GET["session_id"])) {
    $cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8") or die("Pas de connexion à la base de données");
    $req = "INSERT INTO inscrire (employe_id, session_id) VALUES ('".$_GET["employe_id"]."', '".$_GET["session_id"]."')";
    pg_query($cnx, $req);
    echo "<section class=\"reussie\">Vous etes bien inscris à la session</section>";
    header("location:consulterLesSessions.php");
    pg_close($cnx);
}
