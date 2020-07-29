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
function creerUneFormation($intitule)
{
    $pdo = connexionBDD();
    $sql = "INSERT INTO formation (intitule) VALUES (:intitule)";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":intitule" => $intitule
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
function editerLaFormation($id, $intitule)
{
    $pdo = connexionBDD();
    $sql = "UPDATE formation SET intitule=:intitule WHERE id=:id";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":intitule" => $intitule,
        ":id" => $id
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction lireTouteslesFormations() permet de sélectionner toutes les formations
function lireTouteslesFormations()
{
    $pdo = connexionBDD();
    $sql = "SELECT * FROM formation";
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

//La fonction creerUneDuree() permet comme son nom ne l'indique pas de créer une durée
function creerUneDuree($datedebut, $datefin)
{
    $pdo = connexionBDD();
    $sql = "INSERT INTO duree (datedebut, datefin) VALUES (:datedebut, :datefin)";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":datedebut" => $datedebut,
        ":datefin" => $datefin
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction supprimerLaDuree() permet de supprimer quoi ? Une durée par l'id pardi
function supprimerLaDuree($id)
{
    $pdo = connexionBDD();
    $sql = "DELETE FROM duree WHERE id=:id";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":id" => $id
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction editerLaDuree() permet d'éditer une durée, une seule
function editerLaDuree($id, $datedebut, $datefin)
{
    $pdo = connexionBDD();
    $sql = "UPDATE duree SET datedebut=:datedebut, datefin=:datefin WHERE id=:id";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":datedebut" => $datedebut,
        ":datefin" => $datefin,
        ":id" => $id
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction lireTouteslesDurees() permet de sélectionner toutes les durées
function lireTouteslesDurees()
{
    $pdo = connexionBDD();
    $sql = "SELECT * FROM duree";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute();
    $resultat = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction lireLaDureeParlId() permet de selectionner une durée par, devinez quoi ?, l'id
function lireLaDureeParlId($id)
{
    $pdo = connexionBDD();
    $sql = "SELECT * FROM duree WHERE id=:id";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute(array(
        ":id" => $id
    ));
    $resultat = $pdoStatement->fetch(PDO::FETCH_ASSOC);
    $pdoStatement->closeCursor();
    return $resultat;
}

//La fonction creerUnIntervenant() permet comme son nom ne l'indique pas de créer un intervenant
function creerUnIntervenant($nom, $prenom)
{
    $pdo = connexionBDD();
    $sql = "INSERT INTO intervenant (nom, prenom) VALUES (:nom, :prenom)";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":nom" => $nom,
        ":prenom" => $prenom
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction supprimerlIntervenant() permet de supprimer quoi ? Un intervenant par l'id pardi
function supprimerlIntervenant($id)
{
    $pdo = connexionBDD();
    $sql = "DELETE FROM intervenant WHERE id=:id";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":id" => $id
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction editerlIntervenant() permet d'éditer un intervenant, un seul
function editerlIntervenant($id, $nom, $prenom)
{
    $pdo = connexionBDD();
    $sql = "UPDATE intervenant SET nom=:nom, prenom=:prenom WHERE id=:id";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":nom" => $nom,
        ":prenom" => $prenom,
        ":id" => $id
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction lireTouslesIntervenants() permet de sélectionner tous les intervenants
function lireTouslesIntervenants()
{
    $pdo = connexionBDD();
    $sql = "SELECT * FROM intervenant";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute();
    $resultat = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction lirelIntervenantParlId() permet de selectionner un intervenant par, devinez quoi ?, l'id
function lirelIntervenantParlId($id)
{
    $pdo = connexionBDD();
    $sql = "SELECT * FROM intervenant WHERE id=:id";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute(array(
        ":id" => $id
    ));
    $resultat = $pdoStatement->fetch(PDO::FETCH_ASSOC);
    $pdoStatement->closeCursor();
    return $resultat;
}

//La fonction creerUnPrestataire() permet comme son nom ne l'indique pas de créer un prestataire
function creerUnPrestataire($nom)
{
    $pdo = connexionBDD();
    $sql = "INSERT INTO prestataire (nom) VALUES (:nom)";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":nom" => $nom
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction supprimerlePrestataire() permet de supprimer quoi ? Un prestataire par l'id pardi
function supprimerlePrestataire($id)
{
    $pdo = connexionBDD();
    $sql = "DELETE FROM prestataire WHERE id=:id";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":id" => $id
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction editerlePrestataire() permet d'éditer un prestataire, un seul
function editerlePrestataire($id, $nom)
{
    $pdo = connexionBDD();
    $sql = "UPDATE prestataire SET nom=:nom WHERE id=:id";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":nom" => $nom,
        ":id" => $id
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction lireTouslesPrestataires() permet de sélectionner tous les prestataires
function lireTouslesPrestataires()
{
    $pdo = connexionBDD();
    $sql = "SELECT * FROM prestataire";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute();
    $resultat = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction lirelePrestataireParlId() permet de selectionner un prestataire par, devinez quoi ?, l'id
function lirelePrestataireParlId($id)
{
    $pdo = connexionBDD();
    $sql = "SELECT * FROM prestataire WHERE id=:id";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute(array(
        ":id" => $id
    ));
    $resultat = $pdoStatement->fetch(PDO::FETCH_ASSOC);
    $pdoStatement->closeCursor();
    return $resultat;
}

//La fonction creerUneSalle() permet comme son nom ne l'indique pas de créer une salle
function creerUneSalle($nom)
{
    $pdo = connexionBDD();
    $sql = "INSERT INTO salle (nom) VALUES (:nom)";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":nom" => $nom
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction supprimerlaSalle() permet de supprimer quoi ? Une salle par l'id pardi
function supprimerlaSalle($id)
{
    $pdo = connexionBDD();
    $sql = "DELETE FROM salle WHERE id=:id";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":id" => $id
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction editerleSalle() permet d'éditer une salle, une seule
function editerlaSalle($id, $nom)
{
    $pdo = connexionBDD();
    $sql = "UPDATE salle SET nom=:nom WHERE id=:id";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":nom" => $nom,
        ":id" => $id
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction lireTouteslesSalles() permet de sélectionner toutes les salles
function lireTouteslesSalles()
{
    $pdo = connexionBDD();
    $sql = "SELECT * FROM salle";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute();
    $resultat = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction lirelaSalleParlId() permet de selectionner une salle par, devinez quoi ?, l'id
function lirelaSalleParlId($id)
{
    $pdo = connexionBDD();
    $sql = "SELECT * FROM salle WHERE id=:id";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute(array(
        ":id" => $id
    ));
    $resultat = $pdoStatement->fetch(PDO::FETCH_ASSOC);
    $pdoStatement->closeCursor();
    return $resultat;
}

//La fonction creerUneSession() permet comme son nom ne l'indique pas de créer une session de formation
function creerUneSession($formation, $duree, $salle, $intervenant, $prestataire)
{
    $pdo = connexionBDD();
    $sql = "INSERT INTO session (formation_id, duree_id, salle_id, intervenant_id, prestataire_id) VALUES (:formation, :duree, :salle, :intervenant, :prestataire)";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":formation" => $formation,
        ":duree" => $duree,
        ":salle" => $salle,
        ":intervenant" => $intervenant,
        ":prestataire" => $prestataire
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction supprimerlaSession() permet de supprimer quoi ? Une session de formation par l'id pardi
function supprimerlaSession($id)
{
    $pdo = connexionBDD();
    $sql = "DELETE FROM session WHERE id=:id";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":id" => $id
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction editerleSession() permet d'éditer une session de formation, une seule
function editerlaSession($id, $formation, $duree, $salle, $intervenant, $prestataire)
{
    $pdo = connexionBDD();
    $sql = "UPDATE session SET formation_id=:formation, duree_id=:duree, salle_id=:salle, intervenant_id=:intervenant, prestataire_id=:prestataire WHERE id=:id";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":formation" => $formation,
        ":duree" => $duree,
        ":salle" => $salle,
        ":intervenant" => $intervenant,
        ":prestataire" => $prestataire,
        ":id" => $id
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction sinscrireAUneSession() permet - surprise - de s'inscrire à une session de formation pour l'employé
function sinscrireAUneSession($employe_id, $session_id)
{
    $pdo = connexionBDD();
    $sql = "INSERT INTO inscrire (employe_id, session_id) VALUES (:employe_id, :session_id)";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":employe_id" => $employe_id,
        ":session_id" => $session_id
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction SeDesinscrireAMaSession($employe_id, $session_id) permet de se désinscrire à une session de formation et voilà
function SeDesinscrireAMaSession($employe_id, $session_id)
{
    $pdo = connexionBDD();
    $sql = "DELETE FROM inscrire WHERE employe_id=:employe_id AND session_id=:session_id";
    $pdoStatement = $pdo->prepare($sql);
    $resultat = $pdoStatement->execute(array(
        ":employe_id" => $employe_id,
        ":session_id" => $session_id
    ));
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction lireMesSessions($employe_id) permet de sélectionner toutes mes sessions de formations
function lireMesSessions($employe_id)
{
    $pdo = connexionBDD();
    $sql = "SELECT session.id, formation.intitule AS intitule_formation, 
    duree.datedebut, duree.datefin, 
    salle.nom AS nom_salle, 
    intervenant.nom AS nom_intervenant, 
    intervenant.prenom AS prenom_intervenant, 
    prestataire.nom AS nom_prestataire
    FROM session 
    JOIN formation ON session.formation_id = formation.id
    JOIN duree ON session.duree_id = duree.id
    JOIN salle ON session.salle_id = salle.id 
    JOIN intervenant ON session.intervenant_id = intervenant.id
    JOIN prestataire ON session.prestataire_id = prestataire.id
    JOIN inscrire ON session.id = inscrire.session_id 
    JOIN employe ON inscrire.employe_id = employe.id
    WHERE employe.id = :employe_id";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute(array(
        ":employe_id" => $employe_id
    ));
    $resultat = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction lireTouteslesSessions() permet de - à votre avis - de lire toutes les sessions existantes
function lireTouteslesSessions()
{
    $pdo = connexionBDD();
    $sql = "SELECT session.id, formation.intitule AS intitule_formation, 
    duree.datedebut, duree.datefin, 
    salle.nom AS nom_salle, 
    intervenant.nom AS nom_intervenant, 
    intervenant.prenom AS prenom_intervenant, 
    prestataire.nom AS nom_prestataire
    FROM session  
    JOIN formation ON session.formation_id = formation.id
    JOIN duree ON session.duree_id = duree.id 
    JOIN salle ON session.salle_id = salle.id 
    JOIN intervenant ON session.intervenant_id = intervenant.id 
    JOIN prestataire ON session.prestataire_id = prestataire.id";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute();
    $resultat = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction lirelaSessionAvecInformationParlId() permet de selectionner une session de formation par, devinez quoi ?, l'id mais en affichant les informations supplémentaires comme par exemple le nom de la formation, de la salle, de l'intervenant, de la durée et du prestataire
function lirelaSessionAvecInformationParlId($id)
{
    $pdo = connexionBDD();
    $sql = "SELECT session.id, formation.intitule AS intitule_formation, 
    duree.datedebut, duree.datefin, 
    salle.nom AS nom_salle, 
    intervenant.nom AS nom_intervenant, 
    intervenant.prenom AS prenom_intervenant, 
    prestataire.nom AS nom_prestataire
    FROM session  
    JOIN formation ON session.formation_id = formation.id
    JOIN duree ON session.duree_id = duree.id 
    JOIN salle ON session.salle_id = salle.id 
    JOIN intervenant ON session.intervenant_id = intervenant.id 
    JOIN prestataire ON session.prestataire_id = prestataire.id 
    WHERE session.id=:id";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute(array(
        ":id" => $id
    ));
    $resultat = $pdoStatement->fetch(PDO::FETCH_ASSOC);
    $pdoStatement->closeCursor();
    return $resultat;
}

// La fonction lirelaSessionParlId() permet de selectionner une session de formation par, devinez quoi ?, l'id
function lirelaSessionParlId($id)
{
    $pdo = connexionBDD();
    $sql = "SELECT * FROM session  
    WHERE session.id=:id";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute(array(
        ":id" => $id
    ));
    $resultat = $pdoStatement->fetch(PDO::FETCH_ASSOC);
    $pdoStatement->closeCursor();
    return $resultat;
}
