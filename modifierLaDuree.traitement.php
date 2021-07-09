<?php
require_once ("_entete.inc.php");

// Algorithme permettant de modifier une durée
if (isset($_POST["modifierduree"])) {
    if (isset($_POST["id"], $_POST["datedebut"], $_POST["datefin"])) {
        $req = "UPDATE duree SET datedebut='".$_POST["datedebut"]."', datefin='".$_POST["datefin"]."' WHERE id='".$_POST["id"]."'";

        pg_query($cnx, $req);
        echo "<section class=\"reussie\">La durée est bien modifiée</section>";
        header("location:consulterToutesLesDurees.php");
    } else {
        echo "<section class=\"echoue\">La durée n'est pas modifiée</section>";
    }
    pg_close($cnx);
}
