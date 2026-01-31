<?php
// Include the database configuration file
session_start(); // Start the session
include_once 'config/database.php';

// Check if the post ID is set in the URL
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Fetch post meta information based on the post ID
    $meta_posts = "SELECT id, meta_title, meta_description, meta_keywords FROM posts WHERE id='$id' LIMIT 1";
    $meta_posts_run = mysqli_query($connection, $meta_posts);

    if (mysqli_num_rows($meta_posts_run) > 0) {
        $metaPostItem = mysqli_fetch_assoc($meta_posts_run);

        $page_title = $metaPostItem['meta_title'];
        $meta_description = $metaPostItem['meta_description'];
        $meta_keywords = $metaPostItem['meta_keywords'];
    } else {
        $page_title = "Post Page";
        $meta_description = "Techshiil post blog page Now.";
        $meta_keywords = "PHP, CSS, HTML, JS, Techshiil, Tech SHiil";
    }
} else {
    $page_title = "Post Page";
    $meta_description = "Techshiil post blog page Now.";
    $meta_keywords = "PHP, CSS, HTML, JS, Techshiil, Tech SHiil";
}

include 'partials/header.php';

// Fetch post details
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);
    $author_id = $post['author_id'];
    $author_query = "SELECT * FROM users WHERE id=$author_id";
    $author_result = mysqli_query($connection, $author_query);
    $author = mysqli_fetch_assoc($author_result);
} else {
    header('location: ' . ROOT_URL . 'blog.php');
    die();
}

// Display the alert message if the session variable is set
if (isset($_SESSION['comment_status'])) {
    echo '<div class="alert__message success container">' . $_SESSION['comment_status'] . '</div>';
    unset($_SESSION['comment_status']);
}

// Fetch recent posts
$recent_posts_query = "SELECT id, title, date_time FROM posts ORDER BY date_time DESC LIMIT 5";
$recent_posts_result = mysqli_query($connection, $recent_posts_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($meta_description); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($meta_keywords); ?>">
    <!-- Other meta tags and stylesheets -->
</head>
<body>
<section class="singlepost">
    <div class="container singlepost__container">
        <div class="singlepost__main">
            <h2><?= htmlspecialchars($post['title']) ?></h2>
            <div class="post__author">
                <div class="post__author-avatar">
                    <img src="./images/<?= htmlspecialchars($author['avatar']) ?>">
                </div>
                <div class="post__author-info">
                    <h5>By: <?= htmlspecialchars("{$author['firstname']} {$author['lastname']}") ?></h5>
                    <small><?= date("M d, Y - H:i", strtotime($post['date_time'])) ?></small>
                </div>
            </div>
            <div class="singlepost__thumbnail">
                <img src="./images/<?= htmlspecialchars($post['thumbnail']) ?>">
            </div>
            <p><?= substr(html_entity_decode($post['body']), 0, 100000000000000000) ?></p>

            <!-- Share Icons Here -->
            <?php 
            $post_url = ROOT_URL . "post.php?id=" . $post['id']; 
            $post_title = $post['title'];
            ?>
            <div class="singlepost__share">
                <h3>Share this post</h3>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($post_url) ?>" target="_blank" class="share-icon">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://twitter.com/intent/tweet?url=<?= urlencode($post_url) ?>&text=<?= urlencode($post_title) ?>" target="_blank" class="share-icon">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= urlencode($post_url) ?>&title=<?= urlencode($post_title) ?>" target="_blank" class="share-icon">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="https://telegram.me/share/url?url=<?= urlencode($post_url) ?>&text=<?= urlencode($post_title) ?>" target="_blank" class="share-icon">
                    <i class="fab fa-telegram-plane"></i>
                </a>
                <a href="https://api.whatsapp.com/send?text=<?= urlencode($post_title . " " . $post_url) ?>" target="_blank" class="share-icon">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="#" class="share-icon" onclick="copyToClipboard(event, '<?= $post_url ?>')" id="copy-link">
                    <i class="fas fa-link"></i>
                    <span class="tooltip">Copy Link</span>
                </a>
            </div>
</section>
</div>
            <!-- Comment Form -->
<?php if (!isset($_SESSION['comment_status'])): ?>
<div class="container form__section-container" id="comments-section">
    <h3>Leave a Comment</h3>
    <form action="add_comment.php" method="POST">
        <input type="hidden" name="post_id" value="<?= htmlspecialchars($post['id']) ?>">
        <input type="text" name="author" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="body" rows="5" placeholder="Your Comment" required></textarea>
        <button type="submit" class="btn">Submit Comment</button>
    </form>
</div>
<?php endif; ?>

<?php
$comment_query = "SELECT * FROM comments WHERE post_id={$post['id']} AND approved=true ORDER BY date_time DESC";
$comment_result = mysqli_query($connection, $comment_query);
?>
<?php if (mysqli_num_rows($comment_result) > 0): ?>
    <div class="container comments__section-container">
        <h3>Comments</h3>
        <?php while ($comment = mysqli_fetch_assoc($comment_result)): ?>
            <div class="comment">
                <h5><?= htmlspecialchars($comment['author']) ?></h5>
                <small><?= date("M d, Y - H:i", strtotime($comment['date_time'])) ?></small>
                <p><?= htmlspecialchars($comment['body']) ?></p>
            </div>
        <?php endwhile; ?>
    </div>
<?php else: ?>
    <div class="container comments__section-container">
        <h3>No comments yet. Be the first to comment!</h3>
    </div>
<?php endif; ?>
    </div>
</section>
</body>
</html>
<?php include 'partials/footer.php'; ?>
