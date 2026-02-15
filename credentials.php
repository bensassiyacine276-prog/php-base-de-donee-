<?php
/**
 * Fichier de configuration pour la connexion à la base de données
 * 
 * ⚠️ CE FICHIER NE DOIT JAMAIS ÊTRE VERSIONNÉ SUR GITHUB !
 * 
 * Modifiez les valeurs ci-dessous avec vos propres identifiants de connexion
 */

// Informations de connexion à la base de données
define('DB_HOST', 'localhost');        // Adresse du serveur MySQL
define('DB_NAME', 'bts_sio_db');      // Nom de votre base de données
define('DB_USER', 'root');             // Nom d'utilisateur MySQL (souvent 'root' en local)
define('DB_PASS', '');                 // Mot de passe MySQL (souvent vide en local avec XAMPP)
define('DB_CHARSET', 'utf8mb4');       // Encodage des caractères

/**
 * NOTES IMPORTANTES :
 * 
 * - Avec XAMPP : utilisateur = 'root', mot de passe = '' (vide)
 * - Avec WAMP : utilisateur = 'root', mot de passe = '' (vide) par défaut
 * - Avec MAMP : utilisateur = 'root', mot de passe = 'root'
 * - En production : TOUJOURS utiliser un mot de passe fort !
 */
?>
