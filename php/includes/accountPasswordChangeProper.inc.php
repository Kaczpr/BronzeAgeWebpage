<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $prevPwd = $_POST['prevPwd'];
    $newPwd = $_POST['newPwd'];

    try {
        echo "test";
        require_once("configSession.inc.php");
        require_once("accountModel.inc.php");
        require_once("accountContr.inc.php");

        echo "test";

    } catch (PDOException $e) {
        die("Wpis nieudany" . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}