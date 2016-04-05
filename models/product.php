<?php

class Model_Product
{
    private $db;

    /**
     * Model_Produit constructor.
     */
    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function getProduct($idProduct)
    {
        $sqlQuery = "SELECT * FROM product WHERE id = :id";
        $tab = array(
            'id' => $idProduct
        );
        $result = $this->db->fetch($sqlQuery, $tab);
        return $result;
    }

    public function getAllProducts()
    {
        $sqlQuery = "SELECT * FROM product;";
        $result = $this->db->fetch($sqlQuery);
        return $result;
    }

    public function addProduct()
    {
        $sqlQuery = "INSERT INTO product(name,quantity)
                              VALUES (:name,:quantity);";
        $tab = array(
            "name" => $_POST['name'],
            "quantity" => $_POST['quantity']
        );
        $this->db->insert($sqlQuery, $tab);
    }
}