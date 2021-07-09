<?php
require_once ("_entete.inc.php");

// Algorithme qui permet de supprimer une session
if (isset($_POST["supprimersession"])) {
    if (isset($_POST["id"])) {
        $req = "DELETE FROM session WHERE id='".$_POST["id"]."'";
        pg_query($cnx, $req);
        echo "<section class=\"reussie\">La session est supprimée</section>";
        header("location:consulterToutesLesSessions.php");
        pg_close($cnx);
    }
}
