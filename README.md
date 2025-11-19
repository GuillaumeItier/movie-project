# movie-project
Projet de cours PHP POO
Instructions pour récupérer le projet
### 1 Cloner le repository
```sh
git clone https://github.com/evaluationWeb/movie-project.git
```
### 2 Se déplacer dans le projet
```sh
cd movie-project
```
### 3 Installer les dépendances
```sh
composer install
```

### 5 Créer un fichier env.php avec les informations de la BDD
```php
<?php

const DB_USERNAME = ""; //Login de la BDD
const DB_PASSWORD = ""; //Password de la BDD
const DB_SERVER = "localhost"; //Hote de la BDD
const DB_NAME = "movies"; //Nom de la BDD
``` 
### 4 démarrer le serveur PHP
```sh
php -S 127.0.0.1:8000
```
