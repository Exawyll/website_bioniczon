<?php

function addComment($idUser, $idProduct)
{
    $pdo = PDO2::getInstance();

    $query = $pdo->prepare("INSERT INTO comment SET
        'id_user' = :id_user,
        'id_product' = :id_product,
        'description' = :description,
        'mark' = :mark,
        'writtenDate' = NOW()");

    $query->execute(
        array(
            "titre" => $titre,
            "auteur" => $auteur,
            "datePublication" => $date,
            "contenu" => $texte,
            "isPublished" => $isPublished
        )
    );
}