<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["password"];
    $email = $_POST["email"];
    $name = $_POST["name"];

    try {
        require_once("dbh.inc.php");
        require_once("signupModel.inc.php");
        require_once("signupContr.inc.php");

        //errorHandlingSegment
        $errors = [];
        if (isInputEmpty($username, $pwd, $email, $name)) {
            $error["inputEmpty"] = "Podaj wszystkie dane";
        }
        if (isEmailInvalid($email)) {
            $errors["emailInvalid"] = "Błędny e-mail";
        }
        if (isUsernameTaken($pdo, $username)) {
            $errors["usernameTaken"] = "Taki login już istnieje - podaj inny";
        }
        if (isEmailTaken($pdo, $email)) {
            $errors["emailTaken"] = "Taki e-mail jest juz wykorzystany - podaj inny";
        }

        require_once("configSession.inc.php");

        if ($errors) {
            $_SESSION["errorSignup"] = $errors;
            header("Location: ../signup.php");
            die();
        }

        createUser($pdo, $username, $pwd, $email, $name);
        header("Location: ../index.php?signup=success");
        $pdo = null;
        $stmt = null;
        
        die();

    } catch (PDOException $e) {
        die("Wpis nieudany" . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}

?>