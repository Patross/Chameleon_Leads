<?php
    require_once("includes/header.php");
?>
<main>
<?php
    if(!empty($_SESSION['u_email'])&&$_SESSION['u_email']=="admin@admin.admin"){
        $sql = $conn->query("select * from gallery");
        foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $row){
            if($row["verified"]==0){
                echo'
                <img src="'.$row['image_path'].'" alt="GalleryImage" class="imgGallery">
                <form action="includes/removegallery.inc.php" method="POST">
                    <input type="text" name="imageid" hidden=hidden value="'.$row['id'].'"/>
                    <input type="submit" name="submit" value="Remove Image"/>
                </form>
                <form action="includes/verifyGallery.inc.php" method="POST">
                    <input type="text" name="imageid" hidden=hidden value="'.$row['id'].'"></input>
                    <input type="submit" name="submit" value="Verify Image"></input>
                </form>';
            }
            else{
                echo'
                <img src="'.$row['image_path'].'" alt="GalleryImage" class="imgGallery">
                <form action="includes/removegallery.inc.php" method="POST">
                    <input type="text" name="imageid" hidden=hidden value="'.$row['id'].'"/>
                    <input type="submit" name="submit" value="Remove Image"/>
                </form>';
            }
        }
    }
    else{
        $sql = $conn->query("select * from gallery");
        foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $row){
            if($row["verified"]==1){
                echo'
                <img src="'.$row['image_path'].'" alt="GalleryImage" class="imgGallery">';
            }
        }
    }
?>
    <form id="formGallery" action="includes/gallery.inc.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="Image" multiple>
        <input type="text" name="caption" placeholder="Caption">
        <input type="submit" name="submit" value="Add Image">
    </form>
</main>
<?php    
    require_once("includes/footer.php");
?>
