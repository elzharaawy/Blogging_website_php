<?php 
session_start(); // Start the session

// SEO Variables
$page_title = "Blogs - Techshiil";
$meta_description = "Read our latest blog posts covering various topics, industry insights, and updates.";
$meta_keywords = "blogs, articles, industry insights, updates, news";

include 'partials/header.php';



// Fetch posts

$query = "SELECT * FROM posts ORDER BY date_time DESC";
$posts = mysqli_query($connection, $query);

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
    <!-- Blog Section -->
    <div class="blog">
      <h2 class="h2">Latest Blog Post</h2>
      <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
        <div class=" blog-card">
          <div class="blog-card-banner">
            <img src="./images/<?= $post['thumbnail'] ?>" alt="<?= $post['title'] ?>" width="250" class="blog-banner-img">
          </div>
          <div class="blog-content-wrapper">
            <?php
            // fetch category from categories using category_id
            $category_id = $post['category_id'];
            $category_query = "SELECT * FROM categories WHERE id=$category_id";
            $category_result = mysqli_query($connection, $category_query);
            $category = mysqli_fetch_assoc($category_result);
            ?>
            <button class="blog-topic text-tiny"><?= $category['title'] ?></button>
            <h3><a href="<?= ROOT_URL ?>post.php?slug=<?= $post['slug'] ?>" class="h3"><?= $post['title'] ?></a></h3>


            <p class="blog-text"><?= substr($post['body'], 0, 150) ?>...</p>
            <div class="wrapper-flex">
              <div class="profile-wrapper">
                <?php
                // Fetch author from users table using author id
                $author_id = $post['author_id'];
                $author_query = "SELECT * FROM users WHERE id=$author_id";
                $author_result = mysqli_query($connection, $author_query);
                $author = mysqli_fetch_assoc($author_result);
                ?>
                <img src="./images/<?= $author['avatar'] ?>" alt="<?= "{$author['firstname']} {$author['lastname']}" ?>" width="50">
              </div>
              <div class="wrapper">
                <a href="#" class="h4"><?= "{$author['firstname']} {$author['lastname']}" ?></a>
                <p class="text-sm">
                  <time datetime="<?= date('Y-m-d', strtotime($post['date_time'])) ?>"><?= date("M d, Y", strtotime($post['date_time'])) ?></time>
                  <span class="separator"></span>
                  <ion-icon name="time-outline"></ion-icon>
                  <time datetime="PT3M">6 min</time>
                </p>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
      <button class="btn4 load-more">Load More</button>
    </div>
    
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





