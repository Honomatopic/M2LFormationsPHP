<?php
require_once ("_entete.inc.php");

// Algorithme permettant de modifier une session de formation
if (isset($_POST["modifiersession"])) {
    if (isset($_POST["id"], $_POST["formation"], $_POST["duree"], $_POST["salle"], $_POST["intervenant"], $_POST["prestataire"])) {
        $cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8") or die("Pas de connexion à la base de données");
        $req = "UPDATE session SET formation_id='" . $_POST["formation"] . "', duree_id='" . $_POST["duree"] . "', salle_id='" . $_POST["salle"] . "', intervenant_id='" . $_POST["intervenant"] . "', prestataire_id='" . $_POST["prestataire"] . "' WHERE id='" . $_POST["id"] . "'";
        pg_query($cnx, $req);
        echo "<section class=\"reussie\">La session de formation est bien modifiée</section>";
        header("location:consulterToutesLesSessions.php");
    } else {
        echo "<section class=\"echoue\">La session de formation n'est pas modifiée</section>";
    }
    pg_close($cnx);
}
