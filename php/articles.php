<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    require_once("includes/configSession.inc.php");
    require_once("articles/articleView.inc.php");
    require_once("includes/configSession.inc.php");
} catch (Exception $e) {
    die("Test nieudany: " . $e->getMessage());
}
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
  
  ?>
  <div class="head">
    <h1>Wszystkie Artykuły</h1>
    <h5>Przeglądaj artykuły według lokacji.</h5>
  </div>
  <div class="articles">
    <div class="articlesOfCertainPlace">
        <div class="placeName">
            <h1>Asyria</h1>
            <div class="articleList">
                <div class="oneArticle"> <?php
                    displayArticleList($pdo, "Assyria");?> 
                </div>
            </div>
        </div>
        <div class="readMore">
          <a href="allArticles.php?placeOfInterest=Assyria">Znajdź więcej artykułów na ten temat &rarr;</a>
        </div>
    </div>
    <div class="articlesOfCertainPlace">
        <div class="placeName">
            <h1>Babilon</h1>
            <div class="articleList">
                <div class="oneArticle"> <?php
                    displayArticleList($pdo, "Babylon");?> 
                </div>
            </div>
        </div>
        <div class="readMore">
          <a href="allArticles.php?placeOfInterest=Babylon">Znajdź więcej artykułów na ten temat &rarr;</a>
        </div>
    </div>
    <div class="articlesOfCertainPlace">
        <div class="placeName">
            <h1>Egipt</h1>
            <div class="articleList">
                <div class="oneArticle"> <?php
                    displayArticleList($pdo, "Egypt");?> 
                </div>
            </div>
        </div>
        <div class="readMore">
          <a href="allArticles.php?placeOfInterest=Egypt">Znajdź więcej artykułów na ten temat &rarr;</a>
        </div>
    </div>
    <div class="articlesOfCertainPlace">
        <div class="placeName">
            <h1>Hellada</h1>
            <div class="articleList">
                <div class="oneArticle"> <?php
                    displayArticleList($pdo, "Mycenae");?> 
                </div>
            </div>
        </div>
        <div class="readMore">
          <a href="allArticles.php?placeOfInterest=Mycenae">Znajdź więcej artykułów na ten temat &rarr;</a>
        </div>
    </div>
    
  </div>
</body>
