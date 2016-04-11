<?php

// Inclusion du fichier de configuration (qui définit des constantes)
require_once 'global/config.php';

// Utilisation et démarrage des sessions
session_start();

// Inclusion de Pdo2, potentiellement utile partout
require_once PATH_LIB.'pdo2.php';

// Vérifie si l'utilisateur est connecté
function userSignedIn() {

    return !empty($_SESSION['id']);
}

//Check if user is admin
function adminUser() {

    return !empty($_SESSION['admin']);
}