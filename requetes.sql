-- Affichage des sessions de formations de l'employé (par exemple ayant l'id 22) -- 
SELECT session.id, formation.intitule, duree.datedebut, duree.datefin, salle.nom, intervenant.nom, intervenant.prenom, prestataire.nom 
FROM session 
JOIN formation ON session.formation_id = formation.id
JOIN duree ON session.duree_id = duree.id
JOIN salle ON session.salle_id = salle.id 
JOIN intervenant ON session.intervenant_id = intervenant.id
JOIN prestataire ON session.prestataire_id = prestataire.id
JOIN inscrire ON session.id = inscrire.session_id 
JOIN employe ON inscrire.employe_id = employe.id
WHERE employe.id = 22 

-- Affichage de la session (par exemple ayant l'id 1) -- 
SELECT session.id, formation.intitule, duree.datedebut, duree.datefin, salle.nom, intervenant.nom, intervenant.prenom, prestataire.nom
FROM session  
JOIN formation ON session.formation_id = formation.id
JOIN duree ON session.duree_id = duree.id 
JOIN salle ON session.salle_id = salle.id 
JOIN intervenant ON session.intervenant_id = intervenant.id 
JOIN prestataire ON session.prestataire_id = prestataire.id 
WHERE session.id = 1 

-- Affichage de toutes les sessions --
SELECT session.id, formation.intitule, duree.datedebut, duree.datefin, salle.nom, intervenant.nom, intervenant.prenom, prestataire.nom
FROM session  
JOIN formation ON session.formation_id = formation.id
JOIN duree ON session.duree_id = duree.id 
JOIN salle ON session.salle_id = salle.id 
JOIN intervenant ON session.intervenant_id = intervenant.id 
JOIN prestataire ON session.prestataire_id = prestataire.id 