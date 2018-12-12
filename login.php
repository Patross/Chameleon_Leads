<?php
    isset($_SESSION['u_id'])?header('Location: '.basename($_SESSION["lastpage"])):null;
    require_once("includes/header.php");

        if(isset($_GET['login'])){
            if($_GET['login'] == "success"){
                header("Location: index.php");
            }
        }
        if(isset($_SESSION['u_id'])){
          header("Location: index.php");
        }
?>

<main>
    <form id="loginForm" action="includes/login.inc.php" method="POST">

        <input class="formItem" id="emailForm" type="email" name="email" placeholder="Email">
        <input class="formItem" id="passForm" type="password" name="password" placeholder="Password">
        <a class="formItem" id="createAcc" href="register.php">Create an Account</a>
        <button class="formItem" id="submitForm" type="submit" name="submit">submit</button>

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
