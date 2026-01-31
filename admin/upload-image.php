<?php
$target_dir = "uploads/post-images/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0755, true); // Create directory if not exists
}

$filename = basename($_FILES["file"]["name"]);
$target_file = $target_dir . time() . "_" . $filename;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if it's an actual image
$check = getimagesize($_FILES["file"]["tmp_name"]);
if ($check === false) {
    http_response_code(400);
    echo "File is not a valid image.";
    exit;
}

// File size limit (optional)
if ($_FILES["file"]["size"] > 5 * 1024 * 1024) { // 5MB
    http_response_code(400);
    echo "Sorry, your file is too large.";
    exit;
}

// Allow specific image formats
$allowed = ["jpg", "jpeg", "png", "gif", "webp"];
if (!in_array($imageFileType, $allowed)) {
    http_response_code(400);
    echo "Only JPG, JPEG, PNG, GIF & WEBP files are allowed.";
    exit;
}

// Try to move uploaded file
if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    echo "/" . $target_file; // Return relative URL (important!)
} else {
    http_response_code(500);
    echo "There was an error uploading your file.";
}
?>
