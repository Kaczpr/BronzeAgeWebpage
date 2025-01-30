<?php
declare(strict_types=1);


function getArticle(object $pdo, int $articleID): ?array
{
    $query = "SELECT * FROM articles WHERE articleID = :articleID;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":articleID", $articleID, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ?: null; 
}