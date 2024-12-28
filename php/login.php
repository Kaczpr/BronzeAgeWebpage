<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Historia Epoki Brązu</title>
  <link rel="stylesheet" href="../css/login.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "bronzeAgeWebsite";
  $conn = new mysqli($servername, $username, $password, $database);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  ?>

  <div class="registration">
    <div class="left">
      <h1>Zaloguj się</h1>
      <h2>Witaj z powrotem</h2>
    </div>
    <div class="right">
      <div class="reg">
        <form action="" method="post">
          <label for="fname">Login:</label><br />
          <input type="text" id="login" name="login" placeholder="Login.." /><br /><br />
          <label for="lname">Hasło:</label><br />
          <input type="password" id="password" name="password" placeholder="Hasło.." /><br /><br />
          <input type="submit" value="Zaloguj się" />
        </form>
      </div>
    </div>
  </div>
</body>


<?php
$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];
$name = $_POST['name'];

// Hashowanie hasła
$passwordHash = password_hash($password, PASSWORD_BCRYPT);

$servername = "localhost";
$username = "root";
$password = "";
$database = "bronzeAgeWebsite";
try {
  // Połączenie z bazą danych
  $pdo = new PDO('mysql:host=localhost;dbname=bronzeAgeWebsite;charset=utf8', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Przygotowanie zapytania SQL
  $sql = "INSERT INTO users (login, hashPassword, name, email) VALUES (:login, :passwordHash, :name, :email)";
  $stmt = $pdo->prepare($sql);

  // Powiązanie zmiennych z parametrami w zapytaniu
  $stmt->bindParam(':login', $login);
  $stmt->bindParam(':passwordHash', $passwordHash);
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':email', $email);

  // Wykonanie zapytania
  $stmt->execute();

  echo "Użytkownik został zapisany do bazy danych.";
} catch (PDOException $e) {
  echo "Błąd: " . $e->getMessage();
}
$conn->close();
?>