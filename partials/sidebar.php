<!-- Sidebar with Recent Posts -->
<?php 
include 'partials/header.php';
?>
<aside class="sidebar">
            <h3>Recent Posts</h3>
            <ul>
                <?php while ($recent_post = mysqli_fetch_assoc($recent_posts_result)): ?>
                <li>
                    <a href="post.php?id=<?= $recent_post['id'] ?>"><?= $recent_post['title'] ?></a>
                    <small><?= date("M d, Y", strtotime($recent_post['date_time'])) ?></small>
                </li>
                <?php endwhile; ?>
          </ul>
</aside>

<title><?= $page_title ?? 'Techshiil Best Blogging site' ?></title>
    <meta name="description" content="<?= $meta_description ?? 'this is the best website ever' ?>">
    <meta name="keywords" content="<?= $meta_keywords ?? 'code, html ,css, Techshiil' ?>">

    <?php
define("ROOT_URL", "http://localhost/blogside/");
define('DB_HOST', 'localhost');
define('DB_USER', 'elzharaawy');
define('DB_PASS', 'NAAMegah123');
define('DB_NAME', 'hobaal');



session_start();

?>