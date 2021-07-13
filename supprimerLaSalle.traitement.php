<?php
require_once ("_entete.inc.php");
// Algorithme qui permet de supprimer une salle
if (isset($_POST["supprimersalle"])) {
    $cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8") or die("Pas de connexion à la base de données");
    if (isset($_POST["id"])) {
        $req = "DELETE FROM salle WHERE id='" . $_POST["id"] . "'";
        pg_query($cnx, $req);
        echo "<section class=\"reussie\">La salle est supprimée</section>";
        header("location:consulterToutesLesSalles.php");
    }
    pg_close($cnx);
}
