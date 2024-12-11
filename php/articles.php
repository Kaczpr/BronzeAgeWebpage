<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Esarhaddon</title>
  <link rel="stylesheet" href="../../css/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
</head>

<body>



  <?php
  include("../html/nav.html");
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
  $sql = "SELECT COUNT(*) FROM articles";
  $result = mysqli_query($conn, $sql);
  $count = mysqli_fetch_assoc($result)['COUNT(*)'];
  ?>
  <h1>Wszystkie Artykuły</h1>
  <h5>Przeglądaj artykuły według lokacji.</h5>
  <div class="articles">
    <div class="articlesOfCertainPlace">
      <div class="placeName">
        <h1>Asyria</h1>
      </div>
      <div class="articlesList">
        <div class="oneArticle">
          <ul class="articlesList">
            <?php
            for ($i = 0; $i < $count; $i++) {
              $sql = "SELECT id, articleUrl, title, imageSource, html_content, date_stored, articleDiscription, placeOfInterest FROM articles WHERE id = $i";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $articleTitle = $row["title"];
                  $articleLink = $row["articleUrl"];
                  $articlePlace = $row["placeOfInterest"];

                  if ($articlePlace == "Assyria") {
                    ?>
                    <li><a href="<?php echo $articleLink; ?>"> <?php echo $articleTitle; ?> </a></li>
                  <?php
                  }
                }
              }

            }
            ?>
            <li><a href="#">Lorem ipsum dolor sit amet.</a></li>
            <li><a href="#">Lorem ipsum dolor sit amet.</a></li>
            <li><a href="#">Lorem ipsum dolor sit amet.</a></li>
          </ul>
        </div>
        <div class="readMore">
          Znajdź więcej artykułów na ten temat
        </div>
      </div>
    </div>
    <div class="articlesOfCertainPlace">
      <div class="placeName">
        <h1>Babilonia</h1>
      </div>
      <div class="articlesList">
        <div class="oneArticle">
          <ul class="articlesList">
            <li><a href="#">Lorem ipsum dolor sit amet.</a></li>
            <li><a href="#">Lorem ipsum dolor sit amet.</a></li>
            <li><a href="#">Lorem ipsum dolor sit amet.</a></li>
          </ul>
        </div>
        <div class="readMore">
          Znajdź więcej artykułów na ten temat
        </div>
      </div>
    </div>
    <div class="articlesOfCertainPlace">
      <div class="placeName">
        <h1>Egipt</h1>
      </div>
      <div class="articlesList">
        <div class="oneArticle">
          <ul class="articlesList">
            <li><a href="#">Lorem ipsum dolor sit amet.</a></li>
            <li><a href="#">Lorem ipsum dolor sit amet.</a></li>
            <li><a href="#">Lorem ipsum dolor sit amet.</a></li>
          </ul>
        </div>
        <div class="readMore">
          Znajdź więcej artykułów na ten temat
        </div>
      </div>
    </div>
    <div class="articlesOfCertainPlace">
      <div class="placeName">
        <h1>Minojczycy i Mykeńczycy</h1>
      </div>
      <div class="articlesList">
        <div class="oneArticle">
          <ul class="articlesList">
            <li><a href="#">Lorem ipsum dolor sit amet.</a></li>
            <li><a href="#">Lorem ipsum dolor sit amet.</a></li>
            <li><a href="#">Lorem ipsum dolor sit amet.</a></li>
          </ul>
        </div>
        <div class="readMore">
          Znajdź więcej artykułów na ten temat
        </div>
      </div>
    </div>
    <div class="articlesOfCertainPlace">
      <div class="placeName">
        <h1>Inne</h1>
      </div>
      <div class="articlesList">
        <div class="oneArticle">
          <ul class="articlesList">
            <li><a href="#">Lorem ipsum dolor sit amet.</a></li>
            <li><a href="#">Lorem ipsum dolor sit amet.</a></li>
            <li><a href="#">Lorem ipsum dolor sit amet.</a></li>
          </ul>
        </div>
        <div class="readMore">
          Znajdź więcej artykułów na ten temat
        </div>
      </div>
    </div>
  </div>
</body>