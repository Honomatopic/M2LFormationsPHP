<?php
include_once ("_entete.inc.php");

/// Algorithme qui permet de créer un employé
if (isset($_POST["creeremploye"])) {
    if (isset($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["motpasse"], $_POST["statut"])) {
        $resultat = creerLEmploye($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["motpasse"], $_POST["statut"]);
        var_dump($resultat);
        echo "<section class=\"reussie\">L'employé est bien crée</section>";
        header("location:consulterToutLesEmployes.php");
    } else {
        echo "<section class=\"echoue\">L'employé n'est pas crée</section>";
    }
}