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
    href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  require "includes/configSession.inc.php";
  require "includes/loginView.inc.php";

  ?>

  <main class="registration">
    <section class="left">
      <h1>Zaloguj się</h1>
      <h2>Witaj z powrotem</h2>

    </section>
    <section class="right">
      <div class="reg">
        <form action="includes/login.inc.php" method="post">
          <label for="username">Login:</label><br />
          <input type="text" id="username" name="username" placeholder="Login.." required /><br /><br />
          <label for="password">Hasło:</label><br />
          <input type="password" id="password" name="password" placeholder="Hasło.." required /><br /><br />
          <input type="submit" value="Zaloguj się" />
        </form>
        <?php
        checkLoginErros();
        ?>
      </div>
    </section>
  </main>
</body>

</html>