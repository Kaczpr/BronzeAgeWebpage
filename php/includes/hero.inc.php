<section class="hero">
    <section class="heroImage">
        <img src="../images/map.png" alt="heroImage" />
    </section>
    <section class="heroText">
        <?php
        if (isset($_SESSION['userID'])) {
            echo "<h1>Witaj, " . htmlspecialchars($_SESSION['userName']) . "!</h1>";
        } else {
            echo "<h1>Witaj!</h1>";
        }
        ?>
        <p>Poznaj historię starożytnego bliskiego wschodu.</p>
    </section>
</section>
