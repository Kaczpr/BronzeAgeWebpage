<?php

declare(strict_types=1);

function isInputEmpty(string $commentContent): bool
{
    return empty($commentContent);
}
function isLiked(object $pdo, int $userID, string $commentID)
{
    $query = "SELECT * FROM likes WHERE userID = :userID AND commentID = :commentID";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
    $stmt->bindParam(':commentID', $commentID, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}

