<?php

ini_set("session.use_only_cookies", 1);
ini_set("session.use_strict_moe", 1);

session_set_cookie_params([
    "lifetime" => "1800",
    "domain" => "localhost",
    "path" => "/",
    "secure" => "true",
    "httponly" => "true"
]);

session_start();

if (!isset($_SESSION["lastRegeneration"])) {
    regerateSessionID();
} else {
    $interval = 60 * 30; //30 minut w sekundach
}
if (time() - $_SESSION['lastRegeneration'] >= $interval) {
    regerateSessionID();
}

function regerateSessionID(): void
{
    session_regenerate_id();
    $_SESSION["lastRegeneration"] = time();
}

?>