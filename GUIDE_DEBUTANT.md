# 🎓 Guide pour Débutants - Comprendre le Code

Ce guide explique en détail chaque partie du code pour vous aider à comprendre ce que vous faites.

## 📖 Table des matières

1. [Structure de base d'un fichier PHP](#structure-php)
2. [Connexion à la base de données](#connexion-bdd)
3. [La boucle foreach](#boucle-foreach)
4. [Sécurité : htmlspecialchars()](#securite)
5. [Git et GitHub](#git-github)

---

## <a name="structure-php"></a>1. Structure de base d'un fichier PHP

### Les balises PHP

```php
<?php
// Votre code PHP ici
?>
```

- **`<?php`** : Ouverture du code PHP
- **`?>`** : Fermeture du code PHP (optionnelle en fin de fichier)

### Mélanger PHP et HTML

```php
<!DOCTYPE html>
<html>
<body>
    <?php
    $nom = "Jean";
    echo "<h1>Bonjour $nom</h1>";
    ?>
</body>
</html>
```

---

## <a name="connexion-bdd"></a>2. Connexion à la base de données

### Qu'est-ce que PDO ?

**PDO** = PHP Data Objects

C'est une façon **moderne et sécurisée** de se connecter à une base de données.

### Étapes de connexion

```php
// 1. Créer la chaîne de connexion (DSN)
$dsn = "mysql:host=localhost;dbname=ma_base;charset=utf8mb4";

// 2. Options de configuration
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Affiche les erreurs
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Format des résultats
];

// 3. Créer la connexion
$pdo = new PDO($dsn, 'utilisateur', 'mot_de_passe', $options);
```

### Pourquoi utiliser try/catch ?

```php
try {
    // Code qui peut générer une erreur
    $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    // Si erreur, on l'attrape ici
    echo "Erreur : " . $e->getMessage();
}
```

**Avantage** : Le script ne s'arrête pas brutalement, on peut afficher un message clair.

---

## <a name="boucle-foreach"></a>3. La boucle foreach

### Principe de base

```php
$fruits = ['Pomme', 'Banane', 'Orange'];

foreach ($fruits as $fruit) {
    echo $fruit . "<br>";
}

// Affiche :
// Pomme
// Banane
// Orange
```

### Avec une base de données

```php
// 1. Récupérer les données
$sql = "SELECT nom, prenom FROM etudiants";
$stmt = $pdo->query($sql);
$etudiants = $stmt->fetchAll();

// 2. Parcourir les résultats
foreach ($etudiants as $etudiant) {
    echo $etudiant['nom'] . " " . $etudiant['prenom'] . "<br>";
}
```

### Dans un tableau HTML

```php
<table>
    <?php foreach ($etudiants as $etudiant): ?>
        <tr>
            <td><?= $etudiant['nom'] ?></td>
            <td><?= $etudiant['prenom'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
```

**Note** : `<?= ?>` est un raccourci pour `<?php echo ?>`

---

## <a name="securite"></a>4. Sécurité : htmlspecialchars()

### Pourquoi c'est important ?

Imaginons qu'un étudiant s'appelle : `<script>alert('Hack!')</script>`

Sans protection :
```php
echo $etudiant['nom']; // ⚠️ Exécute le script !
```

Avec protection :
```php
echo htmlspecialchars($etudiant['nom']); // ✅ Affiche le texte sans l'exécuter
```

### Règle d'or

**TOUJOURS** utiliser `htmlspecialchars()` quand on affiche des données :
- Venant de la base de données
- Venant d'un formulaire
- Venant de l'utilisateur

```php
<?= htmlspecialchars($variable) ?>
```

---

## <a name="git-github"></a>5. Git et GitHub

### Les commandes essentielles

#### Initialiser un projet
```bash
git init                    # Initialise Git dans le dossier
git add .                   # Ajoute tous les fichiers
git commit -m "Message"     # Enregistre les modifications
```

#### Travailler au quotidien
```bash
git status                  # Voir l'état des fichiers
git add fichier.php         # Ajouter un fichier spécifique
git commit -m "Description" # Enregistrer les changements
git push                    # Envoyer sur GitHub
git pull                    # Récupérer les modifications des autres
```

#### Premiers pas avec GitHub
```bash
# 1. Créer un repo sur GitHub (via l'interface web)
# 2. Lier votre projet local au repo GitHub
git remote add origin https://github.com/username/repo.git
git branch -M main
git push -u origin main
```

### Le fichier .gitignore

**Pourquoi ?** Pour dire à Git quels fichiers NE PAS versionner.

```
# Fichier .gitignore
credentials.php    # ❌ Ne pas versionner (contient des mots de passe)
.DS_Store          # ❌ Fichier système Mac
*.log              # ❌ Fichiers de log
```

**Vérification** :
```bash
git status
# credentials.php ne doit PAS apparaître
```

---

## 💡 Conseils pratiques

### 1. Testez étape par étape

```php
// Commencez simple :
echo "Test 1 : PHP fonctionne<br>";

// Puis testez la connexion :
try {
    $pdo = new PDO(...);
    echo "Test 2 : Connexion OK<br>";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Ensuite testez la requête :
$sql = "SELECT * FROM etudiants LIMIT 1";
// etc.
```

### 2. Lisez les messages d'erreur

Les erreurs PHP vous donnent des indices précieux :
- **Ligne concernée**
- **Type d'erreur**
- **Message explicatif**

### 3. Commentez votre code

```php
// Mauvais commentaire :
$nom = $etudiant['nom']; // Récupère le nom

// Bon commentaire :
// On extrait le nom pour l'afficher dans le tableau des résultats
$nom = $etudiant['nom'];
```

### 4. Utilisez var_dump() pour déboguer

```php
var_dump($etudiants); // Affiche toute la structure de la variable
```

---

## 🎯 Exercices pour progresser

### Niveau 1 - Facile
1. Modifier le texte du header
2. Changer les couleurs du design
3. Ajouter une colonne dans le tableau

### Niveau 2 - Moyen
1. Trier par une autre colonne (ex: prénom)
2. Afficher uniquement les étudiants SLAM
3. Compter le nombre total d'étudiants

### Niveau 3 - Avancé
1. Ajouter une barre de recherche
2. Créer une pagination (10 résultats par page)
3. Ajouter un formulaire pour insérer de nouveaux étudiants

---

## 📚 Ressources pour apprendre

### Sites recommandés
- [PHP.net](https://www.php.net/manual/fr/) - Documentation officielle
- [W3Schools PHP](https://www.w3schools.com/php/) - Tutoriels interactifs
- [OpenClassrooms](https://openclassrooms.com/) - Cours en français

### Vidéos YouTube
- "PHP pour débutants"
- "MySQL et PHP"
- "Git et GitHub pour débutants"

---

## ❓ Questions fréquentes

### "Pourquoi PDO et pas mysqli ?"
PDO est plus moderne, plus sécurisé et fonctionne avec plusieurs types de bases de données.

### "C'est quoi une injection SQL ?"
Une attaque où quelqu'un insère du code malveillant dans vos requêtes.
**Solution** : Utiliser des requêtes préparées avec PDO.

### "Pourquoi credentials.php n'est pas sur GitHub ?"
Pour ne pas partager vos mots de passe publiquement !

---

**Bon courage pour votre apprentissage ! 💪**

N'hésitez pas à expérimenter et à modifier le code pour mieux comprendre.
