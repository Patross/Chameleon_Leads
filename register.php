<?php
    require_once("includes/header.php");
    isset($_SESSION['u_id'])?header('Location: '.basename($_SESSION["lastpage"])):null;

        if(isset($_GET['register'])){
            if($_GET['register'] == "success"){
                header("Location: index.php");
            }
        }
    require_once("includes/header.php");
?>

    <main>
        <form id="loginForm" action="includes/register.inc.php" method="POST">

            <input id="forename" class="formItem" type="text" name="firstname" placeholder="First name">
            <input id="surname" class="formItem" type="text" name="lastname" placeholder="Last name">
            <input id="emailForm" class="formItem" type="text" name="email" placeholder="Email">
            <input id="passForm" class="formItem" type="password" name="password" placeholder="Password">
            <input id="passForm" class="formItem" type="password" name="confirmPassword" placeholder="Confirm Password">

            <!--<div class="g-recaptcha" data-sitekey="6LelckQUAAAAAOEkeZHXgD2Gb_LSAHDpMbS3s1Qf"></div>-->
            <button type="submit" name="submit"  id="bt">submit</button>
        </form>
        <?php
            if(isset($_GET['register'])){
                if($_GET['register'] == "empty"){
                    echo "Make sure all the fields are filled out correctly.";
                }else if($_GET['register'] == "invalidchar"){
                    echo "Please check you have entered your name correctly.";
                }else if($_GET['register'] == "taken"){
                    echo "The email address is already being used.";
                }else if($_GET['register'] == "password"){
                    echo "The passwords don't match, please check they are spelt correctly.";
                }else if($_GET['register'] == "email"){
                    echo "Please check if your email formatting is correct.";
                }
            }
        ?>
    </main>

<?php
    require_once("includes/footer.php");
?>
