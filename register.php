<?php
    require_once("includes/header.php");
?>

    <main>
        <form id="register" action="includes/register.inc.php" method="POST">

            <input type="text" name="firstname" placeholder="first name"></br></br>
            <input type="text" name="lastname" placeholder="last name"></br></br>
            <input type="text" name="email" placeholder="email"></br></br>  
            <input type="password" name="password" placeholder="password"></br></br>
            <input type="password" name="confirmPassword" placeholder="confirm password"></br></br> 

            <!--<div class="g-recaptcha" data-sitekey="6LelckQUAAAAAOEkeZHXgD2Gb_LSAHDpMbS3s1Qf"></div>-->
            <button type="submit" name="submit"  id="bt">submit</button>
        </form>
    </main>

<?php
    require_once("includes/footer.php");
?>
