<?php

if (isset($_GET['id_product']) && $_GET['function'] === 'add') {

// Call the model for products
    require_once PATH_MODEL . 'product.php';

// Get the product to add ant secure of the $_GET variable as a int
    $product = getProductById(intval($_GET['id_product']));

    if ($product['quantity'] > 0) {
        // Call the function to add in the cart
        $myCart->add($product);

        //Display if adding was a success
        require_once PATH_VIEW . 'addCartSuccess.php';
    }

} else if (isset($_GET['id_product']) && $_GET['function'] === 'remove') {

    $myCart->remove(intval($_GET['id_product']));

    require_once PATH_VIEW . 'seeCurrentCart.php';

} else if (isset($_GET['function']) && $_GET['function'] === 'unset') {

    $myCart->unsetCart();

    require_once PATH_VIEW . 'seeCurrentCart.php';

} else {

    // Just display the Current shopping Cart
    require_once PATH_VIEW . 'seeCurrentCart.php';
}


