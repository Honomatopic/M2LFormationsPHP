<?php

// Fichier qui recense toutes les fonctions qui interagissent avec la base de données m2lformations
// La fonction gestionnairedeConnexion() permet la connexion à la base de données
function gestionnaireDeConnexion() {
    $cnx = NULL;
    $bdd_hote = "localhost";
    $bdd_utilisateur = "root";
    $bdd_motpasse = "root";
    $bdd_nom = "m2lformations";
    $bdd_options = "--client_encoding=UTF8";
    $cnx = pg_connect("host=$bdd_hote dbname=$bdd_nom user=$bdd_utilisateur password=$bdd_motpasse options=$bdd_options")
            or die("Pas de connexion à la base de données");
    return $cnx;
}

// La fonction seConnecter($email) permet à l'employé de se connecter
function seConnecter($email) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM employe WHERE email='$email'";
        $requete_exec = pg_query($cnx, $req);
        $lemploye = pg_fetch_assoc($requete_exec);
    } else {
        echo "Une erreur est survenue";
    }
    return $lemploye;
}

// La fonction creerLEmploye($nom, $prenom, $email, $motpasse, $statut) permet de créer - sans blague - un nouvel employé
function creerLEmploye($nom, $prenom, $email, $motpasse, $statut) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "INSERT INTO employe (nom, prenom, email, motpasse, statut) VALUES ('$nom', '$prenom', '$email', '$motpasse', '$statut')";
        $creer_employe = pg_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $creer_employe;
}

// La fonction supprimerLEmploye($id) permet de supprimer un employé par quoi ? Son id pardi
function supprimerLEmploye($id) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "DELETE FROM employe WHERE id='$id'";
        $supprimer_employe = pg_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $supprimer_employe;
}

// La fonction modifierLEmploye($nom, $prenom, $email, $motpasse, $statut, $id) permet d'éditer les informations d'un employé avec son id voyons !
function modifierLEmploye($nom, $prenom, $email, $motpasse, $statut, $id) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "UPDATE employe SET nom='$nom', prenom='$prenom', email='$email', motpasse='$motpasse', statut='$statut' WHERE id='$id'";
        $modifier_employe = pg_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $modifier_employe;
}

// La fonction consulterToutlesEmployes() permet d'afficher tous les employés de l'association, d'un coup !
function consulterToutlesEmployes() {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM employe";
        $requete_exec = pg_query($cnx, $req);
        $lesEmployes = pg_fetch_all($requete_exec);
    } else {
        echo "Une erreur est survenue";
    }
    return $lesEmployes;
}

// La fonction consulterLEmployeParLId($id) permet d'afficher dans un formulaire les informations d'un employé
function consulterLEmployeParLId($id) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM employe WHERE id='$id'";
        $requete_exec = pg_query($cnx, $req);
        $lemploye = pg_fetch_assoc($requete_exec);
    } else {
        echo "Une erreur est survenue";
    }
    return $lemploye;
}

//La fonction creerLaFormation($intitule) permet comme son nom ne l'indique pas de créer une formation
function creerLaFormation($intitule) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "INSERT INTO formation (intitule) VALUES ('$intitule')";
        $creer_formation = pg_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $creer_formation;
}

// La fonction supprimerLaFormation() permet de supprimer quoi ? Une formation par l'id pardi
function supprimerLaFormation($id) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "DELETE FROM formation WHERE id='$id'";
        $supprimer_formation = pg_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $supprimer_formation;
}

// La fonction modifierLaFormation() permet d'éditer une formation, une seule
function modifierLaFormation($id, $intitule) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "UPDATE formation SET intitule='$intitule' WHERE id='$id'";
        $modifier_formation = pg_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $modifier_formation;
}

// La fonction consulterToutesLesFormations() permet de sélectionner toutes les formations
function consulterToutesLesFormations() {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM formation";
        $requete_exec = pg_query($cnx, $req);
        $lesFormations = pg_fetch_all($requete_exec);
    } else {
        echo "Une erreur est survenue";
    }
    return $lesFormations;
}

