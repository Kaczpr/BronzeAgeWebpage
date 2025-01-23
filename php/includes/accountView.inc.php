<?php

function checkPwdChangeErrors(){
    foreach ($_SESSION["errorPwdChange"] as $error) {
        echo "<p class='error-message'>" . htmlspecialchars($error) . "</p>";
    }
    unset($_SESSION["errorPwdChange"]);
}