-- Insertion des données dans les tables
-- Livreurs
INSERT INTO liv_livreurs (nom, prenom, salaire_journalier) VALUES
('Rakoto', 'Noah', 20000.00),
('Rabe', 'Lala', 18000.00),
('Andri', 'Tiana', 22000.00),
('Rasoa', 'Micka', 21000.00),
('Raharinirina', 'Hery', 19500.00),
('Ando', 'Mamy', 20500.00);

-- Véhicules
INSERT INTO liv_vehicules (marque, modele, cout_journalier) VALUES
('Toyota', 'Hiace', 35000.00),
('Hyundai', 'H1', 32000.00),
('Mercedes', 'Sprinter', 40000.00),
('Ford', 'Transit', 37000.00),
('Nissan', 'Urvan', 33000.00),
('Renault', 'Master', 34000.00);

-- Zones
INSERT INTO liv_zones (nom_zone, type) VALUES
('Andoharanofotsy', 'entrepôt'),
('Ambohibao', 'destination'),
('Analakely', 'entrepôt'),
('Soarano', 'destination'),
('Ivandry', 'entrepôt'),
('Ankorondrano', 'destination'),
('Itaosy', 'entrepôt'),
('Anosy', 'destination'),
('Analamahitsy', 'entrepôt'),
('67Ha', 'destination'),
('Ampefiloha', 'entrepôt'),
('Ivato', 'destination'),
('Ankadimbahoaka', 'entrepôt'),
('Ambodivona', 'destination'),
('Ankorahotra', 'entrepôt'),
('Ambatoroka', 'entrepôt');

-- Colis
INSERT INTO liv_colis (poids_kg, cout_par_kg) VALUES
(10.5, 1500.00),
(7.2, 1200.00),
(15.0, 1800.00),
(5.5, 1000.00),
(12.0, 1600.00),
(8.8, 1300.00);

-- Affectations
INSERT INTO liv_affectations (livreur_id, vehicule_id, date_affectation) VALUES
(1, 1, '2025-12-08'),
(2, 2, '2025-12-08'),
(3, 3, '2025-12-08'),
(4, 4, '2025-12-09'),
(5, 5, '2025-12-09'),
(6, 6, '2025-12-10');

-- Livraisons
INSERT INTO liv_livraisons (colis_id, affectation_id, zone_depart_id, zone_arrivee_id, statut, date_livraison, prix_facture_client) VALUES
(1, 1, 1, 2, 'livré', '2025-12-08', 80000.00),
(2, 2, 3, 4, 'livré', '2025-12-08', 60000.00),
(3, 3, 5, 6, 'livré', '2025-12-08', 95000.00),
(4, 4, 7, 8, 'livré', '2025-12-09', 50000.00),
(5, 5, 9, 10, 'livré', '2025-12-09', 75000.00),
(6, 6, 11, 12, 'livré', '2025-12-10', 70000.00);
VALUES
('Ford', 'Transit', 55.00),
('Nissan', 'Urvan', 48.00),
('Renault', 'Master', 52.00);

-- Chauffeurs supplémentaires
INSERT INTO tb_chauffeurs (nom, prenom)
VALUES
('Rasoa', 'Micka'),
('Raharinirina', 'Hery'),
('Ando', 'Mamy');

-- Pannes supplémentaires
INSERT INTO tb_pannes (vehicule_id, date_debut_panne, date_fin_panne, description)
VALUES
(4, '2025-12-12', '2025-12-13', 'Révision freins'),
(5, '2025-12-09', '2025-12-10', 'Fuite carburant');

-- Trajets supplémentaires
INSERT INTO tb_trajets (vehicule_id, chauffeur_id, point_depart, point_arrivee, date_heure_debut, date_heure_fin, distance_km, montant_recette, montant_carburant, taux_utilise, salaire_chauffeur)
VALUES
(1, 4, 'Itaosy', 'Anosy', '2025-12-09 07:45:00', '2025-12-09 08:30:00', 9.5, 45.00, 9.00, 0.25, 11.25),
(2, 5, 'Analamahitsy', '67Ha', '2025-12-09 10:00:00', '2025-12-09 10:50:00', 11.0, 55.00, 11.50, 0.08, 4.40),
(3, 6, 'Ampefiloha', 'Ivato', '2025-12-10 06:30:00', '2025-12-10 07:20:00', 14.2, 70.00, 14.00, 0.25, 17.50),
(4, 1, 'Ankadimbahoaka', 'Ambodivona', '2025-12-11 08:15:00', '2025-12-11 09:05:00', 10.8, 52.00, 10.50, 0.25, 13.00),
(5, 2, 'Ankorahotra', 'Ampefiloha', '2025-12-11 11:00:00', '2025-12-11 11:40:00', 7.3, 36.00, 7.80, 0.08, 2.88),
(6, 3, 'Ambatoroka', 'Anosy', '2025-12-12 09:20:00', '2025-12-12 10:05:00', 9.9, 58.00, 11.00, 0.25, 14.50),
(2, 4, 'Soarano', 'Ivandry', '2025-12-12 16:00:00', '2025-12-12 16:45:00', 8.7, 46.00, 9.20, 0.08, 3.68),
(1, 5, 'Tsaralalana', 'Ankadifotsy', '2025-12-13 07:10:00', '2025-12-13 07:50:00', 6.5, 32.00, 6.20, 0.25, 8.00),
(3, 6, 'Andavamamba', 'Ambatobe', '2025-12-13 09:30:00', '2025-12-13 10:20:00', 13.4, 68.00, 12.50, 0.25, 17.00);
