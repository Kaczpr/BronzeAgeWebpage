<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try {
    require_once __DIR__ . "/articles/articleView.inc.php";
    require_once __DIR__ . "/includes/configSession.inc.php";
    require_once __DIR__ . "/includes/dbh.inc.php";
} catch (PDOException $e) {
    die("Test nieudany: " . $e->getMessage());
}

?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Artykuł</title>
    <link rel="stylesheet" href="../css/articleStyle.css" />
    <link rel="stylesheet" href="../css/commentStyle.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <?php
    $articleID = $_GET['articleID'];
    $_SESSION["currentArticleID"] = $articleID;
    $articleURL = $_SERVER['PHP_SELF'];
    ?>
</head>
<?php
displayArticle($pdo, $articleID); // Przykładowe wywołanie funkcji z articleView.inc.php