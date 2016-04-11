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

    $formSignUp->add('File', 'avatar')
        ->filter_extensions('jpg', 'png', 'gif')
        ->max_size(8192)// 8 Kb
        ->label("Your avatar (optional)")
        ->Required(false);

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
        list($firstname, $lastname, $login, $password, $email, $avatar) =
            $formSignUp->get_cleaned_data('firstname', 'lastname', 'login', 'password', 'email', 'avatar');

        // On veut utiliser le modele de l'inscription (~/models/register.php)
        require_once PATH_MODEL . 'register.php';

        // ajouter_membre_dans_bdd() est défini dans ~/models/register.php
        $idUser = addUserInDB($firstname, $lastname, $login, sha1($password), $email);

        // Si la base de données a bien voulu ajouter l'utilisateur (pas de doublons)
        if (ctype_digit($idUser)) {

            // Redimensionnement et sauvegarde de l'avatar (eventuel) dans le bon dossier
            if (!empty($avatar)) {

                // On souhaite utiliser la librairie Image
                require_once PATH_LIB . 'image.php';

                // Redimensionnement et sauvegarde de l'avatar
                $avatar = new Image($avatar);
                $avatar->resize_to(AVATAR_LARGEUR_MAXI, AVATAR_HAUTEUR_MAXI); // Image->resize_to($largeur_maxi, $hauteur_maxi)
                $avatar_filename = DOSSIER_AVATAR . $idUser . '.' . strtolower(pathinfo($avatar->get_filename(), PATHINFO_EXTENSION));
                $avatar->save_as($avatar_filename);

                // On veut utiliser le modele des membres (~/models/membres.php)
                require_once PATH_MODEL . 'membres.php';

                // Mise à jour de l'avatar dans la table
                // maj_avatar_membre() est défini dans ~/models/membres.php
                updateUserAvatar($idUser, $avatar_filename);
            }

            // Affichage de la confirmation de l'inscription
            require_once PATH_VIEW . 'register_done.php';

            /*// On vérifie qu'un hash est présent
            if (!empty($_GET['hash'])) {

                // On veut utiliser le modèle des membres (~/models/membres.php)
                require_once PATH_MODEL . 'membres.php';

                // valider_compte_avec_hash() est définit dans ~/models/membres.php
                valider_compte_avec_hash($_GET['hash']);
                if (valider_compte_avec_hash($_GET['hash'])) {

                // Affichage de la confirmation de validation du compte
                require_once PATH_VIEW . 'account_validate.php';

            } else {

                // Affichage de l'erreur de validation du compte
                require_once PATH_VIEW . 'error_activation.php';
            }*/

        } else {

            // On affiche à nouveau le formulaire d'inscription
            require_once PATH_VIEW . 'form_signup.php';

            //On affiche l'erreur renvoyé par PDO::errorinfo()
            echo $idUser[2];
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
