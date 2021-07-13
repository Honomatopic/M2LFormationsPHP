<?php
require_once ("_entete.inc.php");
// Algorithme permettant de modifier un employé
if (isset($_POST["modifieremploye"])) {
    $cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8") or die("Pas de connexion à la base de données");
    if (isset($_POST["id"], $_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["motpasse"], $_POST["statut"])) {
        $req = "UPDATE employe SET nom='" . $_POST["nom"] . "', prenom='" . $_POST["prenom"] . "', email='" . $_POST["email"] . "', motpasse='" . $_POST["motpasse"] . "', statut='" . $_POST["statut"] . "' WHERE id='" . $_POST["id"] . "'";
        pg_query($cnx, $req);
        echo "<section class=\"reussie\">L'employé est bien modifié</section>";
        header("location:consulterTousLesEmployes.php");
    } else {
        echo "<section class=\"echoue\">L'employé n'est pas bien modifié</section>";
    }
    pg_close($cnx);
}
