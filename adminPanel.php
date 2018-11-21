
<?php
    require_once("includes/header.php");
    if(isset($_SESSION["u_email"])&&$_SESSION != "admin@admin.admin"||!isset($_SESSION["u_email"])){
        header("Location: login.php");
    };
?>
<main>
</main>
<?php    
    require_once("includes/footer.php")
?>
