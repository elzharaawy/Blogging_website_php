<?php
session_start();
ob_start();

include '../config/database.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Only allow deletion if ID is valid
    if ($id) {
        $query = "DELETE FROM comments WHERE id=$id";
        $result = mysqli_query($connection, $query);

        if ($result) {
            $_SESSION['delete-comment-success'] = "Comment deleted successfully.";
        } else {
            $_SESSION['delete-comment-error'] = "Failed to delete comment.";
        }
    }
}

header('Location: ' . ROOT_URL . 'admin/manage-comments.php');
exit();
?>
