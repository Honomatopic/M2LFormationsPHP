<?php
require_once("_entete.inc.php");

// Algorithme qui permet aux employés de s'inscrire
if (isset($_POST["inscrire"])) {
    if (isset($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["motpasse"], $_POST["statut"])) {
        inscriptionDunAdherent($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["motpasse"], $_POST["statut"]);
        echo "<section class=\"reussie\">Votre inscription a réussie</section>";
        header("location:index.php");
    } else {
        echo "<section class=\"echoue\">Votre inscription a échoué</section>";
    }
}
