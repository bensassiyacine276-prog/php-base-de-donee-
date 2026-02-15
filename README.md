# Projet BTS SIO

Affichage de données d'une base MySQL avec PHP

## Installation

1. Copier `credentials.example.php` en `credentials.php`
2. Modifier les infos de connexion dans `credentials.php`
3. Changer le nom de la table ligne 5 de `index.php`
4. Ouvrir `index.php` dans le navigateur

## Configuration

Dans `credentials.php` :
- DB_HOST : localhost
- DB_NAME : nom de votre base
- DB_USER : votre user (root)
- DB_PASS : votre mot de passe

Dans `index.php` ligne 5 :
```php
$table = 'nom_de_votre_table';
```

## Utilisation

Le script affiche automatiquement toutes les colonnes de la table.

## Important

Le fichier `credentials.php` ne doit pas être sur GitHub (déjà dans .gitignore)

## Mettre sur GitHub

```bash
git init
git add .
git commit -m "premier commit"
git remote add origin https://github.com/username/repo.git
git push -u origin main
```
