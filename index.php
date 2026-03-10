<?php
// Connexion à la base
require 'credentials.php';

try {
    // On utilise le nom réel de la base : bsd
    $connexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Sélection de tous les composants
$requete = $connexion->prepare("SELECT * FROM materiel ORDER BY id ASC");
$requete->execute();
$materiels = $requete->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion du matériel</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Gestion du matériel</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Année</th>
            <th>Détails</th>
            <th>Type</th>
            <th>Appartient à</th>
        </tr>
        <?php foreach ($materiels as $materiel): ?>
            <tr>
                <td><?php echo htmlspecialchars($materiel['id']); ?></td>
                <td><?php echo htmlspecialchars($materiel['nom']); ?></td>
                <td><?php echo htmlspecialchars($materiel['annee']); ?></td>
                <td><?php echo htmlspecialchars($materiel['details']); ?></td>
                <td><?php echo htmlspecialchars($materiel['type']); ?></td>
                <td><?php echo htmlspecialchars($materiel[' parent_id']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

