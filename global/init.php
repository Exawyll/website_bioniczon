<?php

// Inclusion du fichier de configuration (qui définit des constantes)
require_once 'global/config.php';

// Start the session
session_start();

// Singleton PDO2 to connect the DB from anywhere
require_once PATH_LIB.'pdo2.php';

// Check user is signed in
function userSignedIn() {

    return !empty($_SESSION['id']);
}

//Check if user is admin
function adminUser() {

    return !empty($_SESSION['admin']);
}