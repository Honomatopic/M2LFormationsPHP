<?php
require_once ("_entete.inc.php");

// Algorithme permettant de modifier un prestataire
if (isset($_POST["modifierprestataire"])) {
    if (isset($_POST["id"], $_POST["nom"])) {
        $req = "UPDATE prestataire SET nom='".$_POST["nom"]."' WHERE id='".$_POST["id"]."'";
        pg_query($cnx, $req);
        echo "<section class=\"reussie\">Le prestataire est bien modifié</section>";
        header("location:consulterToutLesPrestataires.php");
    } else {
        echo "<section class=\"echoue\">Le prestataire n'est pas modifié</section>";
    }
    pg_close($cnx);
}
