<?php

function updateUserAvatar($idUser, $avatar)
{
    $pdo = PDO2::getInstance();

    $query = $pdo->prepare("UPDATE user SET
		avatar = :avatar
		WHERE
		id = :id");

    $query->bindValue(':id', $idUser);
    $query->bindValue(':avatar', $avatar);

    return $query->execute();
}

/*function validateAccountFromHash($validateHash) {

    $pdo = PDO2::getInstance();

    $query = $pdo->prepare("UPDATE user SET
		validateHash = ''
		WHERE
		validateHash = :validateHash");

    $query->bindValue(':validateHash', $validateHash);

    $query->execute();

    return ($query->rowCount() == 1);
}*/

function validateSignIn($login, $password)
{

    $pdo = PDO2::getInstance();

    $query = $pdo->prepare("SELECT id FROM user
		WHERE
		login = :login AND
		password = :password");

    $query->bindValue(':login', $login);
    $query->bindValue(':password', $password);
    $query->execute();

    if ($result = $query->fetch(PDO::FETCH_ASSOC)) {

        $query->closeCursor();
        return $result['id'];
    }
    return false;
}

function infoUser($idUser)
{

    $pdo = PDO2::getInstance();

    $query = $pdo->prepare("SELECT firstname, lastname, login, password, email, avatar, registerDate, admin
		FROM user
		WHERE
		id = :id");

    $query->bindValue(':id', $idUser);
    $query->execute();

    if ($result = $query->fetch(PDO::FETCH_ASSOC)) {

        $query->closeCursor();
        return $result;
    }
    return false;
}

function getAllUsers()
{
    $pdo = PDO2::getInstance();

    $query = $pdo->prepare("SELECT * from user");

    $query->execute();

    return $query->fetchAll();
}

function turnUserAdmin($idUser)
{
    $pdo = PDO2::getInstance();

    $query = $pdo->prepare("UPDATE user SET admin=1 WHERE id=:id");

    $query->bindValue(':id', $idUser);

    return $query->execute();
}

function turnUserNotAdmin($idUser)
{
    $pdo = PDO2::getInstance();

    $query = $pdo->prepare("UPDATE user SET admin=0 WHERE id=:id");

    $query->bindValue(':id', $idUser);

    return $query->execute();
}

//Master delete user
function deleteUser($idUser)
{
    $pdo = PDO2::getInstance();

    $query = $pdo->prepare("DELETE FROM address WHERE id_user=:id");
    $query->bindValue(':id', $idUser);
    var_dump($query);
    $query->execute();

    $query = $pdo->prepare("DELETE FROM comments WHERE id_user=:id");
    $query->bindValue(':id', $idUser);
    var_dump($query);
    $query->execute();

    $query = $pdo->prepare("DELETE FROM orders WHERE id_user=:id");
    $query->bindValue(':id', $idUser);
    var_dump($query);
    $query->execute();

    $query = $pdo->prepare("DELETE FROM user WHERE id=:id");
    $query->bindValue(':id', $idUser);
    var_dump($query);

    return $query->execute();
}