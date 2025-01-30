<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    // Dołączanie plików z użyciem ścieżki bezwzględnej
    require_once __DIR__ . "/articles/articleView.inc.php"; // Dołączanie articleView.inc.php
    require_once __DIR__ . "/includes/configSession.inc.php";       // Dołączanie configSession.inc.php
    require_once __DIR__ . "/includes/dbh.inc.php";                 // Dołączanie dbh.inc.php
} catch (PDOException $e) {
    die("Test nieudany: " . $e->getMessage());
}

echo "dupa";
displayArticle($pdo, 1); // Przykładowe wywołanie funkcji z articleView.inc.php