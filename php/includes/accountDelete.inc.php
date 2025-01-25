<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("configSession.inc.php");
header('Content-Type: text/html');  

// Pobierz dane wejściowe
$token = $_SESSION['csrfToken'] ?? '';

// Sprawdź, czy CSRF token istnieje w sesji
if (!isset($_SESSION['csrfToken'])) {
    echo json_encode(['success' => false, 'error' => 'CSRF token not set in session']);
    exit;
}

// Porównaj tokeny
if (hash_equals($_SESSION['csrfToken'], $token)) {
    echo json_encode(['success' => true]);
    exit;
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid CSRF token']);
    exit;
}
