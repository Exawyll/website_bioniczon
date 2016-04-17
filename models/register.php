<?php

function addUserInDB($firstname, $lastname, $login, $mdp, $email) {

    $pdo = PDO2::getInstance();

    $query = $pdo->prepare("INSERT INTO user SET
		firstname = :firstname,
		lastname = :lastname,
		login = :login,
		password = :password,
		email = :email,
		registerDate = NOW()");

    $query->bindValue(':firstname', $firstname);
    $query->bindValue(':lastname', $lastname);
    $query->bindValue(':login', $login);
    $query->bindValue(':password', $mdp);
    $query->bindValue(':email', $email);

    if ($query->execute()) {

        return $pdo->lastInsertId();
    }
    return $query->errorInfo();
}
