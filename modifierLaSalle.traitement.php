<?php
require_once ("_entete.inc.php");

// Algorithme permettant de modifier une salle
if (isset($_POST["modifiersalle"])) {
    if (isset($_POST["id"], $_POST["nom"])) {
        $cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8") or die("Pas de connexion à la base de données");
        $req = "UPDATE salle SET nom='".$_POST["nom"]."' WHERE id='".$_POST["id"]."'";
        pg_query($cnx, $req);
        echo "<section class=\"reussie\">La salle est bien modifiée</section>";
        header("location:consulterToutesLesSalles.php");
    } else {
        echo "<section class=\"echoue\">La salle n'est pas modifiée</section>";
    }
    pg_close($cnx);
}
