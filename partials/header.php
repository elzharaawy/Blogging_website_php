<?php
require 'config/database.php';

if (isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM users WHERE id='$id'";
    $result = mysqli_query($connection, $query);
    $avatar = mysqli_fetch_assoc($result);
}

// Default values
$page_title = isset($page_title) ? $page_title : 'Techshiil Best blogging Site';
$meta_description = isset($meta_description) ? $meta_description : 'Learn more about our company, our mission, and the dedicated team behind our success.';
$meta_keywords = isset($meta_keywords) ? $meta_keywords : 'default, keywords, for, SEO';
?>

<!DOCTYPE HTML>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="max-age=3600">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CUSTOM SEO CODE -->
    <?php
    // Default meta keywords
        $default_meta_keywords = "default, keywords, for, SEO";

        // Check if $meta_keywords is set and not empty, otherwise use default value
        $meta_keywords = isset($meta_keywords) && !empty($meta_keywords) ? $meta_keywords : $default_meta_keywords;
        ?>
    <title><?php echo $page_title; ?></title>
    <meta name="description" content="<?php echo $meta_description; ?>">
    <meta name="keywords" content="<?php echo $meta_keywords; ?>">

    <!-- CUSTOM STYLESHEET -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">

    <!-- ICONSCOUT CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <!-- GOOGLE FONT(MONTSERATE) -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,800;1,700&display=swap" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<!-- Favicon code here  -->
<link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">

    <!-- Summernote CSS - CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- //Summernote CSS - CDN Link -->

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5475389034965355"
     crossorigin="anonymous"></script>


    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>

    <!--home page -->
      <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./css/home.css">

<!-- 
  - google font link
-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
  href="https://fonts.googleapis.com/css2?family=Cuprum:wght@500;600;700&family=Poppins:wght@400;500;600&display=swap"
  rel="stylesheet">



</head> 
<body>

    <nav>
        <div class="container nav__container">
            <a href="<?= ROOT_URL ?>" class="nav__logo">blogwebsite</a>
            <ul class="nav__items">
                <li><a href="<?= ROOT_URL ?>blog">Blog</a></li>
                <li><a href="<?= ROOT_URL ?>code-editor">code</a></li>
                <li><a href="<?= ROOT_URL ?>about">About</a></li>
                <li><a href="<?= ROOT_URL ?>services">Services</a></li>
                <li><a href="<?= ROOT_URL ?>contact">Contact</a></li>
                <?php if(isset($_SESSION['user-id'])) : ?>
                
                <li class="nav__profile">
                    <div class="avatar">
                        <img src="<?= ROOT_URL . 'images/' . $avatar['avatar'] ?>">
                    </div>
                    <ul>
                        <li><a href="<?= ROOT_URL ?>admin/index.php">Dashboard</a></li>
                        <li><a href="<?= ROOT_URL ?>logout.php">Logout</a></li>
                    </ul>
                </li>
                <?php else : ?>
                    <li><a href="<?= ROOT_URL ?>signin.php">SignIn</a></li>
                <?php endif ?>
            </ul>
            
            <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
            <button id="close__nav-btn"><i class="uil uil-multiply"></i></button>
            <!-- Add this inside your nav container, after the existing buttons -->
            <button id="theme-toggle" class="btn2"><i class="uil uil-moon"></i></button>
        </div>
    </nav>
    <!-- ======================== END OF NAV ======================== -->
