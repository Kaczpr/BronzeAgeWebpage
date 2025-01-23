<?php
include("includes/configSession.inc.php");

?>

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
    <script src="http://localhost/BronzeAgeWebpage/js/script.js" defer></script>
    <script src="http://localhost/BronzeAgeWebpage/js/modal.js" defer></script>
    <link rel="stylesheet" href="../css/modalsStyle.css">


</head>


<?php
include("nav.php");
require_once("includes/accountView.inc.php");
?>
<div class="account">
    <div class="left">
        <h1>Witaj, <?php echo $_SESSION['userName'] . '.' ?></h1>
        <h2>Oto dane twojego profilu.</h2>
    </div>
    <div class="right">
        <form action="POST">
            <input type="hidden" id="csrfToken" value="<?php echo htmlspecialchars($_SESSION['csrfToken']); ?>">
        </form>
        <h1>Twój login</h1>
        <h2><?php echo $_SESSION['userUsername'] ?></h2>
        <h1>Twoje imię</h1>
        <h2><?php echo $_SESSION['userName'] ?></h2>
        <h1>Twój adres e-mail</h1>
        <h2><?php echo $_SESSION['userEmail'] ?></h2>
        <div class="buttons">
            <button data-open-modal class="changePwd">Zmień Hasło</button>
            <dialog data-modal>
                <?php include($_SERVER['DOCUMENT_ROOT'] . "/BronzeAgeWebpage/html/includes/pwdChange.inc.html"); ?>
                <?php ?>
                <button data-close-modal>Zamknij</button>
            </dialog>
            <button onclick="usunKonto()">Usuń konto</button>
        </div>

    </div>
</div>