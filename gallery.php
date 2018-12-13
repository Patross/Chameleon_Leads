<?php
    require_once("includes/header.php");
?>
<main>
    <form action="includes/gallery.inc.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="Image" multiple>
        <input type="text" name="caption" placeholder="Caption">
        <input type="submit" name="submit" value="Add Image">
    </form>
</main>
<?php    
    require_once("includes/footer.php");
?>
