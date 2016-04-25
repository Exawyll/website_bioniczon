<?php

if (empty($_SESSION['id']) || !is_numeric($_SESSION['id'])) {

    //Wrong input so you don't have access
    require_once PATH_VIEW . 'error_profile.php';

} else {

    //Go to display the profile page
    require_once PATH_VIEW . 'profile.php';

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

    $formSignUp->add('File', 'avatar')
        ->filter_extensions('jpg', 'png', 'gif')
        ->max_size(8192)// 8 Kb
        ->label("Your avatar (optional)")
        ->Required(false);

    $formSignUp->add('Submit', 'submit')
        ->value("Register");

    // Pré-remplissage avec les valeurs précédemment entrées (s'il y en a)
    $formSignUp->bound($_POST);
}