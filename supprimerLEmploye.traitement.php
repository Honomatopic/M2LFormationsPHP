<?php
require_once ("_entete.inc.php");

// Algorithme qui permet de supprimer un employé
if (isset($_POST["supprimeremploye"])) {
    if (isset($_POST["id"])) {
        $req = "DELETE FROM employe WHERE id='".$_POST["id"]."'";
        pg_query($cnx, $req);
        echo "<section class=\"reussie\">Votre employé est supprimé</section>";
        header("location:consulterToutLesEmployes.php");
        pg_close($cnx);
    }
}
