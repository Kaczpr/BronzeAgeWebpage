<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        require_once("../includes/configSession.inc.php");
        require_once("../articles/articleModel.inc.php");
    } catch (\Throwable $th) {
        echo "Błąd: " . $th->getMessage();
    }

    $index = $_COOKIE['selectedArticleIndex'];
    $newID = $_POST['newArticleID'];

    changeDisplayArticles_DELETE_DISPLAY($pdo, $index);
    changeDisplayArticles_ADD_DISPLAY($pdo, $newID);

    // Przekieruj użytkownika
    header('Location: ../admin.php?success=1');
    exit();
} else {
    header("Location: ../index.php");
    die();
}
?>