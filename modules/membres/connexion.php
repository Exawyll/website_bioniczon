<?php

//Vérification des droits d'accès de la page
if (utilisateur_est_connecte()) {

// On affiche la page d'erreur comme quoi l'utilisateur est déjà connecté
    include PATH_GLOBAL_VIEW . 'erreur_deja_connecte.php';

} else {
    // Ne pas oublier d'inclure la librairie Form
    require_once PATH_LIB . 'form.php';

    // "formulaire_connexion" est l'ID unique du formulaire
    $form_connexion = new Form('connexion_form');

    $form_connexion->method('POST');

    $form_connexion->add('Text', 'login')
        ->label("Login");

    $form_connexion->add('Password', 'password')
        ->label("Password");

    $form_connexion->add('Submit', 'submit')
        ->value("Sign In !");

    // Pré-remplissage avec les valeurs précédemment entrées (s'il y en a)
    $form_connexion->bound($_POST);

    // Création d'un tableau des erreurs
    $erreurs_connexion = array();

    // Validation des champs suivant les règles
    if ($form_connexion->is_valid($_POST)) {

        list($login, $password) =
            $form_connexion->get_cleaned_data('login', 'password');

        // On veut utiliser le modèle des membres (~/models/membres.php)
        require_once PATH_MODEL . 'membres.php';

        // combinaison_connexion_valide() est définit dans ~/models/membres.php
        $id_utilisateur = combinaison_connexion_valide($login, sha1($password));

        // Si les identifiants sont valides
        if (false !== $id_utilisateur) {

            $infos_utilisateur = lire_infos_utilisateur($id_utilisateur);

            // On enregistre les informations dans la session
            $_SESSION['id'] = $id_utilisateur;
            $_SESSION['pseudo'] = $login;
            $_SESSION['avatar'] = $infos_utilisateur['avatar'];
            $_SESSION['email'] = $infos_utilisateur['adresse_email'];

            // Affichage de la confirmation de la connexion
            require_once PATH_VIEW . 'connexion_ok.php';

            if (!empty($_SESSION['id'])) {

                // L'utilisateur connecté, on peut récupérer :
                // $_SESSION['id']     - son id utilisateur
                // $_SESSION['pseudo'] - son nom d'utilisateur
                // $_SESSION['avatar'] - son avatar (s'il existe)

            } else {

                // Utilisateur non connecté
            }

        } else {

            $erreurs_connexion[] = "login / password not found.";

            // On réaffiche le formulaire de connexion
            require_once PATH_VIEW . 'formulaire_connexion.php';
        }

    } else {

        // On réaffiche le formulaire de connexion
        require_once PATH_VIEW . 'formulaire_connexion.php';
    }
}
