<?php

//Check page access
if (userSignedIn()) {

// Error already connected
    include PATH_GLOBAL_VIEW . 'error_already_connected.php';

} else {
    // Include form library
    require_once PATH_LIB . 'form.php';

    // "Form Sign in"
    $form_signIn = new Form('connexion_form');

    $form_signIn->method('POST');

    $form_signIn->add('Text', 'login')
        ->label("Login");

    $form_signIn->add('Password', 'password')
        ->label("Password");

    $form_signIn->add('Submit', 'submit')
        ->value("Sign In !");

    $form_signIn->bound($_POST);

    // Table of mistakes
    $erreurs_connexion = array();

    // method to valid the form depending on the POSTS
    if ($form_signIn->is_valid($_POST)) {

        list($login, $password) =
            $form_signIn->get_cleaned_data('login', 'password');

        // Bring the model membres
        require_once PATH_MODEL . 'membres.php';

        $modelUser = new Model_Users();

        // Try to sign in from the DB
        $idUser = $modelUser->validateSignIn($login, sha1($password));

        // Check if the DB answered
        if (ctype_digit($idUser)) {

            $userInfo = $modelUser->infoUser($idUser);

            // Build the SESSION
            $_SESSION['id'] = $idUser;
            $_SESSION['login'] = $userInfo['login'];
            $_SESSION['firstname'] = $userInfo['firstname'];
            $_SESSION['lastname'] = $userInfo['lastname'];
            $_SESSION['email'] = $userInfo['email'];
            $_SESSION['admin'] = $userInfo['admin'];

            // Display the confirmed connexion
            require_once PATH_VIEW . 'connexion_ok.php';

        } else {

            $erreurs_connexion[] = "login or password not found.";

            // Display again the sign in form
            require_once PATH_VIEW . 'form_signin.php';
        }

    } else {

        require_once PATH_VIEW . 'form_signin.php';
    }
}
