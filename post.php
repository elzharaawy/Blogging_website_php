<?php
session_start(); // Start the session
include_once 'config/database.php';

// Check if the slug is set in the URL
if (isset($_GET['slug'])) {
    $slug = filter_var($_GET['slug'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    // Fetch post meta information based on the post slug
    $meta_posts = "SELECT id, meta_title, meta_description, meta_keywords FROM posts WHERE slug='$slug' LIMIT 1";
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
if (isset($_GET['slug'])) {
    $slug = filter_var($_GET['slug'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $query = "SELECT * FROM posts WHERE slug='$slug'";
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
$recent_posts_query = "SELECT id, title, slug, date_time FROM posts ORDER BY date_time DESC LIMIT 5";
$recent_posts_result = mysqli_query($connection, $recent_posts_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="<?= ROOT_URL ?>css/blogpost.css">
</head> 

<div class="main1">
  <div class="container5">
    <div class="blog">
      <h2 class="h2"><?= htmlspecialchars($post['title']) ?></h2>
      <div class="blog-read">
        <div class="blog-card-banner">
          <img src="./images/<?= htmlspecialchars($post['thumbnail']) ?>" alt="<?= htmlspecialchars($post['title']) ?>" width="250" class="blog-banner-img1">
        </div>
                    <!-- Extract headings from post content -->
                    <?php
            // Split the post content into sections based on heading tags
            $sections = preg_split('/<h[1-6]\b[^>]*>(.*?)<\/h[1-6]>/s', $post['body'], -1, PREG_SPLIT_DELIM_CAPTURE);

            // Initialize an array to store the headings
            $headings = [];

            // Loop through the sections and extract the headings
            for ($i = 1; $i < count($sections); $i += 2) {
              $heading_text = strip_tags($sections[$i]); // Remove any HTML tags from the heading
              $heading_slug = slugify($heading_text); // Generate a slug for the heading
              $headings[] = ['text' => $heading_text, 'slug' => $heading_slug];
            }
            ?>

            <!-- Generate table of contents -->
            <?php if (!empty($headings)) : ?>
              <div class="table-of-contents">
                <h4>Table of Contents</h4>
                <ul>
                  <?php foreach ($headings as $heading) : ?>
                    <li><a href="#<?= $heading['slug'] ?>"><?= $heading['text'] ?></a></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>


        <div class="blog-content-wrapper">
          <div class="wrapper-flex">
            <div class="profile-wrapper">
              <img src="./images/<?= htmlspecialchars($author['avatar']) ?>" alt="<?= htmlspecialchars("{$author['firstname']} {$author['lastname']}") ?>" width="50">
            </div>
            <div class="wrapper">
              <a href="#" class="h4"><?= htmlspecialchars("{$author['firstname']} {$author['lastname']}") ?></a>
              <p class="text-sm">
                <time datetime="<?= date('Y-m-d', strtotime($post['date_time'])) ?>"><?= date("M d, Y - H:i", strtotime($post['date_time'])) ?></time>
              </p>
            </div>
          </div>
          <p><?= html_entity_decode($post['body']) ?></p>
          <!-- Share Icons Here -->
          <?php 
          $post_url = ROOT_URL . "post.php?slug=" . $post['slug']; 
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
        </div>
      </div>

      <!-- Comment Form -->
      <?php if (!isset($_SESSION['comment_status'])): ?>
      <div class="container form__section-container" id="comments-section">
        <h3>Leave a Comment</h3>
        <form action="add_comment.php" method="POST">
      <input type="hidden" name="post_id" value="<?= htmlspecialchars($post['id']) ?>">
      <input type="hidden" name="slug" value="<?= htmlspecialchars($post['slug']) ?>">
      
      <input type="text" name="author" placeholder="Your Name" required>
      <input type="email" name="email" placeholder="Your Email" required>
      <textarea name="body" rows="5" placeholder="Your Comment" required></textarea>
      <button type="submit" class="btn">Submit Comment</button>
    </form>
      </div>
      <?php endif; ?>

      <!-- Comments Section -->
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
    <?php if (isset($_SESSION['comment_status'])): ?>
  <div class="alert success">
    <?= $_SESSION['comment_status']; unset($_SESSION['comment_status']); ?>
  </div>
<?php endif; ?>

    

    <!-- Aside Section -->
    <div class="aside">
      <div class="topics">
        <h2 class="h2">Topics</h2>
        <?php 
        $all_categories_query = "SELECT * FROM categories";
        $all_categories_result = mysqli_query($connection, $all_categories_query);
        ?>
        <?php while ($category = mysqli_fetch_assoc($all_categories_result)) : ?>
          <a href="<?=ROOT_URL?>category-posts.php?id=<?=$category['id']?>" class="topic-btn">
            <div class="icon-box">
              <ion-icon name="server-outline"></ion-icon>
            </div>
            <p><?=$category['title']?></p>
          </a>
        <?php endwhile; ?>
      </div>

      <div class="tags">
        <h2 class="h2">Tags</h2>
        <div class="wrapper">
          <!-- Example tags, replace with dynamic tags if needed -->
          <button class="hashtag">#mongodb</button>
          <button class="hashtag">#nodejs</button>
          <button class="hashtag">#a11y</button>
          <button class="hashtag">#mobility</button>
          <button class="hashtag">#inclusion</button>
          <button class="hashtag">#webperf</button>
          <button class="hashtag">#optimize</button>
          <button class="hashtag">#performance</button>
        </div>
      </div>

      <div class="contact">
        <h2 class="h2">Let's Talk</h2>
        <div class="wrapper">
          <p>Do you want to learn more about how I can help your company overcome problems? Let us have a conversation.</p>
          <ul class="social-link">
            <li><a href="#" class="icon-box discord"><ion-icon name="logo-discord"></ion-icon></a></li>
            <li><a href="#" class="icon-box twitter"><ion-icon name="logo-twitter"></ion-icon></a></li>
            <li><a href="#" class="icon-box facebook"><ion-icon name="logo-facebook"></ion-icon></a></li>
          </ul>
        </div>
      </div>

      <div class="newsletter">
        <h2 class="h2">Newsletter</h2>
        <div class="wrapper">
          <p>Subscribe to our newsletter to be among the first to keep up with the latest updates.</p>
          <form id="newsletter-form">
        <input type="email" name="EMAIL" class="required email" id="mce-EMAIL" required placeholder="Enter your email">
        <button type="submit" class="btn4 btn-primary">Subscribe</button>
    </form>
    <div id="alert-message" class="alert-message"></div>

    <script>
        document.getElementById('newsletter-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form from submitting the traditional way

            const formData = new FormData(this);
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'subscribe.php', true);

            xhr.onload = function () {
                const alertMessage = document.getElementById('alert-message');
                alertMessage.style.display = 'block';
                if (xhr.status >= 200 && xhr.status < 300) {
                    alertMessage.innerHTML = xhr.responseText;
                } else {
                    alertMessage.innerHTML = 'An error occurred. Please try again later.';
                }
            };

            xhr.send(formData);
        });
    </script>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ionicon link -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

<?php include './partials/footer.php'; ?>
