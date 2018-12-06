<?php
require_once ("dbh.inc.php");
session_start();

if(isset($_POST['submit'])){
<<<<<<< HEAD

    $query = $conn->query("SELECT * FROM shopping_cart WHERE product_id='{$_POST['itemid']}' AND user_id='{$_SESSION['u_id']}';");

    $result = $query->fetch(PDO::FETCH_ASSOC);
    if($result["amount"] > 1){
        $query = $conn->query("UPDATE shopping_cart SET `amount`=(`amount`-1) WHERE `user_id` = {$_SESSION['u_id']} AND product_id ={$_POST['itemid']};"); 
    }else{
        $conn->query("DELETE from shopping_cart WHERE product_id='{$_POST['itemid']}' AND user_id={$_SESSION['u_id']} AND amount=1;");
=======
    
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
>>>>>>> 896ffeb91caa9e5155a9a168ce378002f1af8904

        header("Location: ../".$_SESSION["lastpage"]);
    }
}