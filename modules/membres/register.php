<?php

//Vérification des droits d'accès de la page
if (userSignedIn()) {

// On affiche la page d'erreur comme quoi l'utilisateur est déjà connecté
    include PATH_GLOBAL_VIEW . 'error_already_connected.php';

} else {

    // Ne pas oublier d'inclure la librairie Form
    require_once PATH_LIB . 'form.php';

    // "formulaire_inscription" est l'ID unique du formulaire
    $formSignUp = new Form('register_form');

    $formSignUp->method('POST');

    $formSignUp->add('Text', 'firstname')
        ->label("Firstname");

    $formSignUp->add('Text', 'lastname')
        ->label("Lastname");

    $formSignUp->add('Text', 'login')
        ->label("login");

    $formSignUp->add('Password', 'password')
        ->label("Password");

    $formSignUp->add('Password', 'pass_check')
        ->label("Password (check)");

    $formSignUp->add('Email', 'email')
        ->label("Email address");

    $formSignUp->add('Submit', 'submit')
        ->value("Register");

    // Pré-remplissage avec les valeurs précédemment entrées (s'il y en a)
    $formSignUp->bound($_POST);

    // Affichage du formulaire
    require_once PATH_VIEW . 'form_signup.php';

    // Validation des champs suivant les règles en utilisant les données du tableau $_POST
    if ($formSignUp->is_valid($_POST)) {

        // On vérifie si les 2 mots de passe correspondent
        if ($_POST['password'] != $_POST['pass_check']) {

            echo "The two passwords are not the same !" . "<br>";
        }

        // Tentative d'ajout du membre dans la base de donnees
        list($firstname, $lastname, $login, $password, $email) =
            $formSignUp->get_cleaned_data('firstname', 'lastname', 'login', 'password', 'email');

        // On veut utiliser le modele de l'inscription (~/models/register.php)
        require_once PATH_MODEL . 'membres.php';
        $modelUser = new Model_Users();

        // ajouter_membre_dans_bdd() est défini dans ~/models/register.php
        $idUser = $modelUser->addUserInDB($firstname, $lastname, $login, sha1($password), $email);

        // Si la base de données a bien voulu ajouter l'utilisateur (pas de doublons)
        if (ctype_digit($idUser)) {

            // Affichage de la confirmation de l'inscription
            require_once PATH_VIEW . 'register_done.php';

        } else {

            //On affiche l'erreur renvoyé par PDO::errorinfo()
            print_r($idUser[2]);

            // On affiche à nouveau le formulaire d'inscription
            require_once PATH_VIEW . 'form_signup.php';
        }
    } else {
        if (!empty($_POST)) {
            if (empty($_POST['login'])) {
                echo "* Need to fill login" . "<br>";
            }
            if (empty($_POST['password']) || empty($_POST['pass_check'])) {
                echo "* Need to fill passwords" . "<br>";
            }
            if (empty($_POST['email'])) {
                echo "* Need to fill email address" . "<br>";
            }
        }
    }

    // On reaffiche le formulaire d'inscription
    require_once PATH_VIEW . 'form_signup.php';
}
