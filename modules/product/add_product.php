<?php

//On appel le model pour les produits
require_once PATH_MODEL . 'product.php';

//We first get all the categories available to add a product
$cat = getCategories();

//Load the form to add product
require_once PATH_VIEW . 'add_product.php';

//Get all the current products
$allProducts = getAllProducts();

//List them
require_once PATH_VIEW . 'list_products.php';

if (!empty($_POST['product_name']) && !empty($_POST['quantity']) && !empty($_POST['category']) && !empty($_POST['picture']) && !empty($_POST['description'])) {

    $tabErrors = array();

    if (!empty($_POST)) {

        //Je vérifie que tout est saisi correctement
        if (empty($_POST['product_name'])) {
            $tabErrors[] = "name";
        }
        if (empty($_POST['quantity'])) {
            $tabErrors[] = "quantity";
        }
        if (empty($_POST['category'])) {
            $tabErrors[] = "category";
        }
        if (empty($_POST['picture'])) {
            $tabErrors[] = "picture";
        }
        if (empty($_POST['description'])) {
            $tabErrors[] = "description";
        }
    }

    //Secure the variables
    $name = htmlspecialchars($_POST['product_name']);
    $quantity = htmlspecialchars($_POST['quantity']);
    $category = intval($_POST['category'][0]);
    $picture = htmlspecialchars($_POST['picture']);
    $description = htmlspecialchars($_POST['description']);

    if (empty($tabErrors)) {

        //Insertion in the database
        $newProduct = addProduct($name, $quantity, $category, $picture, $description);

        //If the database has added the new product
        if (ctype_digit($newProduct)) {

            //List them
            require_once PATH_VIEW . 'list_products.php';

        } else {
            print_r($newProduct[2]);
        }
    }

} else {
    if (!empty($_POST)) {
        echo 'Please, fill all the fields !';
    }
}
