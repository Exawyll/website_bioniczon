<?php

//Get the model to access DB
require_once PATH_MODEL . 'address.php';
$modelAddress = new Model_Address();

if (!userSignedIn()) {

    // On affiche la page d'erreur comme quoi l'utilisateur doit être connecté pour voir la page
    require_once PATH_GLOBAL_VIEW . 'error_toBuy.php';

} else {
    if (isset($_GET['function']) && $_GET['function'] == 'address') {

        $userAddress = $modelAddress->getAddressByUser(intval($_SESSION['id']));

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

        $formAddress->bound($_POST);

        //display the addresses view
        require_once PATH_VIEW . 'addresses.php';

        if ($formAddress->is_valid($_POST)) {

            $idUser = $_SESSION['id'];

            var_dump($idUser);

            //List the data before insertion in the DB
            list($city, $number, $postalCode, $streetName, $firstName, $lastName) =
                $formAddress->get_cleaned_data('city', 'number', 'zipcode', 'street', 'firstname', 'lastname');

            //Call the function to insert a new address
            $newAddress = $modelAddress->addUserAddress(intval($idUser), $city, intval($number), intval($postalCode), $streetName, $firstName, $lastName);
            var_dump($newAddress);
            if (ctype_digit($newAddress)) {

                //display again the addresses view updated with the new address
                header('Location: index.php?module=cart&action=orderTunnel&function=address');
            } else {
                echo "error, the address can't be added !";
            }
        }
    } else if (isset($_GET['function']) && $_GET['function'] == 'payment') {

//Store the total of the shopping cart for the order summary
        $_SESSION['toPay'] = 0;

        foreach ($_SESSION['cart_item'] as $item) {
            $_SESSION['toPay'] += ($item['price'] * $item['quantity']);
        }

        $addressDelivery = $modelAddress->getAddressById($_POST['deliveryAddress']);

        $billingAddress = $modelAddress->getAddressById($_POST['billingAddress']);

        //Bring the payment page
        require_once PATH_VIEW . 'payment.php';

    } else if (isset($_GET['function']) && $_GET['function'] == 'order') {

        //Get the order model
        require_once PATH_MODEL . 'order.php';
        $modelOrder = new Model_Order();

        $result = $modelOrder->addOrder();

        if (ctype_digit($result)) {

            foreach ($_SESSION['cart_item'] as $item) {

                $tabError = array();

                $newOrder = $modelOrder->addOrder_product($result, $item['name'], $item['price'], $item['quantity']);

                if (!ctype_digit($newOrder)) {
                    array_push($newOrder, $tabError);
                }

                if (empty($tabError)) {

                    require_once PATH_VIEW . 'finalizeOrder.php';

                } else {

                    print_r($tabError);
                }
            }
        }
    }
}