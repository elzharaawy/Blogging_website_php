    <?php
    ob_start();                // ✅ Output buffering MUST be first
    session_start();           // ✅ Session starts immediately after

    include_once 'config/database.php'; // ✅ Only includes with no output

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $post_id = filter_var($_POST['post_id'], FILTER_SANITIZE_NUMBER_INT);
        $author = filter_var($_POST['author'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $slug = filter_var($_POST['slug'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($post_id && $author && $email && $body && $slug) {
            $query = "INSERT INTO comments (post_id, author, email, body, approved) VALUES (?, ?, ?, ?, false)";
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, 'isss', $post_id, $author, $email, $body);

            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['comment_status'] = 'Your comment is awaiting approval';

                // ✅ Redirect before any output
                header('Location: post.php?slug=' . urlencode($slug));
                exit();
            } else {
                // Log error for development
                error_log('Comment Insertion Error: ' . mysqli_error($connection));
            }
        }
    }

    ob_end_flush(); // ✅ Close output buffer (no echo before this!)
    ?>
