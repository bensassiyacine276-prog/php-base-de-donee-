<?php
/**
 * Projet BTS SIO - Affichage des données d'une base de données
 * 
 * Ce script permet de :
 * 1. Se connecter à la base de données
 * 2. Récupérer les données avec un SELECT
 * 3. Afficher les données dans une boucle
 */

// Inclusion du fichier de configuration (credentials)
// Le @ supprime les warnings si le fichier n'existe pas
if (!file_exists('credentials.php')) {
    die('<h1>Erreur de configuration</h1>
         <p>Le fichier credentials.php n\'existe pas.</p>
         <p>Veuillez copier credentials.example.php en credentials.php et configurer vos identifiants.</p>');
}

require_once 'credentials.php';

// Variable pour stocker les messages d'erreur
$error = null;
$etudiants = [];

try {
    // ÉTAPE 1 : Connexion à la base de données avec PDO
    // PDO = PHP Data Objects (méthode moderne et sécurisée)
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
    
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Active les exceptions en cas d'erreur
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Retourne les résultats en tableau associatif
        PDO::ATTR_EMULATE_PREPARES => false, // Désactive l'émulation des requêtes préparées
    ];
    
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
    
    // ÉTAPE 2 : Préparation et exécution de la requête SELECT
    $sql = "SELECT id, nom, prenom, email, classe, date_inscription, created_at 
            FROM etudiants 
            ORDER BY nom, prenom";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    
    // ÉTAPE 3 : Récupération de tous les résultats
    $etudiants = $stmt->fetchAll();
    
} catch (PDOException $e) {
    // En cas d'erreur, on capture l'exception et on stocke le message
    $error = "Erreur de connexion ou de requête : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Étudiants - BTS SIO</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }
        
        header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }
        
        header p {
            font-size: 1.1em;
            opacity: 0.9;
        }
        
        .content {
            padding: 30px;
        }
        
        .error {
            background: #fee;
            border-left: 4px solid #f44;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            color: #c33;
        }
        
        .info {
            background: #e3f2fd;
            border-left: 4px solid #2196F3;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            color: #1565c0;
        }
        
        .stats {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            flex: 1;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
        
        .stat-card h3 {
            font-size: 2em;
            margin-bottom: 5px;
        }
        
        .stat-card p {
            opacity: 0.9;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
        }
        
        tbody tr {
            border-bottom: 1px solid #e0e0e0;
            transition: background-color 0.3s;
        }
        
        tbody tr:hover {
            background-color: #f5f5f5;
        }
        
        tbody tr:last-child {
            border-bottom: none;
        }
        
        td {
            padding: 15px;
        }
        
        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.85em;
            font-weight: 600;
        }
        
        .badge-slam {
            background: #e3f2fd;
            color: #1976d2;
        }
        
        .badge-sisr {
            background: #f3e5f5;
            color: #7b1fa2;
        }
        
        footer {
            background: #f5f5f5;
            padding: 20px;
            text-align: center;
            color: #666;
            font-size: 0.9em;
        }
        
        @media (max-width: 768px) {
            .stats {
                flex-direction: column;
            }
            
            table {
                font-size: 0.9em;
            }
            
            th, td {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>📚 Gestion des Étudiants</h1>
            <p>BTS SIO - Système d'Information</p>
        </header>
        
        <div class="content">
            <?php if ($error): ?>
                <!-- Affichage d'une erreur si la connexion a échoué -->
                <div class="error">
                    <strong>⚠️ Erreur :</strong> <?= htmlspecialchars($error) ?>
                </div>
            <?php else: ?>
                
                <!-- Statistiques -->
                <div class="stats">
                    <div class="stat-card">
                        <h3><?= count($etudiants) ?></h3>
                        <p>Étudiants inscrits</p>
                    </div>
                    <div class="stat-card">
                        <h3><?= count(array_filter($etudiants, fn($e) => strpos($e['classe'], 'SLAM') !== false)) ?></h3>
                        <p>SLAM</p>
                    </div>
                    <div class="stat-card">
                        <h3><?= count(array_filter($etudiants, fn($e) => strpos($e['classe'], 'SISR') !== false)) ?></h3>
                        <p>SISR</p>
                    </div>
                </div>
                
                <?php if (empty($etudiants)): ?>
                    <!-- Message si aucune donnée n'est trouvée -->
                    <div class="info">
                        <strong>ℹ️ Information :</strong> Aucun étudiant trouvé dans la base de données.
                    </div>
                <?php else: ?>
                    <!-- AFFICHAGE DES DONNÉES DANS UNE BOUCLE -->
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Classe</th>
                                <th>Date d'inscription</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($etudiants as $etudiant): ?>
                                <tr>
                                    <td><?= htmlspecialchars($etudiant['id']) ?></td>
                                    <td><strong><?= htmlspecialchars($etudiant['nom']) ?></strong></td>
                                    <td><?= htmlspecialchars($etudiant['prenom']) ?></td>
                                    <td><?= htmlspecialchars($etudiant['email']) ?></td>
                                    <td>
                                        <span class="badge <?= strpos($etudiant['classe'], 'SLAM') !== false ? 'badge-slam' : 'badge-sisr' ?>">
                                            <?= htmlspecialchars($etudiant['classe']) ?>
                                        </span>
                                    </td>
                                    <td><?= date('d/m/Y', strtotime($etudiant['date_inscription'])) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
                
            <?php endif; ?>
        </div>
        
        <footer>
            <p>Projet réalisé dans le cadre du BTS SIO</p>
            <p>© <?= date('Y') ?> - Tous droits réservés</p>
        </footer>
    </div>
</body>
</html>
