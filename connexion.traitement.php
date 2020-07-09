<?php
require_once("_entete.inc.php");

// Algorithme qui permet aux employés de se connecter
if (isset($_POST["connecter"], $_POST["email"], $_POST["motpasse"])) {
    $lemploye = seConnecter($_POST["email"]);
    if (isset($lemploye)) {
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) /*&& password_verify($_POST["motpasse"], $lemploye["motpasse"])*/) {
            $_SESSION["id"] = $lemploye["id"];
            $_SESSION["nom"] = $lemploye["nom"];
            $_SESSION["prenom"] = $lemploye["prenom"];
            $_SESSION["email"] = $lemploye["email"];
            $_SESSION["motpasse"] = $lemploye["motpasse"];
            $_SESSION["statut"] = $lemploye["statut"];
            echo "<section class=\"reussie\">Votre connexion a réussie</section>";
            header("location:espaceemploye.php");
        }
    } else {
        echo "<section class=\"echoue\">Votre connexion a échoué</section>";
    }
}
