<?php

// Vérification des droits d'accès de la page
if (!utilisateur_est_connecte()) {

    // On affiche la page d'erreur comme quoi l'utilisateur doit être connecté pour voir la page
    include PATH_GLOBAL_VIEW . 'erreur_non_connecte.php';

} else {

// Suppression de toutes les variables et destruction de la session
    $_SESSION = array();
    session_destroy();

// Suppression des cookies de connexion automatique
    setcookie('id', '');
    setcookie('connexion_auto', '');

    include PATH_VIEW . 'deconnexion_ok.php';

}
/**
 * Created by PhpStorm.
 * User: WYLLIAM
 * Date: 31/03/2016
 * Time: 16:23
 */