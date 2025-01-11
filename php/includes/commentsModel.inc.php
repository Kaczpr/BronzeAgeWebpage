<?php
declare(strict_types=1);

function getComment(object $pdo, string $commentID): mixed
{
    $query = "SELECT * FROM comments WHERE commentID = :commentID;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":commentID", $commentID, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result !== false ? $result : false;
}

function getCommentAuthor(object $pdo, string $commentID): mixed
{
    $comment = getComment($pdo, $commentID);

    if ($comment === false || !isset($comment['authorID'])) {
        return false;
    }

    $authorID = $comment['authorID'];

    $query = "SELECT username FROM users WHERE userID = :authorID";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":authorID", $authorID, PDO::PARAM_STR);
    $stmt->execute();

    $author = $stmt->fetch(PDO::FETCH_ASSOC);

    return $author !== false && isset($author['username']) ? $author['username'] : false;
}

function getAllComments(object $pdo, string $articleID): array
{
    $query = "SELECT commentID FROM comments WHERE articleID = :articleID;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":articleID", $articleID, PDO::PARAM_STR);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
}
function modelAddComment(object $pdo, string $commentContent, int $authorID, string $articleID): void
{
    $query = "INSERT INTO comments (content, articleID, authorID) VALUES (
        :commentContent,
        :articleID,
        :authorID
    )";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":commentContent", $commentContent, PDO::PARAM_STR);
    $stmt->bindParam(":authorID", $authorID, PDO::PARAM_INT);
    $stmt->bindParam(":articleID", $articleID, PDO::PARAM_STR);

    if (!$stmt->execute()) {
        $errorInfo = $stmt->errorInfo();
        echo "Błąd wykonania zapytania: " . $errorInfo[2];
    }
}
function addLike(object $pdo, int $userID, string $commentID){
    $query = "INSERT INTO likes (userID, commentID) VALUES (:userID, :commentID)";  
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
    $stmt->bindParam(':commentID', $commentID, PDO::PARAM_STR);
    $stmt->execute();
}
function likesCount(object $pdo, string $commentID)
{
    $query = "SELECT COUNT(*) FROM likes WHERE commentID = :commentID";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':commentID', $commentID, PDO::PARAM_STR); 
    $stmt->execute();
    $likeCount = $stmt->fetchColumn();

    $updateQuery = "UPDATE comments
                    SET upvotes = :likeCount
                    WHERE commentID = :commentID";
    $updateStmt = $pdo->prepare($updateQuery);
    $updateStmt->bindParam(':likeCount', $likeCount, PDO::PARAM_INT);
    $updateStmt->bindParam(':commentID', $commentID, PDO::PARAM_STR);
    $updateStmt->execute();

    //return $likeCount;
}

?>