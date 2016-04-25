<?php

//Vérification des droits d'accès de la page
if (!adminUser()) {

// On affiche la page d'erreur comme quoi l'utilisateur est déjà connecté
    include PATH_GLOBAL_VIEW . 'error_not_connected.php';

} else {

//On appel le model pour les produits
    require_once PATH_MODEL . 'product.php';

//We first get all the categories available to add a product
    $cat = getCategories();

//Get all the current products
    $allProducts = getAllProducts();

//Load the form to add product
    require_once PATH_VIEW . 'add_product.php';

    if (!empty($_POST['price']) && !empty($_POST['product_name']) && !empty($_POST['quantity']) && !empty($_POST['category']) && !empty($_POST['picture']) && !empty($_POST['description'])) {

        $tabErrors = array();

        if (!empty($_POST)) {

            //Check if every field is valid
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
            if (empty($_POST['price'])) {
                $tabErrors[] = "price";
            }
        }

        //Secure the variables
        $name = htmlspecialchars($_POST['product_name']);
        $quantity = htmlspecialchars($_POST['quantity']);
        $category = intval($_POST['category'][0]);
        $picture = htmlspecialchars($_POST['picture']);
        $price = floatval($_POST['price']);
        $description = htmlspecialchars($_POST['description']);

        if (empty($tabErrors)) {

            //Insertion in the database
            $newProduct = addProduct($name, $quantity, $category, $picture, $description, $price);

            //If the database has added the new product
            if (ctype_digit($newProduct)) {

                //Update the page
                header('Location: index.php?module=backOffice&action=add_product');

            } else {
                print_r($newProduct[2]);
            }
        }
    } else {
        if (!empty($_POST)) {
            echo 'Please, fill all the fields !';
        }
    }
}
