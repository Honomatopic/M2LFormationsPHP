<?php
require_once("_entete.inc.php");

// Algorithme qui permet aux employés de se connecter
if (isset($_POST["connecter"], $_POST["email"], $_POST["motpasse"])) {
    $ladherent = seConnecter($_POST["email"]);
    if (isset($ladherent)) {
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) && password_verify($_POST["motpasse"], $ladherent["motpasse"])) {
            $_SESSION["id"] = $ladherent["id"];
            $_SESSION["nom"] = $ladherent["nom"];
            $_SESSION["prenom"] = $ladherent["prenom"];
            $_SESSION["email"] = $ladherent["email"];
            $_SESSION["motpasse"] = $ladherent["motpasse"];
            $_SESSION["statut"] = $ladherent["statut"];
            echo "<section class=\"reussie\">Votre connexion a réussie</section>";
            header("location:espaceadherent.php");
        }
    } else {
        echo "<section class=\"echoue\">Votre connexion a échoué</section>";
    }
}
