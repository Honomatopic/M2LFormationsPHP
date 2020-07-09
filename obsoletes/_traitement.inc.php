<?php
require_once("_entete.inc.php");
// Page qui recense les algorithmes de traitement de l'application

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

// Algorithme qui permet de supprimer un adhérent en fonction de son id
if (isset($_POST["supprimer"])) {
    if (isset($_POST["id"])) {
        supprimerUnAdherent($_POST["id"]);
        echo "<section class=\"reussie\">Votre espace est supprimée</section>";
        header("location:index.php");
    }
}

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

// Algorithme qui permet à l'employé de se déconnecter de son espace
if (isset($_POST["deconnecter"])) {
    session_destroy();
    echo "<section class=\"reussie\">Vous êtes bien déconnecter</section>";
    header("location:index.php");
    exit();
}

// Algorithme qui permet de créer une formation
/*if (isset($_POST["creer"])) {
    if (isset($_POST["intitule"], $_POST["datedebut"], $_POST["datefin"], $_POST["lieu"], $_POST["prestataire"])) {
        creerUneFormation($_POST["intitule"], $_POST["datedebut"], $_POST["datefin"], $_POST["lieu"], $_POST["prestataire"]);
        echo "<section class=\"reussie\">La formation est bien créée</section>";
    } else {
        echo "<section class=\"echoue\">La formation n'est pas créée</section>";
    }
}

// Algorithme qui permet de supprimer une formation
if (isset($_POST["supprimerformation"])) {
    if (isset($_POST["id"])) {
        supprimerLaFormation($_POST["id"]);
        echo "<section class=\"reussie\">Votre formation est supprimée</section>";
    }
}

// Algorithme permettant d'éditer une formation
if (isset($_POST["editerformation"])) {
    if (isset($_POST["id"], $_POST["intitule"], $_POST["datedebut"], $_POST["datefin"], $_POST["lieu"], $_POST["prestataire"])) {
        editerLaFormation($_POST["id"], $_POST["intitule"], $_POST["datedebut"], $_POST["datefin"], $_POST["lieu"], $_POST["prestataire"]);
        echo "<section class=\"reussie\">Votre formation est bien édité</section>";
    } else {
        echo "<section class=\"echoue\">Votre formation n'est pas édité</section>";
    }
}*/

// Algorithme permettant de s'inscrire à une formation
if (isset($_GET["adherent_id"], $_GET["formation_id"])) {
    sinscrireAMaFormation($_GET["adherent_id"], $_GET["formation_id"]);
    echo "<section class=\"reussie\">Vous etes bien inscris à la formation</section>";
}

// Algorithme qui permet de se désinscrire d'une formation
if (isset($_GET["aadherent_id"], $_GET["fformation_id"])) {
    SeDesinscrireAMaFormation($_GET["aadherent_id"], $_GET["fformation_id"]);
    echo "<section class=\"reussie\">Vous êtes désinscris de cette formation</section>";
}