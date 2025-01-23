<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] === "POST") {


    try {
        echo "test";
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

        if (isPwdInvalid($newPwd)) {
            $errors['invalidPwd'] = "Hasło musi zawierać przynajmniej 9 znaków, w tym przynajmniej jeden znak specjalny";
        }


        if ($errors) {
            $_SESSION["errorPwdChange"] = $errors;
            $currentUrl = $_SERVER['REQUEST_URI'];
            //header("Location: $currentUrl");
            var_dump($errors);
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
    echo "dupa";
    //header("Location: ../index.php");
    die();
}