<?php
include_once ("_entete.inc.php");

// Algorithme permettant de modifier un employé
if (isset($_POST["modifieremploye"])) {
    if (isset($_POST["id"], $_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["motpasse"], $_POST["statut"])) {
	modifierLEmploye($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["motpasse"], $_POST["statut"], $_POST["id"]);
        echo "<section class=\"reussie\">L'employé est bien modifié</section>";
        header("location:consulterToutLesEmployes.php");
    } else {
        echo "<section class=\"echoue\">L'employé n'est pas bien modifié</section>";
    }
}
