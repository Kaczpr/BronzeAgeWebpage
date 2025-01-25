<?php
require_once("configSession.inc.php");
function verifyCsrfToken($token) {
    // Sprawdź, czy CSRF token istnieje w sesji
    if (!isset($_SESSION['csrfToken'])) {
        return false;
    }
    // Porównaj tokeny
    return hash_equals($_SESSION['csrfToken'], $token);
}
?>
