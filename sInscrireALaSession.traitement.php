<?php
require_once ("_entete.inc.php");

// Algorithme permettant de s'inscrire à une session de formation
if (isset($_GET["employe_id"], $_GET["session_id"])) {
    $req = "INSERT INTO inscrire (employe_id, session_id) VALUES ('".$_GET["employe_id"]."', '".$_GET["session_id"]."')";
    pg_query($cnx, $req);
    echo "<section class=\"reussie\">Vous etes bien inscris à la session</section>";
    header("location:consulterLesSessions.php");
    pg_close($cnx);
}
