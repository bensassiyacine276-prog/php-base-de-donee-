# 📚 Projet BTS SIO - Affichage de données MySQL avec PHP

Projet réalisé dans le cadre du BTS SIO pour apprendre à :
- Se connecter à une base de données MySQL
- Effectuer des requêtes SELECT
- Afficher des données avec une boucle PHP
- Versionner son code avec Git/GitHub

## 📋 Prérequis

- PHP 7.4 ou supérieur
- MySQL ou MariaDB
- Un serveur local (XAMPP, WAMP, MAMP, ou Laragon)
- Git
- PHPStorm (recommandé) ou un autre éditeur de code

## 🚀 Installation

### 1. Cloner le projet

```bash
git clone https://github.com/votre-username/votre-repo.git
cd votre-repo
```

### 2. Configurer la base de données

#### A. Créer la base de données

1. Ouvrez phpMyAdmin (http://localhost/phpmyadmin)
2. Cliquez sur "Nouvelle base de données"
3. Ou exécutez le script SQL fourni :

```bash
# Dans phpMyAdmin, importez le fichier create_table.sql
# OU exécutez-le en ligne de commande :
mysql -u root -p < create_table.sql
```

#### B. Configurer les identifiants de connexion

1. **Copiez le fichier exemple :**
   ```bash
   cp credentials.example.php credentials.php
   ```

2. **Modifiez `credentials.php` avec vos identifiants :**
   ```php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'bts_sio_db');      // Votre nom de BDD
   define('DB_USER', 'root');             // Votre utilisateur MySQL
   define('DB_PASS', '');                 // Votre mot de passe MySQL
   ```

3. **⚠️ IMPORTANT : Ne JAMAIS versionner credentials.php !**
   - Le fichier `.gitignore` empêche déjà Git de le versionner
   - Vérifiez avec : `git status` (credentials.php ne doit pas apparaître)

### 3. Lancer le projet

#### Avec PHPStorm (recommandé)
1. Ouvrez le projet dans PHPStorm
2. Clic droit sur `index.php` → "Run"
3. Ou utilisez le serveur PHP intégré

#### Avec XAMPP/WAMP
1. Placez le dossier dans `htdocs` (XAMPP) ou `www` (WAMP)
2. Accédez à : `http://localhost/nom-du-dossier/index.php`

#### Avec le serveur PHP intégré
```bash
php -S localhost:8000
```
Puis ouvrez : `http://localhost:8000/index.php`

## 📁 Structure du projet

```
projet-bts-sio/
│
├── .gitignore                  # Fichiers à ne pas versionner
├── README.md                   # Ce fichier
├── credentials.example.php     # Modèle de configuration (VERSIONNÉ)
├── credentials.php            # Configuration réelle (NON VERSIONNÉ)
├── create_table.sql           # Script de création de la BDD
└── index.php                  # Page principale d'affichage
```

## 🔒 Sécurité - Fichier credentials.php

### Pourquoi ne pas versionner credentials.php ?

1. **Sécurité** : Évite de partager vos mots de passe sur GitHub
2. **Flexibilité** : Chaque développeur peut avoir ses propres identifiants
3. **Bonnes pratiques** : Standard dans l'industrie

### Comment ça marche ?

```
credentials.example.php  →  À VERSIONNER  →  Sur GitHub
         ↓
    (copie locale)
         ↓
credentials.php         →  PAS versionner  →  Bloqué par .gitignore
```

### Vérification

Pour vérifier que credentials.php n'est pas suivi par Git :
```bash
git status
# credentials.php ne doit PAS apparaître dans la liste
```

## 🎨 Fonctionnalités

✅ Connexion sécurisée à MySQL avec PDO  
✅ Requête SELECT avec préparation  
✅ Affichage des données dans une boucle  
✅ Design responsive et moderne  
✅ Gestion des erreurs  
✅ Statistiques en temps réel  
✅ Code commenté pour l'apprentissage  

## 🛠️ Personnalisation

### Modifier la table affichée

Dans `index.php`, ligne 35, modifiez la requête SQL :
```php
$sql = "SELECT * FROM votre_table ORDER BY votre_colonne";
```

### Ajouter des colonnes

1. Modifiez la requête SELECT
2. Ajoutez les `<th>` dans le tableau HTML
3. Ajoutez les `<td>` correspondants dans la boucle

### Changer le design

Modifiez la section `<style>` dans `index.php` (lignes 65-200)

## 📝 Pour aller plus loin

- Ajouter une pagination si beaucoup de données
- Implémenter une recherche
- Créer un formulaire d'ajout d'étudiant
- Ajouter la modification et la suppression (CRUD complet)

## 🤝 Travail en équipe

### Pour partager avec votre groupe :

1. **Premier membre** :
   ```bash
   git init
   git add .
   git commit -m "Initial commit"
   git remote add origin https://github.com/username/repo.git
   git push -u origin main
   ```

2. **Autres membres** :
   ```bash
   git clone https://github.com/username/repo.git
   cd repo
   cp credentials.example.php credentials.php
   # Puis configurer credentials.php avec vos propres identifiants
   ```

### Mise à jour du code :
```bash
git pull              # Récupérer les modifications
git add .             # Ajouter vos changements
git commit -m "Description des modifications"
git push              # Envoyer vos modifications
```

## ❓ Problèmes courants

### "Erreur de connexion"
- Vérifiez que MySQL est démarré
- Vérifiez les identifiants dans credentials.php
- Vérifiez que la base de données existe

### "credentials.php n'existe pas"
- Copiez credentials.example.php en credentials.php
- Configurez vos identifiants

### "Table 'etudiants' doesn't exist"
- Exécutez le script create_table.sql dans phpMyAdmin

## 📚 Ressources utiles

- [Documentation PHP](https://www.php.net/manual/fr/)
- [Documentation PDO](https://www.php.net/manual/fr/book.pdo.php)
- [Documentation MySQL](https://dev.mysql.com/doc/)
- [Git - Guide simple](https://rogerdudler.github.io/git-guide/index.fr.html)

## 👨‍💻 Auteur

Projet BTS SIO - Première année

---

**Bonne chance pour votre projet ! 🚀**