// La fonction consulterLaFormationParLId($id) permet de selectionner une formation par, devinez quoi ?, l'id
function consulterLaFormationParLId($id) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM formation WHERE id='$id'";
        $requete_exec = pg_query($cnx, $req);
        $laFormation = pg_fetch_assoc($requete_exec);
    } else {
        echo "Une erreur est survenue";
    }
    return $laFormation;
}

//La fonction creerLaDuree() permet comme son nom ne l'indique pas de créer une durée
function creerLaDuree($datedebut, $datefin) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "INSERT INTO duree (datedebut, datefin) VALUES ('$datedebut', '$datefin')";
        $creer_duree = pg_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $creer_duree;
}

// La fonction supprimerLaDuree($id) permet de supprimer quoi ? Une durée par l'id pardi
function supprimerLaDuree($id) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "DELETE FROM duree WHERE id='$id'";
        $supprimer_duree = pg_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $supprimer_duree;
}

// La fonction modifierLaDuree($id, $datedebut, $datefin) permet d'éditer une durée, une seule
function modifierLaDuree($id, $datedebut, $datefin) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "UPDATE duree SET datedebut='$datedebut', datefin='$datefin' WHERE id='$id'";
        $modifier_duree = pg_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $modifier_duree;
}

// La fonction consulterToutesLesDurees() permet de sélectionner toutes les durées
function consulterToutesLesDurees() {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM duree";
        $requete_exec = pg_query($cnx, $req);
        $lesDurees = pg_fetch_all($requete_exec);
    } else {
        echo "Une erreur est survenue";
    }
    return $lesDurees;
}

// La fonction consulterLaDureeParLId($id) permet de selectionner une durée par, devinez quoi ?, l'id
function consulterLaDureeParLId($id) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM duree WHERE id='$id'";
        $requete_exec = pg_query($cnx, $req);
        $laDuree = pg_fetch_assoc($requete_exec);
    } else {
        echo "Une erreur est survenue";
    }
    return $laDuree;
}

//La fonction creerLIntervenant() permet comme son nom ne l'indique pas de créer un intervenant
function creerLIntervenant($nom) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "INSERT INTO intervenant (nom) VALUES ('$nom')";
        $creer_intervenant = pg_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $creer_intervenant;
}

// La fonction supprimerLIntervenant($id) permet de supprimer quoi ? Un intervenant par l'id pardi
function supprimerLIntervenant($id) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "DELETE FROM intervenant WHERE id='$id'";
        $supprimer_intervenant = pg_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $supprimer_intervenant;
}

// La fonction modifierLIntervenant($id, $nom) permet d'éditer un intervenant, un seul
function modifierLIntervenant($id, $nom) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "UPDATE intervenant SET nom='$nom' WHERE id='$id'";
        $modifier_intervenant = pg_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $modifier_intervenant;
}

// La fonction consulterToutLesIntervenants() permet de sélectionner tous les intervenants
function consulterToutLesIntervenants() {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM intervenant";
        $requete_exec = pg_query($cnx, $req);
        $lesIntervenants = pg_fetch_all($requete_exec);
    } else {
        echo "Une erreur est survenue";
    }
    return $lesIntervenants;
}

// La fonction consulterlIntervenantParlId() permet de selectionner un intervenant par, devinez quoi ?, l'id
function consulterLIntervenantParLId($id) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM intervenant WHERE id='$id'";
        $requete_exec = pg_query($cnx, $req);
        $lIntervenant = pg_fetch_assoc($requete_exec);
    } else {
        echo "Une erreur est survenue";
    }
    return $lIntervenant;
}

//La fonction creerLePrestataire() permet comme son nom ne l'indique pas de créer un prestataire
function creerLePrestataire($nom) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "INSERT INTO prestataire (nom) VALUES ('$nom')";
        $creer_prestataire = pg_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $creer_prestataire;
}

