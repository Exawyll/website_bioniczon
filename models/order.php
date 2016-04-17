<?php

function getUserAddress($idUser)
{
    $pdo = PDO2::getInstance();

    $query = $pdo->prepare("SELECT * FROM address WHERE
		id = :id");

    $query->bindValue(':id', intval($idUser));
    $query->execute();

    $result = $query->fetchAll();

    return $result;
}

function addUserAddress($idUser, $city, $number, $postalCode, $streetName, $firstName, $lastName)
{
    $pdo = PDO2::getInstance();

    var_dump($city);
    var_dump($firstName);

    $query = $pdo->prepare("INSERT INTO address SET
        id_user = :id_user,
        city = :city,
        num = :num,
        postalCode = :postalCode,
        streetName = :streetName,
        firstname = :firstName,
        lastname = :lastName");

    $tab = array(
        'id_user' => $idUser,
        'city' => $city,
        'num' => $number,
        'postalCode' => $postalCode,
        'streetName' => $streetName,
        'firstname' => $firstName,
        'lastname' => $lastName
    );
    var_dump($query);

//    $query->bindValue(':id_user', $idUser);
//    $query->bindValue(':city', $city);
//    $query->bindValue(':num', $number);
//    $query->bindValue(':zipcode', $postalCode);
//    $query->bindValue(':streetName', $streetName);
//    $query->bindValue(':firstname', $firstName);
//    $query->bindValue(':lastname', $lastName);

    if ($query->execute($tab)) {

        return $pdo->lastInsertId();
    }
    return $query->errorInfo();
}