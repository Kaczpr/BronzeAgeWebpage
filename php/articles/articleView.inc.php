<?php
declare(strict_types=1);
try {
    require_once __DIR__ . "/../includes/dbh.inc.php";
    require_once(__DIR__ . "/articleModel.inc.php");
    require_once(__DIR__ . "/articleContr.inc.php");
} catch (PDOException $e) {
    die("Test nieudany" . $e->getMessage());
}

function displayArticle(object $pdo, int $articleID)
{
    $result = getArticle($pdo, $articleID);
    include_once(__DIR__ . "/../nav.php");
    ?>
    <article>
        <h1>
            <?php echo $result['articleDiscription']; ?>
        </h1>
        <section class="date">
            <p> <?php echo $result['dateStored'] ?></p>
        </section>
        <section class="articleBanner">
            <img src=<?php echo $result['imageSource'] ?> alt="article banner" />
        </section>
        <?php echo $result['htmlContent'] ?>
    </article>
    <?php include __DIR__ . "/../commentSection.php"; ?>
<?php
}

function displayArticleList(object $pdo, string $placeOfInterest): void
{
    $result = getArticleByPlace($pdo, $placeOfInterest);

    if ($result) {
        ?>
        <ul class="articleList">
            <?php foreach ($result as $article) { ?>
                <?php $articleID = $article['articleID'] ?>
                <a href="<?php echo "/BronzeAgeWebpage/php/articleDisplay.php?articleID=$articleID" ?>">
                    <li><?= htmlspecialchars($article['title']) ?></li>
                </a>
            <?php } ?>
        </ul>
        <?php
    } else {
        echo "Brak artykułów dla podanego miejsca.";
    }
}
function displayAllArticles(object $pdo, string $placeOfInterest)
{
    $result = getArticleByPlace($pdo, $placeOfInterest);
    if ($result) {

        ?>
        <section class="articles">
            <section class="articlesSelection">
                <?php foreach ($result as $article) { ?>
                    <section class="Ind_selectedArticle">
                        <?php $articleID = $article['articleID'] ?>
                        <a href="<?php echo "/BronzeAgeWebpage/php/articleDisplay.php?articleID=$articleID"; ?>">
                            <section class="Ind_articleImage">
                                <img src="<?php echo $article['imageSource']; ?>" alt="Obrazek artykułu">
                            </section>
                            <section class="Ind_articleName">
                                <h1><?php echo $article['title']; ?></h1>
                            </section>
                            <section class="Ind_articleDiscription">
                                <p><?php echo $article['articleDiscription']; ?></p>
                            </section>
                        </a>
                    </section>
                    <?php
                } ?>
            </section>

        </section>
        <?php

    } else {
        ?>
        <h2 style="text-align: center">"Brak artykułów dla takiego miejsca."</h2>
        <?php
    }
}
function displayIndexArticles(object $pdo, array $articles2Display): void
{
    for ($i = 0; $i <= 3; $i++) { 
        $result = getArticle($pdo, $articles2Display[$i]); 
        if ($result) { 
            ?>
            <section class="selectedArticle">
                <?php $articleID = $result['articleID']; ?>
                <a href="<?php echo "articleDisplay.php?articleID=$articleID"; ?>">
                    <section class="articleImage">
                        <img src="<?php echo $result['imageSource']; ?>" alt="Obrazek artykułu">
                    </section>
                    <section class="articleName">
                        <h1><?php echo htmlspecialchars($result['title']); ?></h1>
                    </section>
                    <section class="articleDiscription">
                        <p><?php echo htmlspecialchars($result['articleDiscription']); ?></p>
                    </section>
                </a>
            </section>
            <?php
        }
    }
}