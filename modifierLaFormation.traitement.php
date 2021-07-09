<?php
require_once ("_entete.inc.php");

// Algorithme permettant de modifier une formation
if (isset($_POST["modifierformation"])) {
    if (isset($_POST["id"], $_POST["intitule"])) {
        $cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8") or die("Pas de connexion à la base de données");
        $req = "UPDATE formation SET intitule='".$_POST["intitule"]."' WHERE id='".$_POST["id"]."'";
        pg_query($cnx, $req);
        echo "<section class=\"reussie\">Votre formation est bien modifiée</section>";
        header("location:consulterToutesLesFormations.php");
    } else {
        echo "<section class=\"echoue\">Votre formation n'est pas modifiée</section>";
    }
    pg_close($cnx);
}
