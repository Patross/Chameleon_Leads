<?php
require_once ("dbh.inc.php");
session_start();

if(isset($_POST['submit'])){
    
    $query = $conn->query("SELECT * FROM shopping_cart WHERE product_id='{$_POST['itemid']}' AND user_id='{$_SESSION['u_id']}';");
    $count = $query->rowCount(); //gets count

    if($count >1){
        $query = $conn->query("UPDATE shopping_cart set amount = amount - 1 where  product_id='{$_POST['itemid']}' AND user_id='{$_SESSION['u_id']}'");
        // die();
    }
    else if ($count == 1){
        $query = $conn->query("DELETE FROM shopping_cart WHERE product_id='{$_POST['itemid']}' AND user_id='{$_SESSION['u_id']}' AND amount=1");
    }

    
    
    header("Location: ../".$_SESSION["lastpage"]);

}