<?php

//Vérification des droits d'accès de la page
if (userSignedIn()) {

// On affiche la page d'erreur comme quoi l'utilisateur est déjà connecté
    include PATH_GLOBAL_VIEW . 'error_already_connected.php';

} else {
    // Ne pas oublier d'inclure la librairie Form
    require_once PATH_LIB . 'form.php';

    // "formulaire_connexion" est l'ID unique du formulaire
    $form_signIn = new Form('connexion_form');

    $form_signIn->method('POST');

    $form_signIn->add('Text', 'login')
        ->label("Login");

    $form_signIn->add('Password', 'password')
        ->label("Password");

    $form_signIn->add('Submit', 'submit')
        ->value("Sign In !");

    // Pré-remplissage avec les valeurs précédemment entrées (s'il y en a)
    $form_signIn->bound($_POST);

    // Création d'un tableau des erreurs
    $erreurs_connexion = array();

    // Validation des champs suivant les règles
    if ($form_signIn->is_valid($_POST)) {

        list($login, $password) =
            $form_signIn->get_cleaned_data('login', 'password');

        // On veut utiliser le modèle des membres (~/models/membres.php)
        require_once PATH_MODEL . 'membres.php';

        $modelUser = new Model_Users();

        // combinaison_connexion_valide() est définit dans ~/models/membres.php
        $idUser = $modelUser->validateSignIn($login, sha1($password));

        // Si les identifiants sont valides
        if (ctype_digit($idUser)) {

            $userInfo = $modelUser->infoUser($idUser);

            // On enregistre les informations dans la session
            $_SESSION['id'] = $idUser;
            $_SESSION['login'] = $userInfo['login'];
            $_SESSION['firstname'] = $userInfo['firstname'];
            $_SESSION['lastname'] = $userInfo['lastname'];
            $_SESSION['email'] = $userInfo['email'];
            $_SESSION['admin'] = $userInfo['admin'];

            // Affichage de la confirmation de la connexion
            require_once PATH_VIEW . 'connexion_ok.php';

        } else {

            $erreurs_connexion[] = "login or password not found.";

            // On réaffiche le formulaire de connexion
            require_once PATH_VIEW . 'form_signin.php';
        }

    } else {

        // On réaffiche le formulaire de connexion
        require_once PATH_VIEW . 'form_signin.php';
    }
}
