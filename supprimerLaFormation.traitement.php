<?php
require_once ("_entete.inc.php");

// Algorithme qui permet de supprimer une formation
if (isset($_POST["supprimerformation"])) {
    if (isset($_POST["id"])) {
        $req = "DELETE FROM formation WHERE id='".$_POST["id"]."'";
        pg_query($cnx, $req);
        echo "<section class=\"reussie\">Votre formation est supprimée</section>";
        header("location:consulterToutesLesFormations.php");
        pg_close($cnx);
    }
}
