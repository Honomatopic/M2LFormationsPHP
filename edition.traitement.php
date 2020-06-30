<?php
require_once("_entete.inc.php");

// Algorithme qui permet d'éditer les informations d'un employé
if (isset($_POST["editer"])) {
    if (isset($_POST["id"], $_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["motpasse"], $_POST["statut"])) {
        editerUnAdherent($_POST["id"], $_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["motpasse"], $_POST["statut"]);
        echo "<section class=\"reussie\">Votre espace est bien édité</section>";
        header("location:espaceadherent.php");
    } else {
        echo "<section class=\"echoue\">Votre espace n'est pas édité</section>";
    }
}
