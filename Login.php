<?php
session_start();
require('credentials.php');

$erreur = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $connexion = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $password);
    
    $requete = $connexion->prepare('SELECT * FROM users WHERE username = ?');
    $requete->execute([$_POST['username']]);
    $utilisateur = $requete->fetch();

    if ($utilisateur && password_verify($_POST['password'], $utilisateur['password'])) {
        $_SESSION['user'] = $utilisateur['username'];
        header('Location: index.php');
        exit;
    } else {
        $erreur = 'Identifiant ou mot de passe incorrect';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <?php if ($erreur): ?>
        <p style="color:red"><?php print($erreur) ?></p>
    <?php endif; ?>
    <form method="post" action="login.php">
        <label>Identifiant :</label><br>
        <input type="text" name="username"><br><br>
        <label>Mot de passe :</label><br>
        <input type="password" name="password"><br><br>
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>
