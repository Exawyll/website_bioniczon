<?php

class Cart {

    private $content = array();

    /**
     * Cart constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return array
     */
    public function getContent()
    {
        return $this->content;
    }

    public function add($product) {
        if (!$this->findId($product['id'])) {
            $this->content = $product;
        }
        if ($product['quantity'] > 0) {
            ++$this->quantity;
        } else {
            echo 'This product is not available anymore';
        }
    }

    public function display() {
        foreach($this->content as $product) {
            print_r($product);
        }
    }

    // Check if product already in the shopping cart
    public function findId($idProduct) {
        foreach($this->content as $product) {
            if ($product['id'] === $idProduct) {
                return true;
            }
        }
        return false;
    }
}