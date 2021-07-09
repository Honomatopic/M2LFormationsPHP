<?php
require_once ("_entete.inc.php");

// Algorithme qui permet de supprimer une durée
if (isset($_POST["supprimerduree"])) {
    if (isset($_POST["id"])) {
        $req = "DELETE FROM duree WHERE id='".$_POST["id"]."'";
        pg_query($cnx, $req);
        echo "<section class=\"reussie\">La durée est supprimée</section>";
        header("location:consulterToutesLesDurees.php");
        pg_close($cnx);
    }
}
