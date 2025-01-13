<?php
declare(strict_types=1);

function doesUserExist(object $pdo, int $userID)
{
    $query = "SELECT * FROM users WHERE userID = :userID";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}
function checkUserUsername(object $pdo, int $userID, string $input)
{
    $query = "SELECT username FROM users where userID = :userID";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
    $stmt->execute();
    if ($stmt->fetch(PDO::FETCH_ASSOC) = $input) {
        return true;
    } else {
        return false;
    }
}