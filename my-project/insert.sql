-- Véhicules
INSERT INTO tb_vehicules (marque, modele, versement_minimum)
VALUES 
('Toyota', 'Hiace', 50.00),
('Hyundai', 'H1', 45.00),
('Mercedes', 'Sprinter', 60.00);
-- Chauffeurs
INSERT INTO tb_chauffeurs (nom, prenom)
VALUES
('Rakoto', 'Noah'),
('Rabe', 'Lala'),
('Andri', 'Tiana');

-- Paramètres salaire
INSERT INTO tb_parametres_salaire (taux_bas, taux_haut)
VALUES
(0.08, 0.25);

-- Pannes
INSERT INTO tb_pannes (vehicule_id, date_debut_panne, date_fin_panne, description)
VALUES
(1, '2025-12-05', '2025-12-07', 'Problème moteur'),
(2, '2025-12-10', NULL, 'Panne en cours');

-- Trajets
INSERT INTO tb_trajets (vehicule_id, chauffeur_id, point_depart, point_arrivee, date_heure_debut, date_heure_fin, distance_km, montant_recette, montant_carburant, taux_utilise, salaire_chauffeur)
VALUES
(1, 1, 'Andoharanofotsy', 'Ambohibao', '2025-12-08 08:00:00', '2025-12-08 09:00:00', 12.5, 50.00, 10.00, 0.25, 12.50),
(2, 2, 'Analakely', 'Soarano', '2025-12-08 09:30:00', '2025-12-08 10:15:00', 8.0, 40.00, 8.00, 0.08, 3.20),
(3, 3, 'Ivandry', 'Ankorondrano', '2025-12-08 10:30:00', '2025-12-08 11:00:00', 5.0, 60.00, 12.00, 0.25, 15.00);

-- Véhicules supplémentaires
INSERT INTO tb_vehicules (marque, modele, versement_minimum)
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
