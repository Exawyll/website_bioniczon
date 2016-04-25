<?php

// Vérification des droits d'accès de la page
if (!userSignedIn()) {

    // On affiche la page d'erreur comme quoi l'utilisateur doit être connecté pour voir la page
    include PATH_GLOBAL_VIEW . 'error_not_connected.php';

} else {

// Suppression de toutes les variables et destruction de la session
    $_SESSION = array();
    session_destroy();

    include PATH_VIEW . 'disconnection_ok.php';

}
