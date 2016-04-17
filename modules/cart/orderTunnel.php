<?php

if (!userSignedIn()) {

    // On affiche la page d'erreur comme quoi l'utilisateur doit être connecté pour voir la page
    require_once PATH_GLOBAL_VIEW . 'error_toBuy.php';

} else {

    //Get the model to access DB
    require_once PATH_MODEL . 'order.php';

    $userAddress = getUserAddress(intval($_SESSION['id']));

    // Ne pas oublier d'inclure la librairie Form
    require_once PATH_LIB . 'form.php';

    // "formulaire_inscription" est l'ID unique du formulaire
    $formAddress = new Form('address_form');

    $formAddress->method('POST');

    $formAddress->add('Text', 'firstname')
        ->label("Firstname");

    $formAddress->add('Text', 'lastname')
        ->label("Lastname");

    $formAddress->add('Text', 'number')
        ->label("Street Number");

    $formAddress->add('Text', 'street')
        ->label("Street Name");

    $formAddress->add('Text', 'city')
        ->label("City");

    $formAddress->add('Text', 'zipcode')
        ->label("Zipcode");

    $formAddress->add('Submit', 'submit')
        ->value("New Address");

    //display the addresses view
    require_once PATH_VIEW . 'addresses.php';

    if ($formAddress->is_valid($_POST)) {

        $idUser = $_SESSION['id'];

        //Add in the DB
        list($city, $number, $postalCode, $streetName, $firstName, $lastName) =
            $formAddress->get_cleaned_data('city', 'number', 'zipcode', 'street', 'firstname', 'lastname');

        $newAddress = addUserAddress(intval($idUser), $city, intval($number), intval($postalCode), $streetName, $firstName, $lastName);

        if (ctype_digit($newAddress)) {
            echo 'it\'s good!';
        }

    }

}