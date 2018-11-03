<?php
    require_once("includes/header.php");
?>

    <main>
        <form action="includes/login.inc.php" method="POST">

            <input type="email" name="email"  placeholder="email"></br></br>
            <input type="password" name="password" placeholder="password"></br></br>
            <button type="submit" name="submit" >submit</button>

        </form>
    </main>

<?php
    require_once("includes/footer.php");
?>