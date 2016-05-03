<?php

// Check if user is admin
if (!adminUser()) {

// Error already connected
    include PATH_GLOBAL_VIEW . 'error_not_connected.php';

} else {

// Cal the products model
    require_once PATH_MODEL . 'product.php';
    $modelProduct = new Model_Products();

//We first get all the categories available to add a product
    $cat = $modelProduct->getCategories();

//Get all the current products
    $allProducts = $modelProduct->getAllProducts();

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
            $newProduct = $modelProduct->addProduct($name, $quantity, $category, $picture, $description, $price);

            //If the database has added the new product
            if (ctype_digit($newProduct)) {

                //Update the page
                header('Location: index.php?module=backOffice&action=add_product');

            } else {
                print_r($newProduct[2]);
            }
        }

    } elseif (isset($_GET['function']) && isset($_GET['id_product'])) {

        // Get the concerned product from the DB
        $product = $modelProduct->getProductById($_GET['id_product']);

        if ($_GET['function'] == 'increase') {

            // increase the quantity
            $product['quantity']++;

            // Update the quantity in the DB
            $modelProduct->updateQuantity($product['id'], $product['quantity']);

        } elseif ($_GET['function'] == 'decrease') {

            if ($product['quantity'] > 0) {

                // decrease the quantity
                $product['quantity']--;
            }

            // Update the quantity in the DB
            $modelProduct->updateQuantity($product['id'], $product['quantity']);

        }

        //Update the page
        header('Location: index.php?module=backOffice&action=add_product');
    } else {

        //Load the form to add product
        require_once PATH_VIEW . 'add_product.php';

        if (!empty($_POST)) {
            echo 'Please, fill all the fields !';
        }
    }

}
