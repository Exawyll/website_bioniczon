<?php

// Inclusion du fichier de configuration (qui définit des constantes)
include 'global/init.php';

// Début de la tamporisation de sortie
ob_start();

// Si un module est specifié, on regarde s'il existe
if (!empty($_GET['module'])) {

    $module = dirname(__FILE__) . '/modules/' . $_GET['module'] . '/';

    // Si l'action est specifiée, on l'utilise, sinon, on tente une action par défaut
    $action = (!empty($_GET['action'])) ? $_GET['action'] . '.php' : 'index.php';

    // Si l'action existe, on l'exécute
    if (is_file($module . $action)) {

        require_once $module . $action;

        // Sinon, on affiche la page d'accueil !
    } else {

        require_once 'global/home.php';
    }

// Module non specifié ou invalide ? On affiche la page d'accueil !
} else {

    require_once 'global/home.php';
}

// Fin de la tamporisation de sortie
$contenu = ob_get_clean();

// Début du code HTML
require_once 'global/header.php';

echo $contenu;

// Fin du code HTML
require_once 'global/footer.php';
