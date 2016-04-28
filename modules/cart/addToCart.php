<?php

// Lib for the class cart
require_once PATH_LIB . 'cart.php';

// New instance of a shopping Cart
$myCart = new Cart();

// Call the model for products
require_once PATH_MODEL . 'product.php';

$modelProduct = new Model_Products();

if (isset($_GET['id_product']) && $_GET['function'] == 'add') {

// Get the product to add ant secure of the $_GET variable as a int
    $product = $modelProduct->getProductById(intval($_GET['id_product']));

    if ($product['quantity'] > 0) {

        // Call the function to add in the cart
        $myCart->add($product);

        //Decrease the quantity
        $product['quantity']--;

        //update the quantity in the database
        $modelProduct->updateQuantity($product['id'], $product['quantity']);

        //Display if adding was a success
        require_once PATH_VIEW . 'seeCurrentCart.php';

    } else {

        //Display not available error
        require_once PATH_GLOBAL_VIEW . 'error_not_available.php';
    }

} else if (isset($_GET['id_product']) && $_GET['function'] == 'remove') {

// Get the product to add ant secure of the $_GET variable as a int
    $product = $modelProduct->getProductById(intval($_GET['id_product']));

    //Call the remove method from cart object
    $myCart->remove(intval($_GET['id_product']));

    //Increase the quantity of the product
    $product['quantity']++;

    //Add the quantity to the product removed
    $modelProduct->updateQuantity($product['id'], $product['quantity']);

    require_once PATH_VIEW . 'seeCurrentCart.php';

} else {

    // Just display the Current shopping Cart
    require_once PATH_VIEW . 'seeCurrentCart.php';
}


