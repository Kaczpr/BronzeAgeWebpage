<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $pwd = $_POST["password"];

    try {
        require_once("dbh.inc.php");
        require_once("loginModel.inc.php");
        require_once("loginContr.inc.php");

        $errors = [];

        //errorHandlingSegment
        if(isInputEmpty($username, $pwd)){
            $errors["inputEmpty"] = "Wypełnij pola";
        }
        
        $result = getUser($pdo, $username);

        if(isUsernameWrong($result)){
            $errors["dataError"] = "Podano błedne dane";
        }
        if(!isUsernameWrong($result) && isPwdWrong($pwd, $result["hashPassword"]) ){
            $errors["dataError"] = "Podano błedne dane";
        }



        require_once("configSession.inc.php");

        if ($errors) {
            $_SESSION["errorLogIn"] = $errors;
            header("Location: ../login.php");
            die();
        }

        $newSessionID = session_create_id();
        $sessionID = hash('sha256', $newSessionID . $result['id']);
        session_id($sessionID);
        
        session_start();
        
        $_SESSION['userID'] = $result['userID'];
        $_SESSION['userUsername'] = $result['username'];
        $_SESSION['userName'] = $result['name'];
        $_SESSION['userEmail'] = $result['email'];
        
        $_SESSION["lastRegeneration"] = time();
        
        session_regenerate_id(true);
        
        header("Location: ../index.php?login=success");
        exit();
        

    } catch (PDOException $e) {
        die("Logowanie nieudane" . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
    die();
}