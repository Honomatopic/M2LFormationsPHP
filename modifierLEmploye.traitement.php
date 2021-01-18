<?php
include_once ("_entete.inc.php");

// Algorithme permettant d'éditer un employé
if (isset($_POST["editeremploye"])) {
    if (isset($_POST["id"], $_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["motpasse"], $_POST["statut"])) {
	editerlEmploye($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["motpasse"], $_POST["statut"], $_POST["id"]);
        echo "<section class=\"reussie\">L'employé est bien édité</section>";
        header("location:liretouslesemployes.php");
    } else {
        echo "<section class=\"echoue\">L'employé n'est pas bien édité</section>";
    }
}
