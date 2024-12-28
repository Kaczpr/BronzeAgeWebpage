<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Historia Epoki Brązu</title>
    <link rel="stylesheet" href="../css/login.css" />
  
</head>

<body>
    <?php
    require_once "includes/configSession.inc.php";
    require_once "includes/signupView.inc.php";
    ?>

    <div class="registration">
        <div class="left">
            <h1>Stwórz swoje darmowe konto</h1>
            <h2>Zdobądź dostęp do wszystkich funkcji</h2>
            <?php
            checkSignupErrors();
            ?>
        </div>
        <div class="right">
            <div class="reg">
                <form action="includes/signup.inc.php" method="post">
                    <label for="username">Nazwa użytkownika:</label><br />
                    <input type="text" id="username" name="username" placeholder="Nazwa.." required /><br /><br />
                    
                    <label for="email">E-mail:</label><br />
                    <input type="email" id="email" name="email" placeholder="E-mail.." required /><br /><br />
                    
                    <label for="password">Hasło:</label><br />
                    <input type="password" id="password" name="password" placeholder="Hasło.." required /><br /><br />
                    
                    <label for="name">Imię:</label><br />
                    <input type="text" id="name" name="name" placeholder="Imię..." required /><br /><br />
                    
                    <input type="submit" value="Utwórz konto" />
                </form>
            </div>
        </div>
    </div>
</body>

</html>
