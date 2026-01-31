<?php
session_start();
ob_start();

include '../config/database.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Approve the comment
    if ($id) {
        $query = "UPDATE comments SET approved=true WHERE id=$id";
        $result = mysqli_query($connection, $query);

        if ($result) {
            $_SESSION['approve-comment-success'] = "Comment approved successfully.";
        } else {
            $_SESSION['approve-comment-error'] = "Failed to approve comment.";
        }
    }
}

header('Location: ' . ROOT_URL . 'admin/manage-comments.php');
exit();
?>
