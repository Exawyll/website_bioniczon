<?php

/**
 * Class Model_Order
 */
class Model_Order
{
    /**
     * @var PDO
     */
    private $db;

    /**
     * Model_Order constructor.
     */
    public function __construct()
    {
        $this->db = PDO2::getInstance();
    }

    /**
     * @return array|string
     */
    function addOrder()
    {
        $query = $this->db->prepare("INSERT INTO orders SET
      id_user = :id_user,
      dateOrder = NOW(),
      dateDelivery = NOW() + INTERVAL 2 DAY");

        $query->bindValue(':id_user', $_SESSION['id']);

        if ($query->execute()) {

            return $this->db->lastInsertId();
        }
        return $query->errorInfo();
    }

    /**
     * @param $idOrder
     * @param $nameProduct
     * @param $price
     * @param $quantity
     * @return array|string
     */
    function addOrder_product($idOrder, $nameProduct, $price, $quantity)
    {
        $query = $this->db->prepare("INSERT INTO order_product SET
      id_orders = :id_orders,
      nameProduct = :nameProduct,
      price = :price,
      quantity = :quantity");

        $query->bindValue(':id_orders', $idOrder);
        $query->bindValue(':nameProduct', $nameProduct);
        $query->bindValue(':price', $price);
        $query->bindValue(':quantity', $quantity);

        if ($query->execute()) {

            return $this->db->lastInsertId();
        }
        return $query->errorInfo();
    }

    /**
     * @param $idUser
     * @return array|bool
     */
    function getOrderByUser($idUser)
    {
        $query = $this->db->prepare("SELECT * FROM orders INNER JOIN order_product ON orders.id = order_product.id_orders
          WHERE orders.id_user = :id_user");

        $query->bindValue(':id_user', $idUser);
        $query->execute();

        if ($result = $query->fetchAll()) {
            $query->closeCursor();
            return $result;
        }
        return false;
    }
}