<?php

//The model for product is necessary
require_once PATH_MODEL . 'product.php';

if (!isset($_GET['id_product']) && !isset($_GET['id_category'])) {

    //We first get all the products available
    $allProducts = getAllProducts();
    $name = 'All the products';

    //And we display them
    require_once PATH_VIEW . 'all_products.php';

} elseif (isset($_GET['id_product'])) {

    //Secure the variable
    $idProduct = intval($_GET['id_product']);

    //Get the product
    $product = getProductById($idProduct);

    var_dump($product);

    $arr[] = htmlspecialchars(json_encode($product));

    var_dump($arr);

    //Send to the view
    require_once PATH_VIEW . 'viewProduct.php';

} elseif (isset($_GET['id_category'])) {

    $idCategory = intval($_GET['id_category']);

    $page = getCategories();
    $name = $page[$idCategory - 1][1];

    $allProducts = getProductByCategory($idCategory);

    //And we display them
    require_once PATH_VIEW . 'all_products.php';

}
