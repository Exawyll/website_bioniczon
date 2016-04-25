<?php

function getUserAddress($idUser)
{
    $pdo = PDO2::getInstance();

    $query = $pdo->prepare("SELECT * FROM address WHERE
        id_user = :id_user;");

    $query->bindValue(':id_user', $idUser);

    $query->execute();

    $result = $query->fetchAll();

    return $result;
}

function addUserAddress($idUser, $city, $number, $postalCode, $streetName, $firstName, $lastName)
{
    $pdo = PDO2::getInstance();

    $query = $pdo->prepare("INSERT INTO address SET
        id_user = :id_user,
        city = :city,
        num = :num,
        postalCode = :postalCode,
        streetName = :streetName,
        firstname = :firstName,
        lastname = :lastName");

    $query->bindValue(':id_user', $idUser);
    $query->bindValue(':city', $city);
    $query->bindValue(':num', $number);
    $query->bindValue(':postalCode', $postalCode);
    $query->bindValue(':streetName', $streetName);
    $query->bindValue(':firstName', $firstName);
    $query->bindValue(':lastName', $lastName);

    if ($query->execute()) {

        return $pdo->lastInsertId();
    }
    return $query->errorInfo();
}

function addOrder()
{
    $pdo = PDO2::getInstance();

    $query = $pdo->prepare("INSERT INTO orders SET
      id_user = :id_user,
      dateOrder = NOW(),
      dateDelivery = NOW() + INTERVAL 2 DAY");

    $query->bindValue(':id_user', $_SESSION['id']);

    if ($query->execute()) {

        return $pdo->lastInsertId();
    }
    return $query->errorInfo();
}

function addOrder_product($idOrder, $nameProduct, $price, $quantity) {
    $pdo = PDO2::getInstance();

    $query = $pdo->prepare("INSERT INTO order_product SET
      id_orders = :id_orders,
      nameProduct = :nameProduct,
      price = :price,
      quantity = :quantity");

    $query->bindValue(':id_orders', $idOrder);
    $query->bindValue(':nameProduct', $nameProduct);
    $query->bindValue(':price', $price);
    $query->bindValue(':quantity', $quantity);

    if ($query->execute()) {

        return $pdo->lastInsertId();
    }
    return $query->errorInfo();
}