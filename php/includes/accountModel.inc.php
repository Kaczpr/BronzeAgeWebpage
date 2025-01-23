<?php
declare(strict_types=1);

if (!function_exists('getUserByID')) {
    function getUserByID(object $pdo, int $userID): ?array
    {
        $query = "SELECT * FROM users WHERE userID = :userID";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }
}
if (!function_exists('changePwd')) {
    function changePwd(object $pdo, int $userID, string $newPwd)
    {
        $result = getUserByID($pdo, $userID);
        $options = [
            'cost' => 12
        ];
        $hashedPwd = password_hash($newPwd, PASSWORD_BCRYPT, $options);
        $query = "UPDATE users
                set hashPassword = :hashedPwd
                where userID = :userID";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindParam(':hashedPwd', $hashedPwd, PDO::PARAM_STR);
        $stmt->execute();
    }
}
if (!function_exists('getHashedPwd')) {
    function getHashedPwd(object $pdo, int $userID): string|false {
        $query = "SELECT hashPassword FROM users WHERE userID = :userID";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['hashPassword'] ?? false;
    }
    
}