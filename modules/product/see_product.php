<?php

//On appel le model pour les produits
require_once PATH_MODEL . 'product.php';

//We first get all the categories available to add a product
$allProducts = getAllProducts();

require_once PATH_VIEW . 'all_products.php';