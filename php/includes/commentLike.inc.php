<?php

declare(strict_types=1);
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once("dbh.inc.php");
    require_once("configSession.inc.php");
    require_once("commentsModel.inc.php");
    require_once("commentContr.inc.php");
    require_once("commentsView.inc.php");

    if (!isset($_SESSION['userID'])) {
        header("Location: /login.php");
        exit();
    }

    $currentUserID = $_SESSION['userID'];
    $currentCommentID = $_POST['commentID'];
    $prevPage = $_POST['prevPage'];
    $errors = [];
    if (isLiked($pdo, $currentUserID, $currentCommentID)) {
        $errors["isLiked"] = "Już oceniłeś ten komentarz pozytywnie";
    }

    if (!empty($errors)) {
        var_dump($errors);
        die();
    } else {
        addLike($pdo, $currentUserID, $currentCommentID);
        likesCount($pdo, $currentCommentID);
        header("Location: " . $prevPage);
        exit();
    }
} else {
    header("Location: /index.php");
    exit();
}
