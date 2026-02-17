<?php
require('credentials.php');
$connexion = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $password);

// Crée la table users
$connexion->exec('CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
)');

// Crée les 4 comptes
$users = [
    'christkoffi',
    'christmougnin',
    'sidycoulibaly',
    'yacinebensassi'
];

foreach ($users as $username) {
    $hash = password_hash('123456azerty', PASSWORD_DEFAULT);
    $req = $connexion->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
    $req->execute([$username, $hash]);
}

echo 'Installation terminee ! Supprimez ce fichier maintenant.';
