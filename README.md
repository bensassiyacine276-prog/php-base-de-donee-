# Projet BTS SIO - Affichage BDD

Affichage de données d'une base MySQL avec PHP

## Installation

### 1. Configurer la connexion
Modifiez `credentials.php` avec vos infos :
```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'votre_base');
define('DB_USER', 'root');
define('DB_PASS', '');
```

### 2. Configurer la table
Dans `index.php` ligne 5 :
```php
$table = 'votre_table';
```

### 3. Tester
Ouvrez `index.php` dans votre navigateur

## Mettre sur GitHub

```bash
git init
git add .
git commit -m "premier commit"
git remote add origin https://github.com/username/repo.git
git branch -M main
git push -u origin main
```

## Important

Le `.gitignore` empêche `credentials.php` d'être versionné.

Vérifiez avec `git status` que credentials.php n'apparaît pas.
