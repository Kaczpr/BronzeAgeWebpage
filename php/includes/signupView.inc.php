<?php

declare(strict_types=1);

function checkSignupErrors(){
    if(isset($_SESSION['errorSignup'])){
        $errors = $_SESSION['errorSignup'];

        echo "<br/>";
        foreach($errors as $error){
            echo $error;
        }

        unset($_SESSION['errorsSignup']);
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success"){
        echo "udało sie";
    }
}
?>