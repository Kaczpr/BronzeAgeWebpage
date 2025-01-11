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

    // Sprawdź, czy użytkownik jest zalogowany
    if (!isset($_SESSION['userID'])) {
        header("Location: /login.php");
        exit();
    }

    $currentUserID = $_SESSION['userID'];
    $currentCommentID = $_POST['commentID'];
    $prevPage = $_POST['prevPage'];

    // Sprawdź, czy użytkownik już polubił ten komentarz
    $errors = [];
    if (isLiked($pdo, $currentUserID, $currentCommentID)) {
        $errors["isLiked"] = "Już oceniłeś ten komentarz pozytywnie";
    }

    if (!empty($errors)) {
        // Jeśli są błędy, nie wykonuj dalszych operacji
        var_dump($errors);
        die();  // Możesz usunąć 'die()' po naprawieniu problemu
    } else {
        // Dodaj like do bazy danych
        addLike($pdo, $currentUserID, $currentCommentID);
        
        // Przekierowanie
        header("Location: " . $prevPage);
        exit();  // Zakończ dalsze wykonywanie kodu po przekierowaniu
    }
} else {
    header("Location: /index.php");
    exit();  // Zakończ dalsze wykonywanie kodu po przekierowaniu
}
