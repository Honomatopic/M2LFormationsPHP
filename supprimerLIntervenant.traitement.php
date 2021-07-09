<?php
require_once ("_entete.inc.php");

// Algorithme qui permet de supprimer un intervenant
if (isset($_POST["supprimerintervenant"])) {
    if (isset($_POST["id"])) {
        $req = "DELETE FROM intervenant WHERE id='".$_POST["id"]."'";
        pg_query($cnx, $req);
        echo "<section class=\"reussie\">L'intervenant est supprimé</section>";
        header("location:consulterToutLesIntervenants.php");
        pg_close($cnx);
    }
}
