<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {

    require_once("includes/dbh.inc.php");
    require_once("includes/commentsModel.inc.php");

    $result = [];
    $result = getComment($pdo, 1);
    echo $result["content"];
} catch (PDOException $e) {
    die("Test nieudany" . $e->getMessage());
}
