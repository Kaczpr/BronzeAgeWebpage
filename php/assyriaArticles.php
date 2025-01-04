<?php
include ("includes/configSession.inc.php");
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
    <div class="head">
        <h1>Przeglądaj wszystkie artykuły</h1>
        <h5>Związane z Asyrią.</h5>
    </div>
    <section class="articles">
        <?php
        $sql = "SELECT id, articleUrl, title, imageSource, html_content, date_stored, articleDiscription, placeOfInterest FROM articles WHERE placeOfInterest = 'Assyria'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $articleTitle = $row["title"];
                $articleLink = $row["articleUrl"];
                $articleDiscription = $row["articleDiscription"];
                $articleImage = $row["imageSource"]
                    ?>

                <section class="articlesSelection">
                    <section class="Ind_selectedArticle">
                        <a href="<?php echo $articleLink; ?>">
                            <section class="Ind_articleImage">
                                <img src="<?php echo $articleImage; ?>" alt="Obrazek artykułu">
                            </section>
                            <section class="Ind_articleName">
                                <h1><?php echo $articleTitle; ?></h1>
                            </section>
                            <section class="Ind_articleDiscription">
                                <p><?php echo $articleDiscription; ?></p>
                            </section>
                        </a>
                    </section>
                </section>

                <?php
            }
        } else {
            echo "<li>Brak artykułów dla tego miejsca.</li>";
        }
        ?>
    </section>


</body>