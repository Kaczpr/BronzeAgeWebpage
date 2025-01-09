<head>
    <link rel="stylesheet" href="../../css/commentStyle.css" />
    <?php
    $articleID = 1;
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    require_once("includes/dbh.inc.php");
    require_once("includes/commentsModel.inc.php");
    require_once("includes/commentsView.inc.php");

    $result = [];
    $result = getComment($pdo, 1);
    $author = getCommentAuthor($pdo, 1);
} catch (PDOException $e) {
    die("Test nieudany" . $e->getMessage());
}

?>
<div class="commentSection">
    <?php
    printAllComments($pdo, $articleID);
    ?>
    
</div>