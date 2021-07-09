<?php
require_once ("_entete.inc.php");

// Algorithme qui permet de supprimer un prestataire
if (isset($_POST["supprimerprestataire"])) {
    if (isset($_POST["id"])) {
        $req = "DELETE FROM prestataire WHERE id='".$_POST["id"]."'";
        pg_query($cnx, $req);
        echo "<section class=\"reussie\">Le prestataire est supprimé</section>";
        header("location:consulterToutLesPrestataires.php");
        pg_close($cnx);
    }
}