// La fonction supprimerLePrestataire() permet de supprimer quoi ? Un prestataire par l'id pardi
function supprimerLePrestataire($id) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "DELETE FROM prestataire WHERE id='$id'";
        $supprimer_prestataire = pg_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $supprimer_prestataire;
}

// La fonction modifierLePrestataire() permet d'éditer un prestataire, un seul
function modifierLePrestataire($id, $nom) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "UPDATE prestataire SET nom='$nom' WHERE id='$id'";
        $modifier_prestataire = pg_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $modifier_prestataire;
}

// La fonction consulterTousLesPrestataires() permet de sélectionner tous les prestataires
function consulterToutLesPrestataires() {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM prestataire";
        $requete_exec = pg_query($cnx, $req);
        $lesPrestataires = pg_fetch_all($requete_exec);
    } else {
        echo "Une erreur est survenue";
    }
    return $lesPrestataires;
}

// La fonction consulterLePrestataireParLId() permet de selectionner un prestataire par, devinez quoi ?, l'id
function consulterLePrestataireParLId($id) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM prestataire WHERE id='$id'";
        $requete_exec = pg_query($cnx, $req);
        $lePrestataire = pg_fetch_assoc($requete_exec);
    } else {
        echo "Une erreur est survenue";
    }
    return $lePrestataire;
}

//La fonction creerLaSalle() permet comme son nom ne l'indique pas de créer une salle
function creerLaSalle($nom) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "INSERT INTO salle (nom) VALUES ('$nom')";
        $creer_salle = pg_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $creer_salle;
}

// La fonction supprimerLaSalle() permet de supprimer quoi ? Une salle par l'id pardi
function supprimerLaSalle($id) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "DELETE FROM salle WHERE id='$id'";
        $supprimer_salle = pg_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $supprimer_salle;
}

// La fonction modifierLaSalle() permet d'éditer une salle, une seule salle sivioupliait
function modifierLaSalle($id, $nom) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "UPDATE salle SET nom='$nom' WHERE id='$id'";
        $modifier_salle = pg_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $modifier_salle;
}

// La fonction consulterToutesLesSalles() permet de sélectionner toutes les salles
function consulterToutesLesSalles() {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM salle";
        $requete_exec = pg_query($cnx, $req);
        $lesSalles = pg_fetch_all($requete_exec);
    } else {
        echo "Une erreur est survenue";
    }
    return $lesSalles;
}

// La fonction consulterLaSalleParlId() permet de selectionner une salle par, devinez quoi ?, l'id
function consulterLaSalleParLId($id) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM salle WHERE id='$id'";
        $requete_exec = pg_query($cnx, $req);
        $laSalle = pg_fetch_assoc($requete_exec);
    } else {
        echo "Une erreur est survenue";
    }
    return $laSalle;
}

//La fonction creerLaSession() permet comme son nom ne l'indique pas de créer une session de formation
function creerLaSession($formation, $duree, $salle, $intervenant, $prestataire) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "INSERT INTO session (formation_id, duree_id, salle_id, intervenant_id, prestataire_id) VALUES ('$formation', '$duree', '$salle', '$intervenant', '$prestataire')";
        $creer_session = pg_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $creer_session;
}

// La fonction supprimerLaSession() permet de supprimer quoi ? Une session de formation par l'id pardi
function supprimerLaSession($id) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "DELETE FROM session WHERE id='$id'";
        $supprimer_session = pg_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $supprimer_session;
}

// La fonction modifierLaSession() permet d'éditer une session de formation, une seule
function modifierLaSession($id, $formation, $duree, $salle, $intervenant, $prestataire) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "UPDATE session SET formation_id='$formation', duree_id='$duree', salle_id='$salle', intervenant_id='$intervenant', prestataire_id='$prestataire' WHERE id='$id'";
        $modifier_session = pg_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $modifier_session;
}

// La fonction sInscrireALaSession() permet - surprise - de s'inscrire à une session de formation pour l'employé
function sInscrireALaSession($employe_id, $session_id) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "INSERT INTO inscrire (employe_id, session_id) VALUES ('$employe_id', '$session_id')";
        $inscrire_session = pg_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $inscrire_session;
}

