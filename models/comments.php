<?php

/**
 * Class Model_Comment
 */
class Model_Comment
{
    /**
     * @var PDO
     */
    private $db;

    /**
     * Model_Comment constructor.
     */
    public function __construct()
    {
        $this->db = PDO2::getInstance();
    }

    /**
     * @param $idUser
     * @param $idProduct
     * @param $mark
     * @param $comment
     * @param $author
     * @return array|string
     */
    function addComment($idUser, $idProduct, $mark, $comment, $author)
    {
        $query = $this->db->prepare("INSERT INTO comments SET
        id_user = :id_user,
        id_product = :id_product,
        review = :review,
        mark = :mark,
        author = :author,
        writtenDate = NOW()");

        $query->execute(array(
            ':id_user' => $idUser,
            ':id_product' => $idProduct,
            ':review' => $comment,
            ':mark' => $mark,
            ':author' => $author
        ));

        if ($query->execute()) {

            return $this->db->lastInsertId();
        }
        return $query->errorInfo();
    }

    /**
     * @param $idProduct
     * @return array|bool
     */
    function getCommentsByProduct($idProduct)
    {
        $query = $this->db->prepare("SELECT * FROM comments WHERE id_product = :id_product");

        $query->bindValue(':id_product', $idProduct);
        $query->execute();

        if ($result = $query->fetchAll()) {
            $query->closeCursor();
            return $result;
        }
        return false;
    }
}