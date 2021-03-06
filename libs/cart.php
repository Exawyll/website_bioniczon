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
            (string)($product['id']) => array(
                'id' => $product['id'],
                'name' => $product['name'],
                'picture' => $product['picture'],
                'quantity' => 1,
                'price' => $product['price']
            )
        );

        if (!empty($_SESSION['cart_item'])) {
            if (isset($_SESSION['cart_item'][(string)($product["id"])])) {

                $_SESSION['cart_item'][(string)($product["id"])]['quantity']++;

            } else {

                $_SESSION['cart_item'][(string)($product["id"])] = $this->productArray[(string)($product["id"])];
            }

        } else {

            $_SESSION['cart_item'] = $this->productArray;
        }
    }

    public function remove($idProduct)
    {
        if (isset($_SESSION['cart_item'][(string)($idProduct)])) {

            if ($_SESSION['cart_item'][(string)($idProduct)]['quantity'] > 1) {

                $_SESSION['cart_item'][(string)($idProduct)]['quantity']--;

            } else {

                unset($_SESSION['cart_item'][(string)($idProduct)]);

                if (empty($_SESSION['cart_item'])) {

                    unset($_SESSION['cart_item']);
                }
            }
        }
    }

//    public function unsetCart()
//    {
//        unset($_SESSION["cart_item"]);
//    }
}