<?php
require_once ("dbh.inc.php");
session_start();

if(isset($_POST['submit'])){

    $query = $conn->query("SELECT * FROM shopping_cart WHERE product_id='{$_POST['itemid']}' AND user_id='{$_SESSION['u_id']}';");

    $result = $query->fetch(PDO::FETCH_ASSOC);
    if($result["amount"] > 1){
        $query = $conn->query("UPDATE shopping_cart SET `amount`=(`amount`-1) WHERE `user_id` = {$_SESSION['u_id']} AND product_id ={$_POST['itemid']};"); 
    }else{
        $conn->query("DELETE from shopping_cart WHERE product_id='{$_POST['itemid']}' AND user_id={$_SESSION['u_id']} AND amount=1;");
        echo'<script type="text/javascript" href=../javascript/js.js>
            ShopToggle();
            </script>';
        header("Location: ../".$_SESSION["lastpage"]);
    }
}