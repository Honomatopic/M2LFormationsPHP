<?php
require_once ("_entete.inc.php");

// Algorithme qui permet à l'employé de se déconnecter de son espace
if (isset($_POST["deconnecter"])) {
    session_destroy();
    echo "<section class=\"reussie\">Vous êtes bien déconnecter</section>";
    header("location:index.php");
    exit();
}