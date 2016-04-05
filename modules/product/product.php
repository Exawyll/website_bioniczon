<?php

class Controller_Product
{
    public function viewProduct($idProduct)
    {
        require_once(PATH_MODEL . 'product.php');
        $product = new Model_Product();
        $returnedProduct = $product->getProduct($idProduct);
        require_once(PATH_VIEW . 'viewProduct.php');
    }

    public function listProducts()
    {
        require_once(PATH_MODEL . 'product.php');
        $product = new Model_Product();
        $returnedProduct = $product->getAllProducts();
        require_once(PATH_VIEW . 'listProducts.php');
    }

    public function addProduct()
    {
        $tabErrors = array();
        if (!empty($_POST)) {
            //Je vérifie que tout est saisi correctement
            if (empty($_POST['name'])) {
                $tabErrors[] = "name";
            }
            if (empty($_POST['quantity'])) {
                $tabErrors[] = "quantity";
            }

            //Sécurisation des variables
            $name = htmlspecialchars($_POST['name']);
            $quantity = htmlspecialchars($_POST['quantity']);
            if (empty($tabErrors)) {
                //J'insère en base de données
                require_once($_SERVER['DOCUMENT_ROOT'] . 'eCommerce/models/product.php');
                $product = new Model_Product();
                $product->addProduct();
                header("Location: views/product/listProducts.php");
            }

        }
        require_once($_SERVER['DOCUMENT_ROOT'] . 'eCommerce/views/product/addProduct.php');
    }
}