<?php

function addComment($idUser, $idProduct, $mark, $comment, $author)
{
    $pdo = PDO2::getInstance();

    $query = $pdo->prepare("INSERT INTO comments SET
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

        return $pdo->lastInsertId();
    }
    return $query->errorInfo();
}

function getCommentsByProduct($idProduct)
{
    $pdo = PDO2::getInstance();

    $query = $pdo->prepare("SELECT * FROM comments WHERE id_product = :id_product");

    $query->bindValue(':id_product', $idProduct);
    $query->execute();

    if ($result = $query->fetchAll()) {
        $query->closeCursor();
        return $result;
    }
    return false;
}