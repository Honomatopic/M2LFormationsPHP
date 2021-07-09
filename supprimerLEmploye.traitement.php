<?php
require_once ("_entete.inc.php");

// Algorithme qui permet de supprimer un employé
if (isset($_POST["supprimeremploye"])) {
    if (isset($_POST["id"])) {
        $cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8") or die("Pas de connexion à la base de données");
        $req = "DELETE FROM employe WHERE id='".$_POST["id"]."'";
        pg_query($cnx, $req);
        echo "<section class=\"reussie\">Votre employé est supprimé</section>";
        header("location:consulterToutLesEmployes.php");
        pg_close($cnx);
    }
}
