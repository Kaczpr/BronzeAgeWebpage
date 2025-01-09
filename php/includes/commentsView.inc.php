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
            <div class="votes">
                <div class="upvotes">
                    <i class="fa fa-thumbs-up" style="font-size:24px"></i> <?php print_r($result['upvotes']) ?>
                </div>
                <div class="downvotes">
                    <i class="fa fa-thumbs-down" style="font-size:24px"></i> <?php print_r($result['downvotes']) ?>

                </div>
            </div>
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
        $currentID = (string)$id;
        printComment($pdo, $currentID);
    }
}
