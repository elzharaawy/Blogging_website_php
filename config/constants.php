<?php

// Check if constants are already defined before defining them
if (!defined('ROOT_URL')) {
    define('ROOT_URL', 'http://localhost/blogwebsite/');
}

if (!defined('DB_HOST')) {
    define('DB_HOST', 'localhost');
}

if (!defined('DB_USER')) {
    define('DB_USER', 'your_database_username');
}

if (!defined('DB_PASS')) {
    define('DB_PASS', 'your_database_password');
}

if (!defined('DB_NAME')) {
    define('DB_NAME', 'your_database_name');
}
