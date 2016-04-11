<?php

//Vérification des droits d'accès de la page
if (userSignedIn()) {

// On affiche la page d'erreur comme quoi l'utilisateur est déjà connecté
    include PATH_GLOBAL_VIEW . 'error_already_connected.php';

} else {
    // On vérifie qu'un hash est présent
    if (!empty($_GET['hash'])) {

        // On veut utiliser le modèle des membres (~/models/membres.php)
        require_once PATH_MODEL . 'membres.php';

        // valider_compte_avec_hash() est définit dans ~/models/membres.php
        validateAccountFromHash($_GET['hash']);
        /*if (valider_compte_avec_hash($_GET['hash'])) {

            // Affichage de la confirmation de validation du compte
            require_once PATH_VIEW . 'account_validate.php';

        } else {

            // Affichage de l'erreur de validation du compte
            require_once PATH_VIEW . 'error_activationo.php';
        }*/

    } else {

        // Affichage de l'erreur de validation du compte
        require_once PATH_VIEW . 'error_activation.php';
    }
}