// La fonction seDesinscrireDeMaSession($employe_id, $session_id) permet de se désinscrire à une session de formation et voilà
function seDesinscrireDeMaSession($employe_id, $session_id) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "DELETE FROM inscrire WHERE employe_id='$employe_id' AND session_id='$session_id'";
        $desinscrire_session = pg_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $desinscrire_session;
}


// La fonction consulterMesSessions($employe_id) permet de sélectionner toutes mes sessions de formations
function consulterMesSessions($employe_id) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT session.id_session, formation.intitule AS intitule_formation, 
    duree.datedebut, duree.datefin, 
    salle.nom AS nom_salle, 
    intervenant.nom AS nom_intervenant, 
    prestataire.nom AS nom_prestataire
    FROM session 
    JOIN formation ON session.formation_id = formation.id
    JOIN duree ON session.duree_id = duree.id
    JOIN salle ON session.salle_id = salle.id 
    JOIN intervenant ON session.intervenant_id = intervenant.id
    JOIN prestataire ON session.prestataire_id = prestataire.id
    JOIN inscrire ON session.id_session = inscrire.session_id 
    JOIN employe ON inscrire.employe_id = employe.id
    WHERE employe.id = '$employe_id'";
        $requete_exec = pg_query($cnx, $req);
        $mesSessions = pg_fetch_all($requete_exec);
    } else {
        echo "Une erreur est survenue";
    }
    return $mesSessions;
}

// La fonction consulterToutesLesSessions() permet de - à votre avis - de consulter toutes les sessions existantes
function consulterToutesLesSessions() {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT session.id_session, formation.intitule AS intitule_formation, 
        duree.datedebut, duree.datefin, 
        salle.nom AS nom_salle, 
        intervenant.nom AS nom_intervenant, 
        prestataire.nom AS nom_prestataire
        FROM session  
        JOIN formation ON session.formation_id = formation.id
        JOIN duree ON session.duree_id = duree.id 
        JOIN salle ON session.salle_id = salle.id 
        JOIN intervenant ON session.intervenant_id = intervenant.id 
        JOIN prestataire ON session.prestataire_id = prestataire.id";
        $requete_exec = pg_query($cnx, $req);
        $lesSessions = pg_fetch_all($requete_exec);
    } else {
        echo "Une erreur est survenue";
    }
    return $lesSessions;
}

// La fonction consulterLaSessionAvecInformationParLId() permet de selectionner une session de formation par, devinez quoi ?, l'id mais en affichant les informations supplémentaires comme par exemple le nom de la formation, de la salle, de l'intervenant, de la durée et du prestataire
function consulterLesInformationsDeLaSessionParLId($id) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT session.id_session, formation.intitule AS intitule_formation, 
        duree.datedebut, duree.datefin, 
        salle.nom AS nom_salle, 
        intervenant.nom AS nom_intervenant, 
        prestataire.nom AS nom_prestataire
        FROM session  
        JOIN formation ON session.formation_id = formation.id
        JOIN duree ON session.duree_id = duree.id 
        JOIN salle ON session.salle_id = salle.id 
        JOIN intervenant ON session.intervenant_id = intervenant.id 
        JOIN prestataire ON session.prestataire_id = prestataire.id 
        WHERE session.id_session='$id'";
        $requete_exec = pg_query($cnx, $req);
        $laSessionParId = pg_fetch_assoc($requete_exec);
    } else {
        echo "Une erreur est survenue";
    }
    return $laSessionParId;
}

// La fonction consulterLesSessionsParLId() permet de selectionner une session de formation par, devinez quoi ?, l'id
function consulterLesSessionsParLId($id) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM session WHERE id_session='$id'";
        $requete_exec = pg_query($cnx, $req);
        $laSessionParId = pg_fetch_assoc($requete_exec);
    } else {
        echo "Une erreur est survenue";
    }
    return $laSessionParId;
}
