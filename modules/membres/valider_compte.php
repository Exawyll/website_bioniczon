<?php

//Vérification des droits d'accès de la page
if (utilisateur_est_connecte()) {

// On affiche la page d'erreur comme quoi l'utilisateur est déjà connecté
    include PATH_GLOBAL_VIEW . 'erreur_deja_connecte.php';

} else {
    // On vérifie qu'un hash est présent
    if (!empty($_GET['hash'])) {

        // On veut utiliser le modèle des membres (~/models/membres.php)
        require_once PATH_MODEL . 'membres.php';

        // valider_compte_avec_hash() est définit dans ~/models/membres.php
        valider_compte_avec_hash($_GET['hash']);
        /*if (valider_compte_avec_hash($_GET['hash'])) {

            // Affichage de la confirmation de validation du compte
            require_once PATH_VIEW . 'compte_valide.php';

        } else {

            // Affichage de l'erreur de validation du compte
            require_once PATH_VIEW . 'erreur_activation_compte.php';
        }*/

    } else {

        // Affichage de l'erreur de validation du compte
        require_once PATH_VIEW . 'erreur_activation_compte.php';
    }
}
