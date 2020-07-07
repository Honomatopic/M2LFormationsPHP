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

// La fonction inscriptionDunAdherent($nom, $prenom, $email, $motpasse, $statut) permet à un adherent de s'inscrire
function inscriptionDunAdherent($nom, $prenom, $email, $motpasse, $statut)
{
    $pdo = connexionBDD();
    $sql = "INSERT INTO adherent (nom, prenom, email, motpasse, statut) VALUES (:nom, :prenom, :email, :motpasse, :statut)";
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

// La fonction seConnecter($email, $motpasse) permet à l'adhérent de se connecter
function seConnecter($email)
{
    $pdo = connexionBDD();
    $sql = "SELECT * FROM adherent WHERE email=:email";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute(array(
        ":email" => $email
    ));
    $resultat = $pdoStatement->fetch(PDO::FETCH_ASSOC);
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction lireUnAdherentParlId($id) permet d'afficher dans un formulaire les informations d'un adherent
function lireUnAdherentParlId($id)
{
    $pdo = connexionBDD();
    $sql = "SELECT * FROM adherent WHERE id=:id";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute(array(
        ":id" => $id
    ));
    $resultat = $pdoStatement->fetch(PDO::FETCH_ASSOC);
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction lireTouslesAdherents() permet de lire tus les adhérents
function lireTouslesAdherents()
{
    $pdo = connexionBDD();
    $sql = "SELECT * FROM adherent";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute();
    $resultat = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction supprimerUnAdherent($id) permet de supprimer un adherent avec le bouton supprimer du formulaire d'édition
function supprimerUnAdherent($id)
{
    $pdo = connexionBDD();
    $sql = "DELETE FROM adherent WHERE id=:id";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":id" => $id
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction editerUnAdherent($id, $nom, $prenom, $email, $motpasse, $statut) permet d'éditer les informations d'un utilisateur grâce à l'id
function editerUnAdherent($id, $nom, $prenom, $email, $motpasse, $statut)
{
    $pdo = connexionBDD();
    $sql = "UPDATE adherent SET nom=:nom, prenom=:prenom, email=:email, motpasse=:motpasse, statut=:statut WHERE id=:id";
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
}

/* La fonction creerUneFormation() permet comme son nom ne l'indique pas de créer une formation
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
}*/

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

// La fonction sinscrireAMaFormation() permet - surprise - d'inscrire une formation pour l'adherent
function sinscrireAMaFormation($adherent_id, $formation_id)
{
    $pdo = connexionBDD();
    $sql = "INSERT INTO inscrire (Adherent_id, Formation_id) VALUES (:adherent_id, :formation_id)";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":adherent_id" => $adherent_id,
        ":formation_id" => $formation_id
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction SeDesinscrireAMaFormation($adherent_id, $formation_id) permet de se désinscrire à une formation et voilà
function SeDesinscrireAMaFormation($adherent_id, $formation_id)
{
    $pdo = connexionBDD();
    $sql = "DELETE FROM inscrire WHERE Adherent_id=:adherent_id AND Formation_id=:formation_id";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":adherent_id" => $adherent_id,
        ":formation_id" => $formation_id
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction lireMesFormations($adherent_id) permet de sélectionner toutes mes formations
function lireMesFormations($adherent_id)
{
    $pdo = connexionBDD();
    $sql = "SELECT * FROM formation LEFT JOIN inscrire ON formation.id = inscrire.Formation_id WHERE inscrire.Adherent_id =:adherent_id";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute(array(
        ":adherent_id" => $adherent_id
    ));
    $resultat = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    $pdoStatement->closeCursor();
    return $resultat;
}
