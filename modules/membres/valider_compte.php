<?php

// On vérifie qu'un hash est présent
if (!empty($_GET['hash'])) {

    // On veut utiliser le modèle des membres (~/models/membres.php)
    require_once PATH_MODEL . 'membres.php';

    // valider_compte_avec_hash() est définit dans ~/models/membres.php
    valider_compte_avec_hash($_GET['hash'])
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
