<?php
require_once ("_entete.inc.php");
// Algorithme qui permet de supprimer une formation
if (isset($_POST["supprimerformation"])) {
    $cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8") or die("Pas de connexion à la base de données");
    if (isset($_POST["id"])) {
        $req = "DELETE FROM formation WHERE id='" . $_POST["id"] . "'";
        pg_query($cnx, $req);
        echo "<section class=\"reussie\">Votre formation est supprimée</section>";
        header("location:consulterToutesLesFormations.php");
    }
    pg_close($cnx);
}
