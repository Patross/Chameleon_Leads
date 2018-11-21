<?php
    isset($_SESSION['u_id'])?header('Location: '.basename($_SESSION["lastpage"])):null;
    require_once("includes/header.php");

        if(isset($_GET['login'])){
            if($_GET['login'] == "success"){
                header("Location: index.php");
            }
        }
?>

    <main>
        <form action="includes/login.inc.php" method="POST">

            <input type="email" name="email"  placeholder="email"></br></br>
            <input type="password" name="password" placeholder="password"></br></br>
            <a href="register.php">Create an Account</a>
            <button type="submit" name="submit" >submit</button>

        </form>
        <?php
        if(isset($_GET['login'])){
            if($_GET['login'] == "nomatch"){
                echo "Username or password is incorrect.";
            }
        }
        ?>
    </main>

<?php
    require_once("includes/footer.php");
?>