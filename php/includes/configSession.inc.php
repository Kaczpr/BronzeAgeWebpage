<?php
include("articles2displayConfig.inc.php");

ini_set("session.use_only_cookies", 1);
ini_set("session.use_strict_mode", 1);



session_set_cookie_params([
    "lifetime" => "1800",
    "domain" => "localhost",
    "path" => "/",
    "secure" => false,  // Change to false for local development
    "httponly" => true
]);

session_start();
if (!isset($_SESSION['csrfToken'])) {
    $_SESSION['csrfToken'] = bin2hex(random_bytes(32));
    $csrfToken = $_SESSION['csrfToken'];
}


if (isset($_SESSION["userID"])) {
    if (!isset($_SESSION["lastRegeneration"])) {
        regenerateSessionID_loggedIn();
    } else {
        $interval = 60 * 30;
    }
    if (time() - $_SESSION['lastRegeneration'] >= $interval) {
        regenerateSessionID_loggedIn();
    }
} else {
    if (!isset($_SESSION["lastRegeneration"])) {
        regenerateSessionID();
    } else {
        $interval = 60 * 30;
    }
    if (time() - $_SESSION['lastRegeneration'] >= $interval) {
        regenerateSessionID();
    }
}

function regenerateSessionID(): void {
    session_regenerate_id(true);
    $_SESSION["lastRegeneration"] = time();
    header("Location: /BronzeAgeWebpage/php/index.php");
    die();
}

function regenerateSessionID_loggedIn(): void {
    session_regenerate_id(true);
    $_SESSION["lastRegeneration"] = time();
    header("Location: /BronzeAgeWebpage/php/index.php");
    die();
}


?>
