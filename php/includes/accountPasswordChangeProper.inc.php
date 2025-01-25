<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require_once('tokenVerification.inc.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $csrfToken = $_POST['csrfToken'] ?? '';

        if (!verifyCsrfToken($csrfToken)) {
            $_SESSION["errorPwdChange"] = ["csrfError" => "Nieprawidłowy token CSRF|" . $csrfToken];
            $_SESSION['test'] = $_POST['csrfToken'];
            header("Location: ../account.php?signup=failure");
            die();
        }

        require_once("accountContr.inc.php");
        require_once("accountModel.inc.php");
        require_once("configSession.inc.php");
        require_once("dbh.inc.php");
        $newPwd = $_POST['newPwd'];
        $inputPwd = $_POST['prevPwd'];
        $userPwd = getUserByID($pdo, $_SESSION["userID"])['hashPassword'];
        $errors = [];

        if (isPwdWrong($inputPwd, $userPwd)) {
            $errors['wrongPwd'] = "Podano błędne hasło.";
        }

        if (!(isPwdValid($newPwd))) {
            $errors['invalidPwd'] = "Hasło musi zawierać przynajmniej 9 znaków, w tym przynajmniej jeden znak specjalny i liczbe! bulbulbul";
        }

        if ($errors) {
            $_SESSION["errorPwdChange"] = $errors;
            header("Location: ../account.php?signup=failure");
            die();
        }
        $userID = $_SESSION['userID'];
        changePwd($pdo, $userID, $newPwd);
        header("Location: ../account.php?signup=success");
        $pdo = null;
        $stmt = null;

    } catch (PDOException $e) {
        die("Wpis nieudany" . $e->getMessage());
    }
} else {
    die();
}
