<?php
declare(strict_types=1);
require("accountModel.inc.php");



function doesUserExist(object $pdo, int $userID)
{
    $result = getUserByID($pdo, $userID);
    if ($result) {
        return true;
    } else {
        return false;
    }
}
function checkUserUsername(object $pdo, int $userID, string $input)
{
    $result = getUserByID($pdo, $userID);
    $username = $result['username'];
    if ($username = $input) {
        return true;
    } else {
        return false;
    }
}
function isPwdWrong(string $pwd, string $hashedPwd): bool {
    return !password_verify($pwd, $hashedPwd);
}

function isPwdLong(string $pwd)
{
    if (mb_strlen($pwd) > 8) {
        return true;
    } else
        return false;

}
function isPwdContainSpecialChar(string $pwd)
{
    if (!preg_match('/\d/', $pwd) && preg_match('/[^a-zA-Z\d]/', $pwd)) {
        return true;
    } else
        return false;
}
function isPwdInvalid(string $pwd)
{
    if (!isPwdLong($pwd) && isPwdContainSpecialChar($pwd))
        return true;
    else
        return false;
}