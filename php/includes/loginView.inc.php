<?php

declare(strict_types=1);

function checkLoginErros(): void
{
    if (!empty($_SESSION["errorLogIn"])) {
        foreach ($_SESSION["errorLogIn"] as $error) {
            echo "<p class='error-message'>" . htmlspecialchars($error) . "</p>";
        }
        unset($_SESSION["errorLogIn"]);
    }
    else if (isset($_GET["login"]) && $_GET["login"] === "success") {
        echo "<p class='success-message'>Udało się zalogować!</p>";
        echo "<p class='success-message'>Witaj, ! </p> " . $_SESSION['userName'];
        var_dump($_SESSION);

    }
}

