<?php

// Fichier qui recense toutes les fonctions qui interagissent avec la base de données m2lformations

// La fonction connexionBDD() permet la connexion à la base de données
function connexionBDD()
{
    $dns = "mysql:host=127.0.0.1;dbname=m2lformations;charset=utf8";
    $utilisateurBdd = "root";
    $motpasseBdd = "";
    try {
        $pdo = new PDO($dns, $utilisateurBdd, $motpasseBdd);
        // Activation des erreurs PDO
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // mode de fetch par défaut : FETCH_ASSOC / FETCH_OBJ / FETCH_BOTH
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "La connexion a échouée : " . $e->getMessage();
    }

    return $pdo;
}

// La fonction inscriptionDunUtilisateur($nom, $prenom, $email, $motpasse, $statut) permet à un utilisateur de s'inscrire
function inscriptionDunUtilisateur($nom, $prenom, $email, $motpasse, $statut)
{
    $pdo = connexionBDD();
    $sql = "INSERT INTO utilisateur (nomUtilisateur, prenomUtilisateur, emailUtilisateur, motpasseUtilisateur, statutUtilisateur) VALUES (:nom, :prenom, :email, :motpasse, :statut)";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":nom" => $nom,
        ":prenom" => $prenom,
        ":email" =>$email,
        ":motpasse" => md5($motpasse),
        ":statut" =>$statut
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction seConnecter($email, $motpasse) permet à l'utilisateur de se connecter
function seConnecter($email, $motpasse) {
    $pdo = connexionBDD();
    $sql = "SELECT * FROM utilisateur WHERE emailUtilisateur=:email AND motpasseUtilisateur=:motpasse";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute(array(
        ":email" => $email,
        ":motpasse" => md5($motpasse)
    ));
    $resultat = $pdoStatement->fetch(PDO::FETCH_ASSOC);
    $pdoStatement->closeCursor();
    return $resultat; 
}

// La fonction selectionnerUnUtilisateurParlId($id) permet d'afficher dans un formulaire les informations d'un utilisateur
function selectionnerUnUtilisateurParlId($id) {
    $pdo = connexionBDD();
    $sql = "SELECT * FROM utilisateur WHERE idUtilisateur=:id";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute(array(
        ":id" => $id
    ));
    $resultat = $pdoStatement->fetch(PDO::FETCH_ASSOC);
    $pdoStatement->closeCursor();
    return $resultat; 
}

// La fonction supprimerUnUtilisateurParlId($id) permet de supprimer un utilisateur avec le bouton supprimer du formulaire d'édition
function supprimerUnUtilisateurParlId($id) {
    $pdo = connexionBDD();
    $sql = "DELETE FROM utilisateur WHERE idUtilisateur=:id";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":id" => $id
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction editerUnUtilisateurParlId($id, $nom, $prenom, $email, $motpasse) permet d'éditer les informations d'un utilisateur grâce à l'id
function editerUnUtilisateurParlId($id, $nom, $prenom, $email, $motpasse) {
    $pdo = connexionBDD();
    $sql = "UPDATE utilisateur SET nomUtilisateur=:nom, prenomUtilisateur=:prenom, emailUtilisateur=:email, motpasseUtilisateur=:motpasse WHERE idUtilisateur=:id";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":nom" => $nom,
        ":prenom" => $prenom,
        ":email" => $email,
        ":motpasse" => sha1($motpasse),
        ":id" => $id
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}






