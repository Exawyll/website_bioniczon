<?php

/**
 * Class Model_Address
 */
class Model_Address
{
    /**
     * @var PDO
     */
    private $db;

    /**
     * Model_Address constructor.
     */
    public function __construct()
    {
        $this->db = PDO2::getInstance();
    }

    /**
     * @param $idAddress
     * @return bool|mixed
     */
    function getAddressById($idAddress)
    {
        $query = $this->db->prepare("SELECT * FROM address WHERE id = :id_address");

        $query->bindValue(':id_address', $idAddress);
        $query->execute();

        if ($result = $query->fetch()) {
            $query->closeCursor();
            return $result;
        }
        return false;
    }

    /**
     * @param $idUser
     * @return array|bool
     */
    function getAddressByUser($idUser)
    {
        $query = $this->db->prepare("SELECT * FROM address WHERE id_user = :id_user");

        $query->bindValue(':id_user', $idUser);
        $query->execute();

        if ($result = $query->fetchAll()) {
            $query->closeCursor();
            return $result;
        }
        return false;
    }

    /**
     * @param $idUser
     * @param $city
     * @param $number
     * @param $postalCode
     * @param $streetName
     * @param $firstName
     * @param $lastName
     * @return array|string
     */
    function addUserAddress($idUser, $city, $number, $postalCode, $streetName, $firstName, $lastName)
    {
        $query = $this->db->prepare("INSERT INTO address SET
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

            return $this->db->lastInsertId();
        }
        return $query->errorInfo();
    }
}

