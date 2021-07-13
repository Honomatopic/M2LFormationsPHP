<?php
require_once ("_entete.inc.php");
// Algorithme permettant de modifier un prestataire
if (isset($_POST["modifierprestataire"])) {
    $cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8") or die("Pas de connexion à la base de données");
    if (isset($_POST["id"], $_POST["nom"])) {
        $req = "UPDATE prestataire SET nom='" . $_POST["nom"] . "' WHERE id='" . $_POST["id"] . "'";
        pg_query($cnx, $req);
        echo "<section class=\"reussie\">Le prestataire est bien modifié</section>";
        header("location:consulterTousLesPrestataires.php");
    } else {
        echo "<section class=\"echoue\">Le prestataire n'est pas modifié</section>";
    }
    pg_close($cnx);
}
