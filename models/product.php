<?php


function getProductByCategory($idCategory)
{
    $pdo = PDO2::getInstance();

    $query = $pdo->prepare("SELECT * FROM product WHERE id_category = :id_category");

    $query->bindValue(':id_category', $idCategory);
    $query->execute();

    if ($result = $query->fetchAll()) {
        $query->closeCursor();
        return $result;
    }
    return false;
}

function getProductById($idProduct)
{
    $pdo = PDO2::getInstance();

    $query = $pdo->prepare("SELECT * FROM product WHERE id = :id_product");

    $query->bindValue(':id_product', $idProduct);
    $query->execute();

    if ($result = $query->fetch()) {
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

function addProduct($productName, $quantity, $category, $picture, $description)
{
    $pdo = PDO2::getInstance();

    $query = $pdo->prepare("INSERT INTO product SET
              name = :name,
              quantity = :quantity,
              id_category = :id_category,
              picture = :picture,
              description = :description");

    $query->bindValue(':name', $productName);
    $query->bindValue(':quantity', $quantity);
    $query->bindValue(':id_category', $category);
    $query->bindValue(':picture', $picture);
    $query->bindValue(':description', $description);

    if ($query->execute()) {

        return $pdo->lastInsertId();
    }
    return $query->errorInfo();
}