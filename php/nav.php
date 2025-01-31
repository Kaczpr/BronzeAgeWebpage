
<body>
  <nav class="navbar">
    <div class="container">
      <div class="logo">
        <a href="/BronzeAgeWebpage/php/index.php">
          <img src="/BronzeAgeWebpage/images/ujkSmallTrans.png" alt="logo"
        /></a>
      </div>
      <div class="main-nav-menu">
        <ul>
          <li><a href="/BronzeAgeWebpage/php/index.php">Strona główna</a></li>
          <li><a href="/BronzeAgeWebpage/php/articles.php">Artykuły</a></li>
          <?php if (!isset($_SESSION["userID"])){ ?>
            <li><a href="/BronzeAgeWebpage/php/login.php">Zaloguj się</a></li>
            <li><a href="/BronzeAgeWebpage/php/signup.php">Zarejestruj się</a></li><?php
          } else{?>
            <li><a href="/BronzeAgeWebpage/php/includes/signOut.inc.php">Wyloguj się</a></li>
            <li><a href="/BronzeAgeWebpage/php/account.php">Moje Konto</a></li><?php    
          }?>
        </ul>
      </div>
    </div>
  </nav>
</body>
