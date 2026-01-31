<?php
session_start();

define("ROOT_URL", "http://localhost/blogwebsite/");
define('DB_HOST', 'localhost');
define('DB_USER', 'elzharaawy');
define('DB_PASS', 'NAAMegah123');
define('DB_NAME', 'blogdatabase');


if (!isset($_SESSION['user-id'])) {
    header("location: " . ROOT_URL . "logout.php");
    //destroy all sessions and redirect user to login page
    session_destroy();
    die();
    header("location: " . ROOT_URL . "signin.php");
}
