<?php

if (isset($_GET['id_product']) && $_GET['function'] == 'add') {

    // Call the model for products
    require_once PATH_MODEL . 'product.php';

// Get the product to add ant secure of the $_GET variable as a int
    $product = getProductById(intval($_GET['id_product']));

    if ($product['quantity'] > 0) {

        // Call the function to add in the cart
        $myCart->add($product);

        //Decrease the quantity
        $product['quantity']--;

        //update the quantity in the database
        updateQuantity($product['id'], $product['quantity']);

        //Display if adding was a success
        require_once PATH_VIEW . 'seeCurrentCart.php';

    } else {

        //Display not available error
        require_once PATH_GLOBAL_VIEW . 'error_not_available.php';
    }

} else if (isset($_GET['id_product']) && $_GET['function'] == 'remove') {

    // Call the model for products
    require_once PATH_MODEL . 'product.php';

// Get the product to add ant secure of the $_GET variable as a int
    $product = getProductById(intval($_GET['id_product']));

    //Call the remove method from cart object
    $myCart->remove(intval($_GET['id_product']));

    //Increase the quantity of the product
    $product['quantity']++;

    //Add the quantity to the product removed
    updateQuantity($product['id'], $product['quantity']);

    require_once PATH_VIEW . 'seeCurrentCart.php';

} /*else if (isset($_GET['function']) && $_GET['function'] === 'unset') {

    //Delete all product in the cart
    $myCart->unsetCart();

    require_once PATH_VIEW . 'seeCurrentCart.php';

}*/ else {

    // Just display the Current shopping Cart
    require_once PATH_VIEW . 'seeCurrentCart.php';
}


