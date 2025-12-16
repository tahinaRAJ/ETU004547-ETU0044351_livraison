CREATE DATABASE IF NOT EXISTS taxi_be;
USE taxi_be;


-- Table véhicules
CREATE TABLE tb_vehicules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marque VARCHAR(50),
    modele VARCHAR(50),
    versement_minimum DECIMAL(10,2) DEFAULT 50.00
);

-- Table chauffeurs
CREATE TABLE tb_chauffeurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL
);

-- Table trajets
CREATE TABLE tb_trajets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vehicule_id INT,
    chauffeur_id INT,
    point_depart VARCHAR(100),
    point_arrivee VARCHAR(100),
    date_heure_debut DATETIME,
    date_heure_fin DATETIME,
    distance_km DECIMAL(10,2),
    montant_recette DECIMAL(10,2),
    montant_carburant DECIMAL(10,2),
    taux_utilise DECIMAL(5,2),      
    salaire_chauffeur DECIMAL(10,2),
    FOREIGN KEY (vehicule_id) REFERENCES tb_vehicules(id),
    FOREIGN KEY (chauffeur_id) REFERENCES tb_chauffeurs(id)
);

-- Table pannes
CREATE TABLE tb_pannes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vehicule_id INT,
    date_debut_panne DATE NOT NULL,
    date_fin_panne DATE,
    description TEXT,
    FOREIGN KEY (vehicule_id) REFERENCES tb_vehicules(id)
);

-- Table paramètres salaire (pourcentage modifiable)
CREATE TABLE tb_parametres_salaire (
  id INT AUTO_INCREMENT PRIMARY KEY,
  taux_bas DECIMAL(5,2) DEFAULT 0.08,
  taux_haut DECIMAL(5,2) DEFAULT 0.25,
  date_debut DATE DEFAULT (CURRENT_DATE)
);

DROP VIEW IF EXISTS vue_benefice_par_vehicule;
CREATE VIEW vue_benefice_par_vehicule AS
SELECT 
    v.id AS vehicule_id,
    v.marque,
    v.modele,
    SUM(t.montant_recette - t.montant_carburant) AS total_benefice
FROM tb_trajets t
JOIN tb_vehicules v ON v.id = t.vehicule_id
GROUP BY v.id, v.marque, v.modele;

DROP VIEW IF EXISTS vue_benefice_par_jour;
CREATE VIEW vue_benefice_par_jour AS
SELECT 
    DATE(t.date_heure_debut) AS jour,
    SUM(t.montant_recette - t.montant_carburant) AS total_benefice
FROM tb_trajets t
GROUP BY jour;

DROP VIEW IF EXISTS vue_trajets_par_jour;
CREATE VIEW vue_trajets_par_jour AS
SELECT 
    DATE(t.date_heure_debut) AS jour,
    CONCAT(c.nom, ' ', c.prenom) AS chauffeur,
    v.id AS vehicule_id,
    v.marque,
    v.modele,
    SUM(t.distance_km) AS km_total,
    SUM(t.montant_recette) AS total_recette,
    SUM(t.montant_carburant) AS total_carburant
FROM tb_trajets t
JOIN tb_vehicules v ON v.id = t.vehicule_id
JOIN tb_chauffeurs c ON c.id = t.chauffeur_id
GROUP BY 
    jour,
    chauffeur,
    v.id,
    v.marque,
    v.modele;

DROP VIEW IF EXISTS vue_trajet_rentable_par_jour;
CREATE VIEW vue_trajet_rentable_par_jour AS
SELECT 
    t.id AS trajet_id,
    DATE(t.date_heure_debut) AS jour,
    CONCAT(c.nom, ' ', c.prenom) AS chauffeur,
    v.id AS vehicule_id,
    v.marque,
    v.modele,
    t.point_depart,
    t.point_arrivee,
    t.distance_km,
    t.montant_recette,
    t.montant_carburant,
    (t.montant_recette - t.montant_carburant) AS benefice
FROM tb_trajets t
JOIN tb_vehicules v ON v.id = t.vehicule_id
JOIN tb_chauffeurs c ON c.id = t.chauffeur_id
WHERE (t.montant_recette - t.montant_carburant) = (
    SELECT MAX(t2.montant_recette - t2.montant_carburant)
    FROM tb_trajets t2
    WHERE DATE(t2.date_heure_debut) = DATE(t.date_heure_debut)
);

