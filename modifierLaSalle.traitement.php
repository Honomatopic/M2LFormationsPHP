<?php
require_once ("_entete.inc.php");

// Algorithme permettant de modifier une salle
if (isset($_POST["modifiersalle"])) {
    if (isset($_POST["id"], $_POST["nom"])) {
        $req = "UPDATE salle SET nom='".$_POST["nom"]."' WHERE id='".$_POST["id"]."'";
        pg_query($cnx, $req);
        echo "<section class=\"reussie\">La salle est bien modifiée</section>";
        header("location:consulterToutesLesSalles.php");
    } else {
        echo "<section class=\"echoue\">La salle n'est pas modifiée</section>";
    }
    pg_close($cnx);
}
