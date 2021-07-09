<?php
require_once ("_entete.inc.php");

// / Algorithme qui permet de créer une salle
if (isset($_POST["creersalle"])) {
    if (isset($_POST["nom"])) {
        $req = "INSERT INTO salle (nom) VALUES ('" . $_POST["nom"] . "')";
        pg_query($cnx, $req);
        echo "<section class=\"reussie\">La salle est bien créée</section>";
        header("location:consulterToutesLesSalles.php");
    } else {
        echo "<section class=\"echoue\">La salle n'est pas créée</section>";
    }
    pg_close($cnx);
}