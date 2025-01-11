<?php
declare(strict_types=1);
try {
    require_once("dbh.inc.php");
    require_once("commentsModel.inc.php");


} catch (PDOException $e) {
    die("Test nieudany" . $e->getMessage());
}
function printComment(object $pdo, string $commentID): void
{
    $result = [];
    $result = getComment($pdo, $commentID);
    $author = getCommentAuthor($pdo, $commentID);
    ?>
    <div class="comment">
        <div class="commentInfo">
            <div class="authorAndDate">
                <div class="commentAuthor">
                    <?php print_r($author) ?>
                </div>
                <div class="commentDateAdded">
                    Dodano: <?php print_r($result['dateAdded']) ?>
                </div>
            </div>
            <?php if (isset($_SESSION['userID'])) { ?>


                <div class="comment-actions">
                    <span class="like-count">Liczba lajków: <?php echo $result['upvotes']; ?></span>
                    <form action="/BronzeAgeWebpage/php/includes/commentLike.inc.php" method="POST">
                        <input type="hidden" id="commentID" name="commentID" value="<?php echo $result["commentID"]; ?>">
                        <input type="hidden" id="prevPage" name="prevPage" value="<?php echo $_SERVER['PHP_SELF']; ?>">

                        <button type="submit" class="like-button">Polub</button>
                    </form>
                </div>
                <?php
            } ?>
        </div>
        <div class="commentContent">
            <p><?php echo ($result)['content'] ?></p>
        </div>
    </div>
    <?php
}
function printAllComments(object $pdo, string $articleID): void
{
    $IDs = getAllComments($pdo, (string) $articleID);

    foreach ($IDs as $id) {
        $currentID = (string) $id;
        printComment($pdo, $currentID);
    }
}
function addComment(object $pdo)
{
    ?>
    <div class="addComment">

        <form action="/BronzeAgeWebpage/php/includes/commentSubmit.inc.php" method="post">
            <label for="comment-input">Treść komentarza:</label><br />
            <input type="text" id="comment-input" name="comment-input" placeholder="Dodaj komentarz.."
                required /><br /><br />
            <input type="hidden" id="prevPage" name="prevPage" value="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" id="currentArticleID" name="currentArticleID"
                value="<?php echo $_SESSION["currentArticleID"]; ?>">
            <input type="submit" value="Dodaj komentarz" />
        </form>

    </div>

    <?php
}
