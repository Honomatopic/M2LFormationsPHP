<?php
require_once ("_entete.inc.php");
// Page qui recense les algorithmes de traitement de l'application

// Algorithme qui permet aux utilisateurs de s'inscrire
if (isset($_POST["inscrire"])) {
    if (isset($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["motpasse"], $_POST["statut"])) {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
        $motpasse = $_POST["motpasse"];
        $statut = $_POST["statut"];
        inscriptionDunUtilisateur($nom, $prenom, $email, $motpasse, $statut);
        echo "Votre inscription a réussie";
        header("location:index.php");
    } else {
        echo "Votre inscription a échoué";
        header("location:index.php");
    }
}

// Algorithme qui permet aux utilisateurs de se connecter
if (isset($_POST["connecter"], $_POST["email"], $_POST["motpasse"])) {
    $email = $_POST["email"];
    $motpasse = $_POST["motpasse"];
    $lutilisateur = seConnecter($email, $motpasse);
    if (isset($lutilisateur)) {
        $_SESSION["id"] = $lutilisateur["idUtilisateur"];
        $_SESSION["nom"] = $lutilisateur["nomUtilisateur"];
        $_SESSION["prenom"] = $lutilisateur["prenomUtilisateur"];
        $_SESSION["email"] = $lutilisateur["emailUtilisateur"];
        $_SESSION["motpasse"] = $lutilisateur["motpasseUtilisateur"];
        $_SESSION["statut"] = $lutilisateur["statutUtilisateur"];
        header("location:espaceutilisateur.php");
    } else {
        echo "Votre connexion a échoué";
        // header("location:espaceUtilisateur.php");
    }
}

// Algorithme qui permet de supprimer un utilisateur en fonction de son id
if (isset($_POST["supprimer"])) {
    if (isset($_POST["id"])){
        $id = $_POST["id"];
        supprimerUnUtilisateurParlId($id);
        header("location:index.php");
    }
}

// Algorithme qui permet d'éditer les informations d'un utilisateur
if (isset($_POST["editer"])) {
    if (isset($_POST["id"], $_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["motpasse"], $_POST["statut"])){
        $id = $_POST["id"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
        $motpasse = $_POST["motpasse"];
        $statut = $_POST["statut"];
        editerUnUtilisateurParlId($id, $nom, $prenom, $email, $motpasse);
        header("location:espaceutilisateur.php");
    }
}

// Algorithme qui permet à l'utilisateur de se déconnecter de son espace
if (isset($_POST["deconnecter"])) {
    session_destroy();
    header("location:index.php");
    exit();
}