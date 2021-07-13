<?php
require_once ("_entete.inc.php");
// Algorithme qui permet de supprimer une durée
if (isset($_POST["supprimerduree"])) {
    $cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8") or die("Pas de connexion à la base de données");
    if (isset($_POST["id"])) {
        $req = "DELETE FROM duree WHERE id='" . $_POST["id"] . "'";
        pg_query($cnx, $req);
        echo "<section class=\"reussie\">La durée est supprimée</section>";
        header("location:consulterToutesLesDurees.php");
    }
    pg_close($cnx);
}
