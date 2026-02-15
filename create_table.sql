-- Script de création de table pour BTS SIO
-- Base de données exemple : gestion d'étudiants

-- Création de la base de données (si elle n'existe pas)
CREATE DATABASE IF NOT EXISTS bts_sio_db 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

-- Utiliser la base de données
USE bts_sio_db;

-- Suppression de la table si elle existe déjà (pour éviter les erreurs)
DROP TABLE IF EXISTS etudiants;

-- Création de la table etudiants
CREATE TABLE etudiants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    classe VARCHAR(20) NOT NULL,
    date_inscription DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insertion de quelques données d'exemple
INSERT INTO etudiants (nom, prenom, email, classe, date_inscription) VALUES
('Dupont', 'Jean', 'jean.dupont@email.com', 'BTS SIO SLAM 1', '2024-09-01'),
('Martin', 'Sophie', 'sophie.martin@email.com', 'BTS SIO SISR 1', '2024-09-01'),
('Bernard', 'Luc', 'luc.bernard@email.com', 'BTS SIO SLAM 1', '2024-09-01'),
('Petit', 'Marie', 'marie.petit@email.com', 'BTS SIO SISR 1', '2024-09-01'),
('Durand', 'Paul', 'paul.durand@email.com', 'BTS SIO SLAM 1', '2024-09-01');

-- Vérification que les données ont bien été insérées
SELECT * FROM etudiants;
