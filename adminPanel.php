
<?php
    require_once("includes/header.php");
   
    if(isset($_SESSION["u_email"]) && $_SESSION["u_email"] != "admin@admin.admin"||!isset($_SESSION["u_email"])){
        header("Location: login.php");
    };


?>
<main>
    <form action="includes/adminPanel.inc.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="ItemName" placeholder="Item Name">
        <input type="text" name="Description" placeholder="Description"> 
        <input type="number" name="price" placeholder="price"/>
        <input type="file" name="Image" multiple>
        <input type="submit" name="submit">
    </form>
</main>
<?php
    require_once("includes/footer.php")
    
?>