<?php
try {
    require_once("includes/configSession.inc.php");
    require_once("articles/articleView.inc.php");
} catch (\Throwable $th) {
    echo "Błąd: ", $th->getMessage();
}
if (!isset($_SESSION["isAdmin"]) || !($_SESSION['isAdmin'] == 1)) {
    header('index.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona Administracji</title>
    <link rel="stylesheet" href="../css/adminStyle.css">
    <script src="../js/admin.js"></script>

</head>

<body>
    <?php
    include("nav.php");
    ?>
    <div class="options">
        <div class="option">
            <h1>Zmień wyróżnione artykuły</h1>
            <div class="articles2display">
                <?php
                displayDisplayedArticlesList($pdo);
                ?>
            </div>
            <?php
            if (isset($_GET["success"])) {
                var_dump($articles2display);
            }
            ?>


            <div id="formContainer" style="display: none;">
                <form id="articleForm" action="admin/changeDisplayArticles.php" method="POST">

                    <label for="newArticleID">ID nowego artykułu:</label>
                    <input type="int" id="newArticleID" name="newArticleID" required></input>
                    <br>
                    <button type="submit">Zapisz zmiany</button>
                    <button type="button" onclick="hideForm()">Anuluj</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>