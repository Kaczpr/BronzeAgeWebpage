<?php


declare(strict_types=1);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        require_once("dbh.inc.php");
        require_once("configSession.inc.php");
        require_once("commentsModel.inc.php");
        require_once("commentContr.inc.php");
        require_once("commentsView.inc.php");


        $commentContent = $_POST['comment-input'];
        $authorID = $_SESSION['userID'];
        $articleID = $_POST['currentArticleID'];
        $prevPage = $_POST['prevPage'];
        $errors = [];
        if (isInputEmpty($commentContent)) {
            $errors['inputEmpty'] = "Podaj treść komentarza.";
        }
        if (!empty($errors)) {
            var_dump($errors);
            die();
        } else {
            modelAddComment($pdo, $commentContent, $authorID, $articleID);
            header("Location: " . $prevPage);
            die();


        }
    } catch (PDOException $e) {
        die("Test nieudany" . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}
