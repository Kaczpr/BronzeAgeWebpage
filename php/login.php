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
    include("../html/nav.html");
    ?>
    <<div class="loginMain">
      <div class="loginHello"><h1>Zaloguj się</h1></div>

      <div class="login">
        <form action="">
          <label for="fname">Login:</label><br />
          <input type="text" id="login" name="login" placeholder="Login.." /><br />
          <label for="lname">Hasło:</label><br />
          <input type="text" id="password" name="login" placeholder="Hasło.." /><br /><br />
          <input type="submit" value="Zaloguj się" />
        </form>
      </div>
    </div>
  </body>
</body>