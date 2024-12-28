<?php

declare(strict_types=1);

function getUsername(object $pdo, string $username): string
{
    $query = "SELECT username FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result !== false && isset($result['username'])) {
        return $result['username'];
    }

    return "";
}

function getEmail(object $pdo, string $emial): string
{
    $query = "SELECT email from users where email = :emial;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":emial", $emial, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result !== false && isset($result['email'])) {
        return $result['email'];
    }

    return "";
}
function setUser(object $pdo, string $username, string $password, string $email, string $name): void
{
        $query = "INSERT INTO users (username, hashPassword, name, email) 
              VALUES (:username, :password, :name, :email)";
    
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];
    
    $hashedPwd = password_hash($password, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
    $stmt->bindParam(":password", $hashedPwd, PDO::PARAM_STR);
    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);

    $stmt->execute();
}

?>