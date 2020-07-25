-- Affichage des formation de l'employé (par exemple ayant l'id 22) -- 
SELECT formation.id, formation.intitule, duree.datedebut, duree.datefin, salle.nom, intervenant.nom, intervenant.prenom, prestataire.nom 
FROM formation
JOIN duree ON session.duree_id = duree.id 
JOIN salle ON session.salle_id = salle.id 
JOIN intervenant ON session.intervenant_id = intervenant.id 
JOIN prestataire ON session.prestataire_id = prestataire.id
JOIN inscrire ON session.id = inscrire.session_id 
JOIN employe ON employe.id = session.employe_id 
WHERE employe.id = 22 

-- Affichage de la formation (par exemple ayant l'id 1) -- 
SELECT formation.id, formation.intitule, duree.datedebut, duree.datefin, salle.nom, intervenant.nom, intervenant.prenom, prestataire.nom
FROM formation  
JOIN session ON formation.id = session.formation_id 
JOIN duree ON session.duree_id = duree.id 
JOIN salle ON session.salle_id = salle.id 
JOIN intervenant ON session.intervenant_id = intervenant.id 
JOIN prestataire ON session.prestataire_id = prestataire.id 
WHERE formation.id = 1 

-- Affichage de toutes les formations --
SELECT formation.id, formation.intitule, duree.datedebut, duree.datefin, salle.nom, intervenant.nom, intervenant.prenom, prestataire.nom
FROM formation  
JOIN session ON formation.id = session.formation_id 
JOIN duree ON session.duree_id = duree.id 
JOIN salle ON session.salle_id = salle.id 
JOIN intervenant ON session.intervenant_id = intervenant.id 
JOIN prestataire ON session.prestataire_id = prestataire.id 