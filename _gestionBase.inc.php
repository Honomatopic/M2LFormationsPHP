<?php

// Fichier qui recense toutes les fonctions qui interagissent avec la base de données m2lformations

// La fonction gestionnairedeConnexion() permet la connexion à la base de données
function gestionnaireDeConnexion()
{
    $cnx = NULL;
    $bdd_hote = "localhost";
    $bdd_utilisateur = "root";
    $bdd_motpasse = "";
    $bdd_nom = "m2lformations";
    $cnx = mysqli_connect($bdd_hote, $bdd_utilisateur, $bdd_motpasse, $bdd_nom)
        or die("Pas de connexion à la base de données");
    if (mysqli_connect_errno()) {
        echo "Echec de la connexion : " . mysqli_connect_error();
        exit();
    }
	mysqli_set_charset($cnx, 'utf8');
    return $cnx;
}

gestionnaireDeConnexion();

//La fonction seConnecter($email) permet à l'employé de se connecter
function seConnecter($email)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM employe WHERE email='$email'";
        $requete_exec = mysqli_query($cnx, $req);
        $lemploye = mysqli_fetch_assoc($requete_exec);
    } else {
        echo "Une erreur est survenue";
    }
    return $lemploye;
}

// La fonction creerUnEmploye($nom, $prenom, $email, $motpasse, $statut) permet de créer -sans blague - un nouvel employé
function creerUnEmploye($nom, $prenom, $email, $motpasse, $statut)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "INSERT INTO employe (nom, prenom, email, motpasse, statut) VALUES ('$nom', '$prenom', '$email', '$motpasse', '$statut')";
        $creer_employe = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $$creer_employe;
}

// La fonction supprimerlEmploye($id) permet de supprimer un employé par quoi ? Son id pardis
function supprimerlEmploye($id)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "DELETE FROM employe WHERE id='$id'";
        $supprimer_employe = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $supprimer_employe;
}

// La fonction editerlEmploye($nom, $prenom, $email, $motpasse, $statut, $id) permet d'éditer les informations d'un employé avec son id voyons !
function editerlEmploye($nom, $prenom, $email, $motpasse, $statut, $id)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "UPDATE employe SET nom='$nom', prenom='$prenom', email='$email', motpasse='$motpasse', statut='$statut' WHERE id='$id'";
        $editer_employe = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $editer_employe;
}

// La fonction lireTouslesEmployes() permet d'afficher tous les employés de l'association, d'un coup !
function lireTouslesEmployes()
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM employe";
        $lesEmployes = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $lesEmployes;
}

// La fonction lireUnEmployeParlId($id) permet d'afficher dans un formulaire les informations d'un employé
function lireUnEmployeParlId($id)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM employe WHERE id='$id'";
        $lemploye = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $lemploye;
}

//La fonction creerUneFormation($intitule) permet comme son nom ne l'indique pas de créer une formation
function creerUneFormation($intitule)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "INSERT INTO formation (intitule) VALUES ('$intitule')";
        $creer_formation = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $creer_formation;
}

// La fonction supprimerLaFormation() permet de supprimer quoi ? Une formation par l'id pardi
function supprimerLaFormation($id)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "DELETE FROM formation WHERE id='$id'";
        $supprimer_formation = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $supprimer_formation;
}

// La fonction editerLaFormation() permet d'éditer une formation, une seule
function editerLaFormation($id, $intitule)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "UPDATE formation SET intitule='$intitule' WHERE id='$id'";
        $editer_formation = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $editer_formation;
}

// La fonction lireTouteslesFormations() permet de sélectionner toutes les formations
function lireTouteslesFormations()
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM formation";
        $lesFormations = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $lesFormations;
}

// La fonction lireLaFormationParlId($id) permet de selectionner une formation par, devinez quoi ?, l'id
function lireLaFormationParlId($id)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM formation WHERE id='$id'";
        $laFormation = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $laFormation;
}

