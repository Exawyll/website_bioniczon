<?php

if (isset($_POST['rating']) && isset($_POST['comment']) && isset($_POST['author'])) {

    //Secure the posts
    $mark = htmlspecialchars($_POST['rating']);
    $comment = htmlspecialchars($_POST['comment']);
    $idProduct = intval($_GET['id_product']);
    $author = htmlspecialchars($_POST['author']);

    //Add the model path
    require_once PATH_MODEL . 'comments.php';
    $modelComment = new Model_Comment();

    //$request = $modelComment->addComment($_SESSION['id'], $idProduct, $mark, $comment, $author);

    //if (ctype_digit($request)) {

        //Send to the view
//        header('Location: index.php?module=product&action=see_product&id_product=' . $_GET['id_product']);
//    } else {
//        echo 'error';
//    }

}