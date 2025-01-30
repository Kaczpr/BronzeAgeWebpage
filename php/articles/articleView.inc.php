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