//La fonction creerUneDuree() permet comme son nom ne l'indique pas de créer une durée
function creerUneDuree($datedebut, $datefin)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "INSERT INTO duree (datedebut, datefin) VALUES ('$datedebut', '$datefin')";
        $creer_duree = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $creer_duree;
}

// La fonction supprimerLaDuree($id) permet de supprimer quoi ? Une durée par l'id pardi
function supprimerLaDuree($id)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "DELETE FROM duree WHERE id='$id'";
        $supprimer_duree = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $supprimer_duree;
}

// La fonction editerLaDuree($id, $datedebut, $datefin) permet d'éditer une durée, une seule
function editerLaDuree($id, $datedebut, $datefin)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "UPDATE duree SET datedebut='$datedebut', datefin='$datefin' WHERE id='$id'";
        $editer_duree = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $editer_duree;
}

// La fonction lireTouteslesDurees() permet de sélectionner toutes les durées
function lireTouteslesDurees()
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM duree";
        $lesDurees = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $lesDurees;
}

// La fonction lireLaDureeParlId($id) permet de selectionner une durée par, devinez quoi ?, l'id
function lireLaDureeParlId($id)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM duree WHERE id='$id'";
        $laDuree = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $laDuree;
}

//La fonction creerUnIntervenant() permet comme son nom ne l'indique pas de créer un intervenant
function creerUnIntervenant($nom, $prenom)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "INSERT INTO intervenant (nom, prenom) VALUES ('$nom', '$prenom')";
        $creer_intervenant = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $creer_intervenant;
}

// La fonction supprimerlIntervenant($id) permet de supprimer quoi ? Un intervenant par l'id pardi
function supprimerlIntervenant($id)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "DELETE FROM intervenant WHERE id='$id'";
        $supprimer_intervenant = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $supprimer_intervenant;
}

// La fonction editerlIntervenant($id, $nom, $prenom) permet d'éditer un intervenant, un seul
function editerlIntervenant($id, $nom, $prenom)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "UPDATE intervenant SET nom='$nom', prenom='$prenom' WHERE id='$id'";
        $editer_intervenant = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $editer_intervenant;
}

// La fonction lireTouslesIntervenants() permet de sélectionner tous les intervenants
function lireTouslesIntervenants()
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM intervenant";
        $lesintervenants = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $lesintervenants;
}

// La fonction lirelIntervenantParlId() permet de selectionner un intervenant par, devinez quoi ?, l'id
function lirelIntervenantParlId($id)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM intervenant WHERE id='$id'";
        $lIntervenant = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $lIntervenant;
}

//La fonction creerUnPrestataire() permet comme son nom ne l'indique pas de créer un prestataire
function creerUnPrestataire($nom)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "INSERT INTO prestataire (nom) VALUES ('$nom')";
        $creer_prestataire = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $creer_prestataire;
}

// La fonction supprimerlePrestataire() permet de supprimer quoi ? Un prestataire par l'id pardi
function supprimerlePrestataire($id)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "DELETE FROM prestataire WHERE id='$id'";
        $supprimer_prestataire = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $supprimer_prestataire;
}

// La fonction editerlePrestataire() permet d'éditer un prestataire, un seul
function editerlePrestataire($id, $nom)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "UPDATE prestataire SET nom='$nom' WHERE id='$id'";
        $editer_prestataire = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $editer_prestataire;
}

// La fonction lireTouslesPrestataires() permet de sélectionner tous les prestataires
function lireTouslesPrestataires()
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM prestataire";
        $lesPrestataires = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $lesPrestataires;
}

// La fonction lirelePrestataireParlId() permet de selectionner un prestataire par, devinez quoi ?, l'id
function lirelePrestataireParlId($id)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM prestataire WHERE id='$id'";
        $lePrestataire = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $lePrestataire;
}

//La fonction creerUneSalle() permet comme son nom ne l'indique pas de créer une salle
function creerUneSalle($nom)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "INSERT INTO salle (nom) VALUES ('$nom')";
        $creer_salle = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $creer_salle;
}

