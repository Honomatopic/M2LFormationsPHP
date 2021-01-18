<?php
include_once ("_entete.inc.php");

// Algorithme permettant de modifier une salle
if (isset($_POST["modifiersalle"])) {
    if (isset($_POST["id"], $_POST["nom"])) {
        modifierLaSalle($_POST["id"], $_POST["nom"]);
        echo "<section class=\"reussie\">La salle est bien modifiée</section>";
        header("location:consulterToutesLesSalles.php");
    } else {
        echo "<section class=\"echoue\">La salle n'est pas modifiée</section>";
    }
}
