DROP TABLE IF EXISTS employe ;
CREATE TABLE employe (id SERIAL NOT NULL,
nom VARCHAR(255),
prenom VARCHAR(255),
email VARCHAR(255),
motpasse VARCHAR(255),
statut smallint,
PRIMARY KEY (id));

DROP TABLE IF EXISTS formation ;
CREATE TABLE formation (id SERIAL NOT NULL,
intitule VARCHAR(255),
PRIMARY KEY (id));

DROP TABLE IF EXISTS salle ;
CREATE TABLE salle (id SERIAL NOT NULL,
nom VARCHAR(255),
PRIMARY KEY (id));

DROP TABLE IF EXISTS duree ;
CREATE TABLE duree (id SERIAL NOT NULL,
datedebut DATE,
datefin DATE,
PRIMARY KEY (id));

DROP TABLE IF EXISTS intervenant ;
CREATE TABLE intervenant (id SERIAL NOT NULL,
nom VARCHAR(255),
PRIMARY KEY (id));

DROP TABLE IF EXISTS session ;
CREATE TABLE session (id_session SERIAL NOT NULL,
PRIMARY KEY (id_session));

DROP TABLE IF EXISTS prestataire ;
CREATE TABLE prestataire (id SERIAL NOT NULL,
nom VARCHAR(255),
PRIMARY KEY (id));

DROP TABLE IF EXISTS inscrire ;
CREATE TABLE inscrire (employe_id integer NOT NULL,
session_id integer NOT NULL,
PRIMARY KEY (employe_id,
 session_id));

DROP TABLE IF EXISTS session ;
CREATE TABLE session (
id_session SERIAL NOT NULL,
formation_id integer NOT NULL,
salle_id integer NOT NULL,
duree_id integer NOT NULL,
prestataire_id integer NOT NULL,
intervenant_id integer NOT NULL,
PRIMARY KEY (id_session,
 formation_id,
 salle_id,
 duree_id,
 prestataire_id,
 intervenant_id));

ALTER TABLE inscrire ADD CONSTRAINT FK_inscrire_id_employe FOREIGN KEY (id_employe) REFERENCES employe (id);

ALTER TABLE inscrire ADD CONSTRAINT FK_inscrire_id_session FOREIGN KEY (id_session) REFERENCES session (id);
ALTER TABLE session ADD CONSTRAINT FK_session_formation_id FOREIGN KEY (formation_id) REFERENCES formation (id);
ALTER TABLE session ADD CONSTRAINT FK_session_id_session FOREIGN KEY (id_session) REFERENCES session (id_session);
ALTER TABLE session ADD CONSTRAINT FK_session_salle_id FOREIGN KEY (salle_id) REFERENCES salle (id);
ALTER TABLE session ADD CONSTRAINT FK_session_duree_id FOREIGN KEY (duree_id) REFERENCES duree (id);
ALTER TABLE session ADD CONSTRAINT FK_session_prestataire_id FOREIGN KEY (prestataire_id) REFERENCES prestataire (id);
ALTER TABLE session ADD CONSTRAINT FK_session_intervenant_id FOREIGN KEY (intervenant_id) REFERENCES intervenant (id);