// La fonction supprimerlaSalle() permet de supprimer quoi ? Une salle par l'id pardi
function supprimerlaSalle($id)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "DELETE FROM salle WHERE id='$id'";
        $supprimer_salle = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $supprimer_salle;
}

// La fonction editerleSalle() permet d'éditer une salle, une seule
function editerlaSalle($id, $nom)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "UPDATE salle SET nom='$nom' WHERE id='$id'";
        $editer_salle = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $editer_salle;
}

// La fonction lireTouteslesSalles() permet de sélectionner toutes les salles
function lireTouteslesSalles()
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM salle";
        $lesSalles = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $lesSalles;
}

// La fonction lirelaSalleParlId() permet de selectionner une salle par, devinez quoi ?, l'id
function lirelaSalleParlId($id)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM salle WHERE id='$id'";
        $laSalle = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $laSalle;
}

//La fonction creerUneSession() permet comme son nom ne l'indique pas de créer une session de formation
function creerUneSession($formation, $duree, $salle, $intervenant, $prestataire)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "INSERT INTO session (formation_id, duree_id, salle_id, intervenant_id, prestataire_id) VALUES ('$formation', '$duree', '$salle', '$intervenant', '$prestataire')";
        $creer_session = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $creer_session;
}

// La fonction supprimerlaSession() permet de supprimer quoi ? Une session de formation par l'id pardi
function supprimerlaSession($id)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "DELETE FROM session WHERE id='$id'";
        $supprimer_session = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $supprimer_session;
}

// La fonction editerleSession() permet d'éditer une session de formation, une seule
function editerlaSession($id, $formation, $duree, $salle, $intervenant, $prestataire)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "UPDATE session SET formation_id='$formation', duree_id='$duree', salle_id='$salle', intervenant_id='$intervenant', prestataire_id='$prestataire' WHERE id='$id'";
        $editer_session = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $editer_session;
}

// La fonction sinscrireAUneSession() permet - surprise - de s'inscrire à une session de formation pour l'employé
function sinscrireAUneSession($employe_id, $session_id)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "INSERT INTO inscrire (employe_id, session_id) VALUES ('$employe_id', '$session_id')";
        $inscrire_session = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $inscrire_session;
}

// La fonction SeDesinscrireAMaSession($employe_id, $session_id) permet de se désinscrire à une session de formation et voilà
function SeDesinscrireAMaSession($employe_id, $session_id)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "DELETE FROM inscrire WHERE employe_id='$employe_id' AND session_id='$session_id'";
        $desinscrire_session = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $desinscrire_session;
}

// La fonction lireMesSessions($employe_id) permet de sélectionner toutes mes sessions de formations
function lireMesSessions($employe_id)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
    $req = "SELECT session.id, formation.intitule AS intitule_formation, 
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
    WHERE employe.id = '$employe_id'";
    $mesSessions = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $mesSessions;
}

// La fonction lireTouteslesSessions() permet de - à votre avis - de lire toutes les sessions existantes
function lireTouteslesSessions()
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req =  "SELECT session.id, formation.intitule AS intitule_formation, 
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
        $lesSessions = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $lesSessions;
}

// La fonction lirelaSessionAvecInformationParlId() permet de selectionner une session de formation par, devinez quoi ?, l'id mais en affichant les informations supplémentaires comme par exemple le nom de la formation, de la salle, de l'intervenant, de la durée et du prestataire
function lirelaSessionAvecInformationParlId($id)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT session.id, formation.intitule AS intitule_formation, 
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
        WHERE session.id='$id'";
        $laSessionParId = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $laSessionParId ;
}

// La fonction lirelaSessionParlId() permet de selectionner une session de formation par, devinez quoi ?, l'id
function lirelaSessionParlId($id)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM session";
        $laSessionParId = mysqli_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $laSessionParId;
}
