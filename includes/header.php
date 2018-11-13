<?php
    require_once("dbh.inc.php");
    session_start();
    $_SESSION["lastpage"] = basename($_SERVER["PHP_SELF"]);
?>
<!DOCTYPE html>
<html>

<head>
    <link type="text/css" rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/styles.css" type="text/css">
    <link rel="stylesheet" href="styles/footer.css" type="text/css">
    
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- braintree -->
    <script src="https://js.braintreegateway.com/js/braintree-2.31.0.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav>
            <a href="index.php">Home</a>
            <a href="products.php">Products</a>
            <a href="contact.php">Contact Us</a>
            <?php if(!isset($_SESSION['u_id'])):?>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
            <?php endif; ?>
            <?php if (isset($_SESSION['u_id'])):?>
            <form action="includes/logout.inc.php" method="post">
                <button type="submit" name="submit">Logout</button>
            </form>
            <?php endif; ?>

            <i id="btnShop" class="fas fa-shopping-basket"></i>
        </nav>
        <div id="shopping" class="hidden">
            <h1>Shoppin Cart:</h1>
            <img class="shopImgs" src="https://via.placeholder.com/1080" alt="lead">
            <p>...Name...</p>
            <p>...Description...</p>
            <button class="shopRemove">X</button>
            <p class="shopPrice">Price = </p>
            <p>Total Price = </p>
            <a href="checkout.php">Check Out</a>
        </div>
    </header>
