<?php
$host = 'localhost';
$database = "bronzeAgeWebsite";
$DBusername = 'root';
$password = '1234';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $DBusername,
    $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die('Błąd połaczenia ' . $e->getMessage());
}
?>