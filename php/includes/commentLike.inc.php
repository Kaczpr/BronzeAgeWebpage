<?php

declare(strict_types=1);
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once("dbh.inc.php");
    require_once("configSession.inc.php");
    require_once("commentsModel.inc.php");
    require_once("commentContr.inc.php");
    require_once("commentsView.inc.php");
    $currentUserID = $_SESSION['userID'];
    $currentCommentID = $_POST['commentID'];
    $prevPage = $_POST['prevPage'];
    echo gettype($currentUserID) . " " . gettype($currentCommentID) . " " . $prevPage;
    $errors = [];
    if (isLiked($pdo, $currentUserID, $currentCommentID)) {
        $errors["isLiked"] = "Już oceniłeś ten komentarz pozytywnie";
    }
    if (!empty($errors)) {
        var_dump($errors);
        die();
    } else {
        addLike($pdo, $currentUserID, $currentCommentID);
        header("Location: " . $prevPage);
    }
} else {
    header("Location: /index.php");
    die();
}