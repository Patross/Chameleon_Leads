<?php
    require_once("includes/header.php");
?>
<main>
<?php
    if(!empty($_SESSION['u_email'])&&$_SESSION['u_email']=="admin@admin.admin"){
        $sql = $conn->query("select * from gallery");
        foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $row){
            echo'<img src="'.$row['image_path'].'" alt="GalleryImage">';
        }
    }
?>
    <form action="includes/gallery.inc.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="Image">
        <input type="text" name="caption" placeholder="Caption">
        <input type="submit" name="submit" value="Add Image">
    </form>
</main>
<?php    
    require_once("includes/footer.php");
?>
