<?php

// Lib for the class cart
require_once PATH_LIB . 'cart.php';

// New instance of a shopping Cart
$myCart = new Cart();

if ($_GET['id_product']) {

// Call the model for products
    require_once PATH_MODEL . 'product.php';

// Get the product to add ant secure of the $_GET variable as a int
    $product = getProductById(intval($_GET['id_product']));

//if (){}
// Call the function to add in the cart
    $myCart->add($product);

    require_once PATH_VIEW . 'seeCurrentCart.php';

} else {

    // Just display the Current shopping Cart
    require_once PATH_VIEW . 'seeCurrentCart.php';
}


