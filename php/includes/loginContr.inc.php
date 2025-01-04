<?php
declare(strict_types=1);

function isUsernameWrong(array|bool $result): bool{
    if(!$result){
        return true;
    }else{
        return false;
    }
}

function isPwdWrong(string $pwd, string $hashedPwd): bool{
    if(!password_verify($pwd, $hashedPwd)){
        return true;
    } else{
        return false;
    }
}
function isInputEmpty(string $username, $pwd){
    if (empty($username) || empty($pwd)){
    return true; 
    } else{
        return false;
    }
}