<?php

//On appel le model pour les produits
require_once PATH_MODEL . 'product.php';

//We first get all the categories available to add a product
$cat = getCategories();

//Load the form to add product
require_once PATH_VIEW . 'add_product.php';

if (!empty($_POST['product_name']) && !empty($_POST['quantity']) && !empty($_POST['category']) && !empty($_POST['picture'])) {

    $tabErrors = array();

    //Je vérifie que tout est saisi correctement
    if (empty($_POST['product_name'])) {
        $tabErrors[] = "product_name";
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

    var_dump(intval($_POST['category'][0]));

    //Sécurisation des variables
    $name = htmlspecialchars($_POST['name']);
    $quantity = htmlspecialchars($_POST['quantity']);
    $category = intval($_POST['category'][0]);
    $picture = htmlspecialchars($_POST['picture']);
    if (empty($tabErrors)) {
        //J'insère en base de données
        require_once($_SERVER['DOCUMENT_ROOT'] . 'projet_eCommerce/models/product.php');
    } else {
        var_dump($tabErrors);
    }
}
