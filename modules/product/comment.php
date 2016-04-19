<?php


if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['comment'])) {

    //Sécure the posts
    $titre = htmlspecialchars($_POST['title']);
    $auteur = htmlspecialchars($_POST['author']);
    $texte = htmlspecialchars($_POST['comment']);

    var_dump($_POST);

    //Send to the view
//    header('Location: index.php?module=product&action=see_product&id_product=' . $_GET['id_product']);
}