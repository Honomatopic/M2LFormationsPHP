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
/*function inscriptionDunEmploye($nom, $prenom, $email, $motpasse, $statut)
{
    $pdo = connexionBDD();
    $sql = "INSERT INTO employe (nom, prenom, email, motpasse, statut) VALUES (:nom, :prenom, :email, :motpasse, :statut)";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":nom" => $nom,
        ":prenom" => $prenom,
        ":email" => $email,
        ":motpasse" => password_hash($motpasse, PASSWORD_DEFAULT),
        ":statut" => $statut
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction lireUnEmployeParlId($id) permet d'afficher dans un formulaire les informations d'un employé
function lireUnEmployeParlId($id)
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

// La fonction lireTouslesEmployes() permet de lire tous les employés
function lireTouslesEmployes()
{
    $pdo = connexionBDD();
    $sql = "SELECT * FROM employe";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute();
    $resultat = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction supprimerUnEmploye($id) permet de supprimer un employé avec le bouton supprimer du formulaire d'édition
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

// La fonction editerUnEmploye($id, $nom, $prenom, $email, $motpasse, $statut) permet d'éditer les informations d'un utilisateur grâce à l'id
function editerUnEmploye($id, $nom, $prenom, $email, $motpasse, $statut)
{
    $pdo = connexionBDD();
    $sql = "UPDATE employe SET nom=:nom, prenom=:prenom, email=:email, motpasse=:motpasse, statut=:statut WHERE id=:id";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":nom" => $nom,
        ":prenom" => $prenom,
        ":email" => $email,
        ":motpasse" => $motpasse,
        ":statut" => $statut,
        ":id" => $id
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}*/

//La fonction seConnecter($email, $motpasse) permet à l'employé de se connecter
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
// La fonction lireUnEmployeParlId($id) permet d'afficher dans un formulaire les informations d'un employé
function lireUnEmployeParlId($id)
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

//La fonction creerUneFormation() permet comme son nom ne l'indique pas de créer une formation
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

// La fonction lireTouteslesFormations() permet de sélectionner toutes les formations
function lireTouteslesFormations()
{
    $pdo = connexionBDD();
    $sql = "SELECT * FROM `formation`";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute();
    $resultat = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction lireLaFormationParlId() permet de selectionner une formation par, devinez quoi ?, l'id
function lireLaFormationParlId($id)
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

// La fonction sinscrireAMaFormation() permet - surprise - d'inscrire une formation pour l'employé
function sinscrireAMaFormation($employe_id, $formation_id)
{
    $pdo = connexionBDD();
    $sql = "INSERT INTO inscrire (Employe_id, Formation_id) VALUES (:employe_id, :formation_id)";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":employe_id" => $employe_id,
        ":formation_id" => $formation_id
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction SeDesinscrireAMaFormation($employe_id, $formation_id) permet de se désinscrire à une formation et voilà
function SeDesinscrireAMaFormation($employe_id, $formation_id)
{
    $pdo = connexionBDD();
    $sql = "DELETE FROM inscrire WHERE Employe_id=:employe_id AND Formation_id=:formation_id";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":employe_id" => $employe_id,
        ":formation_id" => $formation_id
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction lireMesFormations($employe_id) permet de sélectionner toutes mes formations
function lireMesFormations($employe_id)
{
    $pdo = connexionBDD();
    $sql = "SELECT * FROM formation LEFT JOIN inscrire ON formation.id = inscrire.Formation_id WHERE inscrire.Employe_id =:employe_id";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute(array(
        ":employe_id" => $employe_id
    ));
    $resultat = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    $pdoStatement->closeCursor();
    return $resultat;
}