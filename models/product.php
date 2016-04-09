<?php


function getProduct($idProduct)
{
    $pdo = PDO2::getInstance();

    $query = $pdo->prepare("SELECT * FROM product WHERE id = :id");

    $query->bindValue(':id', $idProduct);
    $query->execute();

    if ($result = $query->fetch(PDO::FETCH_ASSOC)) {
        $query->closeCursor();
        return $result;
    }
    return false;
}

function getCategories()
{
    $pdo = PDO2::getInstance();

    $query = $pdo->prepare("SELECT * FROM category");
    $query->execute();
    $result = $query->fetchAll();
    return $result;
}

function getAllProducts()
{
    $pdo = PDO2::getInstance();

    $query = $pdo->prepare("SELECT * FROM product");
    $query->execute();
    $result = $query->fetchAll();
    return $result;
}

function addProduct($product_name, $quantity, $category, $picture)
{
    $pdo = PDO2::getInstance();

    $query = $pdo->prepare("INSERT INTO product SET
              name = :name,
              quantity = :quantity,
              id_category = :id_category,
              picture = :picture");

    $query->bindValue(':name', $product_name);
    $query->bindValue(':quantity', $quantity);
    $query->bindValue(':id_category', $category);
    $query->bindValue(':picture', $picture);

    if ($query->execute()) {

        return $pdo->lastInsertId();
    }
    return $query->errorInfo();
}