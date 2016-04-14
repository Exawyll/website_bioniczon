<?php

class Cart
{

    private $productArray = array();

    /**
     * Cart constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return array
     */
    public function getProductArray()
    {
        return $this->productArray;
    }

    public function add($product)
    {
        $this->productArray = array(
            $product["id"] => array(
                'name' => $product["name"],
                'picture' => $product["picture"],
                'quantity' => 1,
                'price' => $product["price"]
            )
        );

        if (!empty($_SESSION["cart_item"])) {
            if (in_array($product["id"], $_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($product["id"] == $k) {
                        $_SESSION["cart_item"][$k]["quantity"]++;
                    }
                }
            } else {
                $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $this->productArray);
            }
        } else {
            $_SESSION["cart_item"] = $this->productArray;
        }
    }

    public function remove($product)
    {
        if (!empty($_SESSION["cart_item"])) {
            foreach ($_SESSION["cart_item"] as $k => $v) {
                if ($_GET["code"] == $k)
                    unset($_SESSION["cart_item"][$k]);
                if (empty($_SESSION["cart_item"]))
                    unset($_SESSION["cart_item"]);
            }
        }
    }

    public function unsetCart()
    {
        unset($_SESSION["cart_item"]);
    }

    // Check if product already in the shopping cart
    public function findId($idProduct)
    {
        foreach ($_SESSION['cart']['product'] as $product) {
            if ($product['id'] === $idProduct) {
                return true;
            }
        }
        return false;
    }
}