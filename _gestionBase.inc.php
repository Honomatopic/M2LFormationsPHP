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

// La fonction inscriptionDunEmploye($nom, $prenom, $email, $motpasse, $statut) permet à un employé de s'inscrire
function inscriptionDunEmploye($nom, $prenom, $email, $motpasse, $statut)
{
    $pdo = connexionBDD();
    $sql = "INSERT INTO employe (nom, prenom, email, motpasse, statut) VALUES (:nom, :prenom, :email, :motpasse, :statut)";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":nom" => $nom,
        ":prenom" => $prenom,
        ":email" => $email,
        ":motpasse" => md5($motpasse),
        ":statut" => $statut
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction seConnecter($email, $motpasse) permet à l'employé de se connecter
function seConnecter($email)
{
    $pdo = connexionBDD();
    $sql = "SELECT * FROM employe WHERE email=:email";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute(array(
        ":email" => $email
    ));
    $resultat = $pdoStatement->fetch(PDO::FETCH_ASSOC);
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction selectionnerUnEmployeParlId($id) permet d'afficher dans un formulaire les informations d'un employe
function selectionnerUnEmployeParlId($id)
{
    $pdo = connexionBDD();
    $sql = "SELECT * FROM employe WHERE id=:id";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute(array(
        ":id" => $id
    ));
    $resultat = $pdoStatement->fetch(PDO::FETCH_ASSOC);
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction supprimerUnEmploye($id) permet de supprimer un employe avec le bouton supprimer du formulaire d'édition
function supprimerUnEmploye($id)
{
    $pdo = connexionBDD();
    $sql = "DELETE FROM employe WHERE id=:id";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":id" => $id
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction editerUnEmploye($id, $nom, $prenom, $email, $motpasse) permet d'éditer les informations d'un utilisateur grâce à l'id
function editerUnEmploye($id, $nom, $prenom, $email, $motpasse)
{
    $pdo = connexionBDD();
    $sql = "UPDATE employe SET nom=:nom, prenom=:prenom, email=:email, motpasse=:motpasse WHERE id=:id";
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

// La fonction creerUneFormation() permet comme son nom ne l'indique pas de créer une formation
function creerUneFormation($intitule, $datedebut, $datefin, $lieu, $prestataire)
{
    $pdo = connexionBDD();
    $sql = "INSERT INTO formation (intitule, datedebut, datefin, lieu, prestataire) VALUES (:intitule, :datedebut, :datefin, :lieu, :prestataire)";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":intitule" => $intitule,
        ":datedebut" => $datedebut,
        ":datefin" => $datefin,
        ":lieu" => $lieu,
        ":prestataire" => $prestataire
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction selectionnerTouteslesFormations() permet de sélectionner toutes les formations
function selectionnertouteslesFormations()
{
    $pdo = connexionBDD();
    $sql = "SELECT * FROM formation";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute();
    $resultat = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction selectionnerLaFormationParlId() permet de selectionner une formation par, devinez quoi ?, l'id
function selectionnerLaFormationParlId($id)
{
    $pdo = connexionBDD();
    $sql = "SELECT * FROM formation WHERE id=:id";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute(array(
        ":id" => $id
    ));
    $resultat = $pdoStatement->fetch(PDO::FETCH_ASSOC);
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction supprimerLaFormation() permet de supprimer quoi ? Une formation par l'id pardi
function supprimerLaFormation($id)
{
    $pdo = connexionBDD();
    $sql = "DELETE FROM formation WHERE id=:id";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":id" => $id
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction editerLaFormation() permet d'éditer une formation, une seule
function editerLaFormation($id, $intitule, $datedebut, $datefin, $lieu, $prestataire)
{
    $pdo = connexionBDD();
    $sql = "UPDATE formation SET intitule=:intitule, datedebut=:datedebut, datefin=:datefin, lieu=:lieu, prestataire=:prestataire WHERE id=:id";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":intitule" => $intitule,
        ":datedebut" => $datedebut,
        ":datefin" => $datefin,
        ":lieu" => $lieu,
        ":prestataire" => $prestataire,
        ":id" => $id
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction sinscrireAUneFormationAveclId() permet de - surprise - s'inscrire à une formation pour l'employé
function sinscrireAUneFormationAveclId($intitule, $datedebut, $datefin, $lieu, $prestataire, $employeid)
{
    $pdo = connexionBDD();
    $sql = "INSERT INTO formation (intitule, datedebut, datefin, lieu, prestataire, Employe_id) VALUES (:intitule, :datedebut, :datefin, :lieu, :prestataire, :employeid)";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":intitule" => $intitule,
        ":datedebut" => $datedebut,
        ":datefin" => $datefin,
        ":lieu" => $lieu,
        ":prestataire" => $prestataire,
        ":employeid" => $employeid
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction desinscrireAUneFormationAveclId() permet de se désinscrire à une formation et voilà
function desinscrireAUneFormationAveclId($id) {
    $pdo = connexionBDD();
    $sql = "DELETE FROM formation WHERE id=:id";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":id" => $id
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}
