<?php

//Check access to the page
if (userSignedIn()) {

// Error page to say the user is already connected
    include PATH_GLOBAL_VIEW . 'error_already_connected.php';

} else {

    // Include the Form library
    require_once PATH_LIB . 'form.php';

    // "$formSignUp" is the id of the form
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

    // Previous entries (if exist)
    $formSignUp->bound($_POST);

    // form display
    require_once PATH_VIEW . 'form_signup.php';

    // Method to validate the form from the POSTS
    if ($formSignUp->is_valid($_POST)) {

        // Check identical passwords
        if ($_POST['password'] != $_POST['pass_check']) {

            // Display Error
            echo "The two passwords are not the same !" . "<br>";

        } else {

            // Make the data clean before adding to the DB
            list($firstname, $lastname, $login, $password, $email) =
                $formSignUp->get_cleaned_data('firstname', 'lastname', 'login', 'password', 'email');

            // sign up model
            require_once PATH_MODEL . 'membres.php';
            $modelUser = new Model_Users();

            // Add user in the DB
            $idUser = $modelUser->addUserInDB($firstname, $lastname, $login, sha1($password), $email);

            // Check if DB inserted the user
            if (ctype_digit($idUser)) {

                // To confirm the signed up
                require_once PATH_VIEW . 'register_done.php';

            } else {

                //Display error from PDO::errorinfo()
                print_r($idUser[2]);

                // Display again the form to sign up
                require_once PATH_VIEW . 'form_signup.php';
            }
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

    // Form to sign up once again
    require_once PATH_VIEW . 'form_signup.php';
}
