<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
require('credentials.php');

$connexion = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $password);

$requete = $connexion->prepare('SELECT * FROM materiel');
$requete->execute();
$materiels = $requete->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Gestion du matériel</title>
</head>
<body>
    <h1>Gestion du matériel</h1>
    <p>Connecté en tant que : <?php print($_SESSION['user']) ?> | <a href="logout.php">Se déconnecter</a></p>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Année</th>
            <th>Détails</th>
            <th>Type</th>
        </tr>
        <?php foreach ($materiels as $materiel): ?>
            <tr>
                <td><?php print($materiel['id']) ?></td>
                <td><?php print($materiel['nom']) ?></td>
                <td><?php print($materiel['annee']) ?></td>
                <td><?php print($materiel['details']) ?></td>
                <td><?php print($materiel['type']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
