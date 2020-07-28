<?php
require_once ("_entete.inc.php");

// Algorithme permettant d'éditer une salle
if (isset($_POST["editersalle"])) {
    if (isset($_POST["id"], $_POST["nom"])) {
        editerlaSalle($_POST["id"], $_POST["nom"]);
        echo "<section class=\"reussie\">La salle est bien éditée</section>";
        header("location:liretouteslessalles.php");
    } else {
        echo "<section class=\"echoue\">La salle n'est pas éditée</section>";
    }
}
