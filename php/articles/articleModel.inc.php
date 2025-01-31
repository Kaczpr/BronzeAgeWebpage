<?php
declare(strict_types=1);
use LDAP\Result;


function getArticle(object $pdo, int $articleID): ?array
{
    $query = "SELECT * FROM articles WHERE articleID = :articleID;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":articleID", $articleID, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ?: null;
}
function getArticleByPlace(object $pdo, string $placeOfInterest): ?array
{
    $query = "SELECT * FROM articles WHERE placeOfInterest = :placeOfInterest;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":placeOfInterest", $placeOfInterest, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result ?: null;
}

function countArticlesByPlace(object $pdo, string $placeOfInterest): ?int
{
    $query = "SELECT COUNT(*) AS total_articles FROM articles WHERE placeOfInterest = :placeOfInterest;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam("placeOfInterest", $placeOfInterest, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchColumn();
    return $result ?: null;
}