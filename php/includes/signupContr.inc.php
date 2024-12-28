<?php

declare(strict_types=1);

function isInputEmpty(string $username, string $pwd, string $email, string $name): bool
{
    if (empty($username) || empty($pwd) || empty($email) || empty($name)) {
        return true;
    } else {
        return false;
    }
}
function isEmailInvalid(string $email): bool
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    } else {
        return true;
    }
}
function isUsernameTaken(object $pdo, string $username): bool
{
    if (getUsername($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}
function isEmailTaken(object $pdo, string $email): bool
{
    if (getEmail($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}
function createUser(object $pdo, string $username, string $email, string $password, string $name)
{
    setUser($pdo, $username, $email, $password, $name);
}
?>