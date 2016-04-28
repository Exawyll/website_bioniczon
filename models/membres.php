<?php

/**
 * Class Model_Users
 */
class Model_Users
{
    private $db;

    /**
     * Model_membres constructor.
     */
    public function __construct()
    {
        $this->db = PDO2::getInstance();;
    }

    /**
     * @param $firstname
     * @param $lastname
     * @param $login
     * @param $mdp
     * @param $email
     * @return array|string
     */
    function addUserInDB($firstname, $lastname, $login, $mdp, $email)
    {
        $query = $this->db->prepare("INSERT INTO user SET
		firstname = :firstname,
		lastname = :lastname,
		login = :login,
		password = :password,
		email = :email,
		registerDate = NOW(),
		admin = 0");

        $query->bindValue(':firstname', $firstname);
        $query->bindValue(':lastname', $lastname);
        $query->bindValue(':login', $login);
        $query->bindValue(':password', $mdp);
        $query->bindValue(':email', $email);

        if ($query->execute()) {

            return $this->db->lastInsertId();
        }
        return $query->errorInfo();
    }

    /**
     * @param $firstname
     * @param $lastname
     * @param $login
     * @param $mdp
     * @param $email
     * @return string
     */
    function updateUserInDB($firstname, $lastname, $login, $mdp, $email)
    {
        $query = $this->db->prepare("REPLACE INTO user SET
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
            return true;
        } else {
            return $query->errorInfo();
        }
    }

    /**
     * @param $login
     * @param $password
     * @return bool
     */
    function validateSignIn($login, $password)
    {
        $query = $this->db->prepare("SELECT id FROM user
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

    /**
     * @param $idUser
     * @return bool|mixed
     */
    function infoUser($idUser)
    {
        $query = $this->db->prepare("SELECT firstname, lastname, login, password, email, registerDate, admin
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

    /**
     * @return array
     */
    function getAllUsers()
    {
        $query = $this->db->prepare("SELECT * from user");

        $query->execute();

        return $query->fetchAll();
    }

    /**
     * @param $idUser
     * @return bool
     */
    function turnUserAdmin($idUser)
    {
        $query = $this->db->prepare("UPDATE user SET admin=1 WHERE id=:id");

        $query->bindValue(':id', $idUser);

        return $query->execute();
    }

    /**
     * @param $idUser
     * @return bool
     */
    function turnUserNotAdmin($idUser)
    {
        $query = $this->db->prepare("UPDATE user SET admin=0 WHERE id=:id");

        $query->bindValue(':id', $idUser);

        return $query->execute();
    }

    /**
     * @param $idUser
     * @return bool
     */
    function deleteUser($idUser)
    {
        $query = $this->db->prepare("DELETE FROM address WHERE id_user=:id");
        $query->bindValue(':id', $idUser);
        $query->execute();

        $query = $this->db->prepare("DELETE FROM comments WHERE id_user=:id");
        $query->bindValue(':id', $idUser);
        $query->execute();

        $query = $this->db->prepare("DELETE FROM orders WHERE id_user=:id");
        $query->bindValue(':id', $idUser);
        $query->execute();

        $query = $this->db->prepare("DELETE FROM user WHERE id=:id");
        $query->bindValue(':id', $idUser);

        return $query->execute();
    }
}
