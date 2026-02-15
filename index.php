<?php
// Connexion à la base de données
require_once 'credentials.php';

$table = 'etudiants'; // A changer selon votre table

try {
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Requete SELECT
    $sql = "SELECT * FROM $table";
    $stmt = $pdo->query($sql);
    $donnees = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch(PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage BDD</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            text-align: left;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .total {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Liste des données</h1>
        
        <p class="total">Nombre total : <?php echo count($donnees); ?></p>
        
        <?php if(count($donnees) > 0): ?>
        <table>
            <thead>
                <tr>
                    <?php 
                    // Affichage des colonnes
                    foreach(array_keys($donnees[0]) as $colonne) {
                        echo "<th>" . htmlspecialchars($colonne) . "</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Boucle pour afficher les données
                foreach($donnees as $ligne) {
                    echo "<tr>";
                    foreach($ligne as $valeur) {
                        echo "<td>" . htmlspecialchars($valeur) . "</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>Aucune donnée trouvée</p>
        <?php endif; ?>
    </div>
</body>
</html>
