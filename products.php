<?php 
    require_once("includes/header.php")
?>
<main>
    <!--<section class="product">
        <article class="img-container">
            <img class="product-img" src="https://via.placeholder.com/1080" alt="lead image">
            <p class="product-img">Some text (image)</p> -->
       <!-- </article>
        <article class="product-container">
            <h3 class="product-name">Lead number 1</h3>
            <p class=" product-description">This is a very nice description of the product.This is a very nice description of the product.
                <br><br>
                This is a very nice description of the product.This is a very nice description of the product.</p>
        </article>
    </section>-->

    <?php
        $sql = $conn->query("select * from products");
        //DISPLAY ALL LEADS
        foreach ($sql->fetchAll(PDO::FETCH_ASSOC) as $row) {
            echo '
                <section class="product">
                    <article class="img-container">
                        <img class="product-img" src="https://via.placeholder.com/1080" alt="lead image">
                    </article>
                    <article class="product-container">
                        <h3 class="product-name">'.$row["name"].'</h3>
                        <p class=" product-description">'.$row["description"].'</p>
                            <form action="includes/addToCart.inc.php" method="POST">
                                <button name="submit" class="AddToCart">Add to cart</button>
                                <input type="text" name="itemid" value="'.$row["id"].'" hidden=hidden />
                            </form>';
                            if(isset($_GET["added"])&&$_GET["added"]=="true"&&$row['id']==$_GET['itemid']){
                                echo "<span class=\"added\">item added to cart</span>";
                            }
                    echo '</article>
                </section>';
        }
    ?>
</main>
<?php 
    require_once("includes/footer.php")
?>
