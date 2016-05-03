<?php

//The model for product is necessary
require_once PATH_MODEL . 'product.php';
$modelProduct = new Model_Products();

if (!isset($_GET['id_product']) && !isset($_GET['id_category'])) {

    //We first get all the products available
    $allProducts = $modelProduct->getAllProducts();

    //breadcrumb maker
    $name = 'Articles';

    //And we display them
    require_once PATH_VIEW . 'all_products.php';

} elseif (isset($_GET['id_product'])) {

    //The model for product is necessary
    require_once PATH_MODEL . 'comments.php';
    $modelComment = new Model_Comment();

    $idProduct = intval($_GET['id_product']);

    if (isset($_POST['rating']) && isset($_POST['comment']) && isset($_POST['author'])) {

        if (!empty($_SESSION['id'])) {

            //Secure the posts
            $mark = htmlspecialchars($_POST['rating']);
            $comment = htmlspecialchars($_POST['comment']);
            $author = htmlspecialchars($_POST['author']);

            $request = $modelComment->addComment($_SESSION['id'], $idProduct, $mark, $comment, $author);
        } else {

            //Bring the error not connected
            require_once PATH_GLOBAL_VIEW . 'error_toBuy.php';
        }
    }

    //Get the product
    $product = $modelProduct->getProductById($idProduct);
    $comments['comment'] = $modelComment->getCommentsByProduct($idProduct);

    //Check if comments exist
    if (!empty($comments)) {
        $fullData = array_merge($comments, $product);

        $arr[] = json_encode($fullData);
    } else {
        $arr[] = json_encode($product);
    }

//Create the file or overwrite it
    $file = './js/store-products.json';

// Write into the file the json code of my object
    file_put_contents($file, $arr);

    //Send to the view
    require_once PATH_VIEW . 'viewProduct.php';

} elseif (isset($_GET['id_category'])) {

    $idCategory = intval($_GET['id_category']);

    //breadcrumb maker
    $page = $modelProduct->getCategories();
    $name = 'Articles > ' . $page[$idCategory - 1][1];

    $allProducts = $modelProduct->getProductByCategory($idCategory);

    //And we display them
    require_once PATH_VIEW . 'all_products.php';
}