DROP VIEW IF EXISTS vue_voitures_disponibles;
CREATE VIEW vue_voitures_disponibles AS
SELECT 
    v.id AS vehicule_id,
    v.marque,
    v.modele,
    v.versement_minimum
FROM tb_vehicules v
WHERE NOT EXISTS (
    SELECT 1 FROM tb_pannes p
    WHERE p.vehicule_id = v.id
      AND p.date_debut_panne <= CURDATE()
      AND (p.date_fin_panne IS NULL OR p.date_fin_panne >= CURDATE())
);

-- Table véhicules
DROP TABLE tb_vehicules ;

-- Table chauffeurs
DROP TABLE tb_chauffeurs;

-- Table trajets
DROP TABLE tb_trajets;

-- Table pannes
DROP table tb_pannes ;
 
-- Table paramètres salaire (pourcentage modifiable)
DROP  table tb_parametres_salaire;

DROP VIEW IF EXISTS vue_benefice_par_vehicule;
CREATE VIEW vue_benefice_par_vehicule AS
SELECT 
    v.id AS vehicule_id,
    v.marque,
    v.modele,
    SUM(t.montant_recette - t.montant_carburant) AS total_benefice
FROM tb_trajets t
JOIN tb_vehicules v ON v.id = t.vehicule_id
GROUP BY v.id, v.marque, v.modele;

DROP VIEW IF EXISTS vue_benefice_par_jour;
CREATE VIEW vue_benefice_par_jour AS
SELECT 
    DATE(t.date_heure_debut) AS jour,
    SUM(t.montant_recette - t.montant_carburant) AS total_benefice
FROM tb_trajets t
GROUP BY jour;

DROP VIEW IF EXISTS vue_trajets_par_jour;
CREATE VIEW vue_trajets_par_jour AS
SELECT 
    DATE(t.date_heure_debut) AS jour,
    CONCAT(c.nom, ' ', c.prenom) AS chauffeur,
    v.id AS vehicule_id,
    v.marque,
    v.modele,
    SUM(t.distance_km) AS km_total,
    SUM(t.montant_recette) AS total_recette,
    SUM(t.montant_carburant) AS total_carburant
FROM tb_trajets t
JOIN tb_vehicules v ON v.id = t.vehicule_id
JOIN tb_chauffeurs c ON c.id = t.chauffeur_id
GROUP BY 
    jour,
    chauffeur,
    v.id,
    v.marque,
    v.modele;

DROP VIEW IF EXISTS vue_trajet_rentable_par_jour;
CREATE VIEW vue_trajet_rentable_par_jour AS
SELECT 
    t.id AS trajet_id,
    DATE(t.date_heure_debut) AS jour,
    CONCAT(c.nom, ' ', c.prenom) AS chauffeur,
    v.id AS vehicule_id,
    v.marque,
    v.modele,
    t.point_depart,
    t.point_arrivee,
    t.distance_km,
    t.montant_recette,
    t.montant_carburant,
    (t.montant_recette - t.montant_carburant) AS benefice
FROM tb_trajets t
JOIN tb_vehicules v ON v.id = t.vehicule_id
JOIN tb_chauffeurs c ON c.id = t.chauffeur_id
WHERE (t.montant_recette - t.montant_carburant) = (
    SELECT MAX(t2.montant_recette - t2.montant_carburant)
    FROM tb_trajets t2
    WHERE DATE(t2.date_heure_debut) = DATE(t.date_heure_debut)
);

DROP VIEW IF EXISTS vue_voitures_disponibles;
CREATE VIEW vue_voitures_disponibles AS
SELECT 
    v.id AS vehicule_id,
    v.marque,
    v.modele,
    v.versement_minimum
FROM tb_vehicules v
WHERE NOT EXISTS (
    SELECT 1 FROM tb_pannes p
    WHERE p.vehicule_id = v.id
      AND p.date_debut_panne <= CURDATE()
      AND (p.date_fin_panne IS NULL OR p.date_fin_panne >= CURDATE())
);