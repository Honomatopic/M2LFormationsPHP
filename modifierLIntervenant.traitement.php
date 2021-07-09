<?php
require_once ("_entete.inc.php");

// Algorithme permettant de modifier un intervenant
if (isset($_POST["modifierintervenant"])) {
    if (isset($_POST["id"], $_POST["nom"])) {
        $req = "UPDATE intervenant SET nom='".$_POST["nom"]."' WHERE id='".$_POST["id"]."'";
        pg_query($cnx, $req);
        echo "<section class=\"reussie\">L'intervenant est bien modifié</section>";
        header("location:consulterToutLesIntervenants.php");
    } else {
        echo "<section class=\"echoue\">L'intervenant n'est pas modifié</section>";
    }
    pg_close($cnx);
}
