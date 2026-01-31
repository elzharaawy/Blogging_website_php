<?php
// Set default SEO variables
$page_title = "";
$meta_description = "";
$meta_keywords = "";

include "partials/header.php";
include "partials/scripts.php";

// Fetch categories from database
$query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $query);

// Get back form data if form was invalid
$title = $_SESSION['add-post-data']['title'] ?? null;
$body = $_SESSION['add-post-data']['body'] ?? null;
$meta_title = $_SESSION['add-post-data']['meta_title'] ?? null;
$meta_description = $_SESSION['add-post-data']['meta_description'] ?? null;
$meta_keywords = $_SESSION['add-post-data']['meta_keywords'] ?? null;
$slug = $_SESSION['add-post-data']['slug'] ?? null;
unset($_SESSION['add-post-data']);
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Add Post</h2>
        <?php if (isset($_SESSION['add-post'])) : ?>
            <div class="alert__message error">
                <p>
                    <?php
                    echo $_SESSION['add-post'];
                    unset($_SESSION['add-post']);
                    ?>
                </p>
            </div>
        <?php endif ?>
        <form action="<?= ROOT_URL ?>admin/add-post-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="title" value="<?= $title ?>" placeholder="Title">
            <input type="text" name="slug" value="<?= $slug ?>" placeholder="Slug">
            <select name="category_id">
                <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
                    <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                <?php endwhile ?>
            </select>
            <?php if (isset($_SESSION["user_is_admin"])) : ?>
                <div class="form__control inline">
                    <input type="checkbox" name="is_featured" value='1' id="is_featured" checked>
                    <label for="is_featured">Featured</label>
                </div>
            <?php endif ?>
            <textarea rows="18" name="body" placeholder="Body" id="summernote"><?= $body ?></textarea>
            
            <div class="form__control">
                <label for="thumbnail">Add Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>

            <!-- SEO Fields -->
            <input type="text" name="meta_title" value="<?= $meta_title ?>" placeholder="Meta Title">
            <input type="text" name="meta_description" value="<?= $meta_description ?>" placeholder="Meta Description">
            <input type="text" name="meta_keywords" value="<?= $meta_keywords ?>" placeholder="Meta Keywords">

            <button type="submit" name="submit" class="btn">Add Post</button>
        </form>
    </div>
    <script>
  $(document).ready(function() {
    $('#summernote').summernote({
      height: 300,
      callbacks: {
        onImageUpload: function(files) {
          for (let i = 0; i < files.length; i++) {
            uploadImage(files[i]);
          }
        }
      }
    });

    function uploadImage(file) {
      let data = new FormData();
      data.append("file", file); // Important: field name must be "file"

      $.ajax({
        url: "upload-image.php", // Your adjusted upload script
        method: "POST",
        data: data,
        contentType: false,
        processData: false,
        success: function(url) {
          $('#summernote').summernote('insertImage', url); // Insert image URL into editor
        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert("Image upload failed: " + jqXHR.responseText);
        }
      });
    }
  });
</script>

</section>

