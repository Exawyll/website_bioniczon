<?php

// On veut utiliser le modele des membres (~/models/membres.php)
require_once PATH_MODEL . 'membres.php';
$modelUser = new Model_Users();

// On veut utiliser le modele des membres (~/models/membres.php)
require_once PATH_MODEL . 'address.php';
$modelAddress = new Model_Address();

require_once PATH_MODEL . 'order.php';
$modelOrder = new Model_Order();

if (empty($_SESSION['id']) || !is_numeric($_SESSION['id'])) {

    //Wrong input so you don't have access
    require_once PATH_VIEW . 'error_profile.php';

} else {

    if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['email'])) {
        if ($_POST['password'] != $_POST['checkPass']) {

            echo "!!! Warning: Your passwords should be identical !!!";
        } else {

            // Secure variables
            $firstname = htmlspecialchars($_POST['firstname']);
            $lastname = htmlspecialchars($_POST['lastname']);
            $login = htmlspecialchars($_POST['login']);
            $password = htmlspecialchars($_POST['password']);
            $email = htmlspecialchars($_POST['email']);

            //Update the DB
            $user = $modelUser->updateUserInDB($_SESSION['id'], $firstname, $lastname, $login, sha1($password), $email);

            if ($user !== true) {
                echo '!!! ' . $user[2] . ' !!!';
            } else {
                echo "Your profile have been updated !";
            }
        }
    } else {
        echo "* Please, fill all the fields to update your profile !!!";
    }

    $user = $modelUser->infoUser($_SESSION['id']);
    $userAddress = $modelAddress->getAddressByUser($_SESSION['id']);
    $userOrder = $modelOrder->getOrderByUser($_SESSION['id']);

//Go to display the profile page
    require_once PATH_VIEW . 'profile.php';

}