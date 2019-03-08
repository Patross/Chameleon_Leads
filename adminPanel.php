
<?php
    require_once("includes/header.php");
   
    if(isset($_SESSION["u_email"]) && $_SESSION["u_email"] != "admin@admin.admin"||!isset($_SESSION["u_email"])){
        header("Location: login.php");
    };


?>
<main>
    <form id="formAdminProduct" action="includes/adminPanel.inc.php" method="POST" enctype="multipart/form-data">
        <input id="formAdminName" type="text" name="ItemName" placeholder="Item Name"/>
        <input id="formAdminDesc" type="text" name="Description" placeholder="Description"/> 
        <input id="formAdminPrice" type="number" name="price" placeholder="price"/>
        <input id="formAdminImage" type="file" name="Image" multiple/>
        <input id="formAdminSub" type="submit" name="submit"/>
    </form>
</main>
<?php
    require_once("includes/footer.php")
?>