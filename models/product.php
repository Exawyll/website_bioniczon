<?php

/**
 * Class Model_Products
 */
class Model_Products
{
    /**
     * @var PDO
     */
    private $db;

    /**
     * Model_Products constructor.
     */
    public function __construct()
    {
        $this->db = PDO2::getInstance();
    }

    /**
     * @param $idCategory
     * @return array|bool
     */
    function getProductByCategory($idCategory)
    {
        $query = $this->db->prepare("SELECT * FROM product WHERE id_category = :id_category");

        $query->bindValue(':id_category', $idCategory);
        $query->execute();

        if ($result = $query->fetchAll()) {
            $query->closeCursor();
            return $result;
        }
        return false;
    }

    /**
     * @param $idProduct
     * @return bool|mixed
     */
    function getProductById($idProduct)
    {
        $query = $this->db->prepare("SELECT * FROM product WHERE id = :id_product");

        $query->bindValue(':id_product', $idProduct);
        $query->execute();

        if ($result = $query->fetch()) {
            $query->closeCursor();
            return $result;
        }
        return false;
    }

    /**
     * @return array
     */
    function getCategories()
    {
        $query = $this->db->prepare("SELECT * FROM category");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    /**
     * @return array
     */
    function getAllProducts()
    {
        $this->db = PDO2::getInstance();

        $query = $this->db->prepare("SELECT * FROM product");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    /**
     * @param $productName
     * @param $quantity
     * @param $category
     * @param $picture
     * @param $description
     * @param $price
     * @return array|string
     */
    function addProduct($productName, $quantity, $category, $picture, $description, $price)
    {
        $query = $this->db->prepare("INSERT INTO product SET
              name = :name,
              quantity = :quantity,
              id_category = :id_category,
              picture = :picture,
              description = :description,
              price = :price");

        $query->bindValue(':name', $productName);
        $query->bindValue(':quantity', $quantity);
        $query->bindValue(':id_category', $category);
        $query->bindValue(':picture', $picture);
        $query->bindValue(':description', $description);
        $query->bindValue(':price', $price);

        if ($query->execute()) {

            return $this->db->lastInsertId();
        }
        return $query->errorInfo();
    }

    /**
     * @param $idProduct
     * @param $quantity
     * @return bool
     */
    function updateQuantity($idProduct, $quantity)
    {
        $query = $this->db->prepare("UPDATE product SET
		quantity = :quantity
		WHERE
		id = :idProduct");

        $query->bindValue(':quantity', $quantity);
        $query->bindValue(':idProduct', $idProduct);

        return $query->execute();
    }

    /**
     * @param $idProduct
     * @return bool
     */
    function deleteProduct($idProduct)
    {
        $query = $this->db->prepare("DELETE FROM product WHERE id=:id_product");

        $query->bindValue(':id_product', $idProduct);

        return $query->execute();
    }
}