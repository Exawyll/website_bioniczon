<?php

function addUserInDB($firstname, $lastname, $login, $mdp, $email) {

    $pdo = PDO2::getInstance();

    $requete = $pdo->prepare("INSERT INTO user SET
		firstname = :firstname,
		lastname = :lastname,
		login = :login,
		password = :password,
		email = :email,
		registerDate = NOW()");

    $requete->bindValue(':firstname', $firstname);
    $requete->bindValue(':lastname', $lastname);
    $requete->bindValue(':login', $login);
    $requete->bindValue(':password', $mdp);
    $requete->bindValue(':email', $email);

    if ($requete->execute()) {

        return $pdo->lastInsertId();
    }
    return $requete->errorInfo();
}
