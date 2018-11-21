<?php
require_once ("dbh.inc.php");
session_start();

if(isset($_POST['submit'])){
    
    $query = $conn->query("SELECT * FROM shopping_cart WHERE product_id='{$_POST['itemid']}' AND user_id='{$_SESSION['u_id']}' AND amount=0;");
    $count = $query->rowCount(); //gets count

    if($count<=1){
        $conn->query("DELETE from shopping_cart WHERE product_id='{$_POST['itemid']}' AND user_id={$_SESSION['u_id']} AND amount=1;");
    }else{

        $query = $conn->query("UPDATE shopping_cart SET `amount`=(`amount`-1) WHERE `user_id` = {$_SESSION['u_id']} AND product_id ={$_POST['itemid']};"); 
    }

    
    
    header("Location: ../".$_SESSION["lastpage"]);

}