<?php
declare(strict_types=1);

function getComment(object $pdo, string $commentID){

    $query = "SELECT * FROM comments WHERE commentID = :commentID;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":commentID", $commentID, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result !== false && isset($result['commentID'])) {
        return $result; 
    }
    else{
        return false;
    }

}

?>