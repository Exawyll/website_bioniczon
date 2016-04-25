<?php

function getAddressById($idAddress)
{
    $pdo = PDO2::getInstance();

    $query = $pdo->prepare("SELECT * FROM address WHERE id = :id_address");

    $query->bindValue(':id_address', $idAddress);
    $query->execute();

    if ($result = $query->fetch()) {
        $query->closeCursor();
        return $result;
    }
    return false;
}

function getAddressByUser($idUser)
{
    $pdo = PDO2::getInstance();

    $query = $pdo->prepare("SELECT * FROM address WHERE id_user = :id_user");

    $query->bindValue(':id_user', $idUser);
    $query->execute();

    if ($result = $query->fetchAll()) {
        $query->closeCursor();
        return $result;
    }
    return false;
}