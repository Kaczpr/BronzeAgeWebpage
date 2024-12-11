<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Historia Epoki Brązu</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
</head>

<body>
    <?php
    include("../html/nav.html");
    include("../html/hero.html");
    include("../html/civs.html");
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "bronzeAgeWebsite";

    $conn = new mysqli($servername, $username, $password, $database);

    // Sprawdzenie połączenia
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>

    <section class="articles">
        <?php
        $sql = "SELECT id, articleUrl, title, imageSource, html_content, date_stored, articleDiscription FROM articles WHERE id = 1 ;";
        $result = $conn->query($sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $articleTitle = $row["title"];
            $articleImage = $row["imageSource"];
            $articleLink = $row["articleUrl"];
            $articleDiscription = $row["articleDiscription"];
            $articleUrl = $row["articleUrl"];
        }
        ?>
        <section class="articlesText">
            <h1>Poznaj najnowsze artykuły ze świata archeologii</h1>
        </section>
        <section class="articlesSelection">
            <section class="selectedArticle">
                <a href="<?php echo $articleUrl ?>">
                    <section class="articleImage">
                        <img src="<?php echo $articleImage; ?>" alt="Obrazek artykułu">
                    </section>
                    <section class="articleName">
                        <h1><?php echo $articleTitle ?></h1>
                    </section>
                    <section class="articleDiscription">
                        <p>
                            <?php echo $articleDiscription ?>
                        </p>
                    </section>
                </a>
            </section>
            <section class="selectedArticle">
                <section class="articleImage">
                    <img src="../images/stock2.jpg" alt="article image" />
                </section>
                <section class="articleName">
                    <h1>Lorem, ipsum dolor.</h1>
                </section>
                <section class="articleDiscription">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim,
                        consectetur!
                    </p>
                </section>
            </section>
            <section class="selectedArticle">
                <section class="articleImage">
                    <img src="../images/articles/sadMan.jpg" alt="article image" />
                </section>
                <section class="articleName">
                    <h1><a href="articles/esrahadonArticle.html">Aesrahaddon</a></h1>
                </section>
                <section class="articleDiscription">
                    <p>
                        <a href="esrahadonArticle.html">Choroba tak stara jak cywilizacja? Historia Ashrahaddona -
                            asyryjskiego króla cierpiącego na depresje.</a>
                    </p>
                </section>
            </section>
        </section>
    </section>
    <?php
    $conn->close();
    ?>
</body>