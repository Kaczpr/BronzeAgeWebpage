<?php
require_once("includes/configSession.inc.php");
require_once("articles/articleView.inc.php");
require_once("articles/articleModel.inc.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Artykuły</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="../css/articlesDisplayStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <?php
    include("nav.php");
    $placeOfInterest = $_GET['placeOfInterest'];
    $result = getArticleByPlace($pdo, $placeOfInterest);
    ?>
    <div class="head">
        <h1>Przeglądaj wszystkie artykuły</h1>
        <h5>Związane z miejscem: <?php echo $placeOfInterest ?>.</h5>
    </div>
    <?php
    displayAllArticles($pdo, $placeOfInterest); ?>
</body>