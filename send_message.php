<?php
session_start(); // Start the session
if (isset($_POST['btn-send'])) {
    $UserName = $_POST['UName'];
    $Email = $_POST['Email'];
    $Subject = $_POST['Subject'];
    $Msg = $_POST['Msg'];

    if (empty($UserName) || empty($Email) || empty($Subject) || empty($Msg)) {
        header('location:contact.php?error');
    } else {
        $to = "elzharaawy@gmail.com";
        $headers = "From: " . $Email . "\r\n" .
                   "Reply-To: " . $Email . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();
        $message = "From: $UserName\n\n" . $Msg;
        if (mail($to, $Subject, $message, $headers)) {
            header('location:contact.php?success');
        } else {
            error_log("Mail failed to send to $to from $Email", 0);
            header('location:contact.php?error');
        }
    }
} else {
    header("location:contact.php");
}
?>
