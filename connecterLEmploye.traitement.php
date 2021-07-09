<?php
require_once ("_entete.inc.php");

// Algorithme qui permet aux employés de se connecter
if (isset($_POST["connecter"], $_POST["email"], $_POST["motpasse"])) {
    $cnx = pg_connect("host=localhost dbname=m2lformations user=root password=root options=--client_encoding=UTF8")
    or die("Pas de connexion à la base de données");
    $req = "SELECT * FROM employe WHERE email='".$_POST["email"]."'";
    $requete_exec = pg_query($cnx, $req);
    while ($lemploye = pg_fetch_assoc($requete_exec)) {
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) /*&& password_verify($_POST["motpasse"], $lemploye["motpasse"])*/) {
            $_SESSION["id"] = $lemploye["id"];
            $_SESSION["nom"] = $lemploye["nom"];
            $_SESSION["prenom"] = $lemploye["prenom"];
            $_SESSION["email"] = $lemploye["email"];
            $_SESSION["motpasse"] = $lemploye["motpasse"];
            $_SESSION["statut"] = $lemploye["statut"];
            echo "<section class=\"reussie\">Votre connexion a réussie</section>";
            header("location:espaceDeLEmploye.php");
        } else {
            echo "<section class=\"echoue\">Votre connexion a échoué</section>";
        }

        pg_close($cnx);
    }
    // $lemploye = seConnecter($_POST["email"]);
    // if (isset($lemploye)) {
}
