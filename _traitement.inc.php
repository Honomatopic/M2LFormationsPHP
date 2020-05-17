<?php
require_once ("_entete.inc.php");
// Page qui recense les algorithmes de traitement de l'application

// Algorithme qui permet aux employés de s'inscrire
if (isset($_POST["inscrire"])) {
    if (isset($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["motpasse"], $_POST["statut"])) {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
        $motpasse = $_POST["motpasse"];
        $statut = $_POST["statut"];
        inscriptionDunEmploye($nom, $prenom, $email, $motpasse, $statut);
        header("location:index.php");
        echo "<section class=\"reussie\">Votre inscription a réussie</section>";
    } else {
        header("location:index.php");
        echo "<section class=\"echoue\">Votre inscription a échoué</section>";
    }
}

// Algorithme qui permet aux employés de se connecter
if (isset($_POST["connecter"], $_POST["email"], $_POST["motpasse"])) {
    $email = $_POST["email"];
    $lemploye = seConnecter($email);
    if (isset($lemploye)) {
        $_SESSION["id"] = $lemploye["id"];
        $_SESSION["nom"] = $lemploye["nom"];
        $_SESSION["prenom"] = $lemploye["prenom"];
        $_SESSION["email"] = $lemploye["email"];
        $_SESSION["motpasse"] = $lemploye["motpasse"];
        $_SESSION["statut"] = $lemploye["statut"];
        echo "<section class=\"reussie\">Votre connexion a réussie</section>";
        header("location:espaceemploye.php");
    } else {
        echo "<section class=\"echoue\">Votre connexion a échoué</section>";
        header("location:index.php");
    }
}

// Algorithme qui permet de supprimer un employe en fonction de son id
if (isset($_POST["supprimer"])) {
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        supprimerUnEmploye($id);
        echo "<section class=\"reussie\">Votre espace est supprimée</section>";
        header("location:index.php");
    }
}

// Algorithme qui permet d'éditer les informations d'un employé
if (isset($_POST["editer"])) {
    if (isset($_POST["id"], $_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["motpasse"], $_POST["statut"])) {
        $id = $_POST["id"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
        $motpasse = $_POST["motpasse"];
        $statut = $_POST["statut"];
        editerUnEmploye($id, $nom, $prenom, $email, $motpasse);
        header("location:espaceemploye.php");
        echo "<section class=\"reussie\">Votre espace est bien édité</section>";
    } else {
        header("location:espaceemploye.php");
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
if (isset($_POST["creer"])) {
    if (isset($_POST["intitule"], $_POST["datedebut"], $_POST["datefin"], $_POST["lieu"], $_POST["prestataire"])) {
        $intitule = $_POST["intitule"];
        $datedebut = $_POST["datedebut"];
        $datefin = $_POST["datefin"];
        $lieu = $_POST["lieu"];
        $prestataire = $_POST["prestataire"];
        creerUneFormation($intitule, $datedebut, $datefin, $lieu, $prestataire);
        header("location:espaceemploye.php");
        echo "<section class=\"reussie\">La formation est bien créée</section>";
    } else {
        header("location:espaceemploye.php");
        echo "<section class=\"echoue\">La formation n'est pas créée</section>";
    }
}

// Algorithme qui permet de supprimer une formation
if (isset($_POST["supprimerformation"])) {
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        supprimerLaFormation($id);
        echo "<section class=\"reussie\">Votre formation est supprimée</section>";
        header("location:sinscrireformation.php");
    }
}

// Algorithme permettant d'éditer une formation
if (isset($_POST["editerformation"])) {
    if (isset($_POST["id"], $_POST["intitule"], $_POST["datedebut"], $_POST["datefin"], $_POST["lieu"], $_POST["prestataire"])) {
        $id = $_POST["id"];
        $intitule = $_POST["intitule"];
        $datedebut = $_POST["datedebut"];
        $datefin = $_POST["datefin"];
        $lieu = $_POST["lieu"];
        $prestataire = $_POST["prestataire"];
        editerLaFormation($id, $intitule, $datedebut, $datefin, $lieu, $prestataire);
        header("location:sinscrireformation.php");
        echo "<section class=\"reussie\">Votre formation est bien édité</section>";
    } else {
        header("location:sinscrireformation.php");
        echo "<section class=\"echoue\">Votre formation n'est pas édité</section>";
    }
}

// Algorithme permettant de s'inscrire à une formation
if (isset($_POST["inscrireformation"])) {
    if (isset($_POST["intitule"], $_POST["datedebut"], $_POST["datefin"], $_POST["lieu"], $_POST["prestataire"], $_POST["idsession"])){
        $intitule = $_POST["intitule"];
        $datedebut = $_POST["datedebut"];
        $datefin = $_POST["datefin"];
        $lieu = $_POST["lieu"];
        $prestataire = $_POST["prestataire"];
        $employeid = $_POST["idsession"];
        sinscrireAUneFormationAveclId($intitule, $datedebut, $datefin, $lieu, $prestataire, $employeid);
        header("location:sinscrireformation.php");
        echo "<section class=\"reussie\">Votre formation est bien inscrite</section>";
    } else {
        header("location:sinscrireformation.php");
        echo "<section class=\"echoue\">Votre formation n'est pas inscrite</section>";
    }
}

// Algorithme qui permet de se désinscrire d'une formation
if (isset($_POST["desinscrireformation"])) {
    if (isset($_POST["idformation"])) {
        $id = $_POST["idformation"];
        desinscrireAUneFormationAveclId($id);
        echo "<section class=\"reussie\">Vous êtes désinscris de cette formation</section>";
        header("location:sinscrireformation.php");
    }
}

