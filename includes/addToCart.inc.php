<?php
require_once ("dbh.inc.php");
session_start();

if(!isset($_SESSION['u_id'])) header("Location: ../".$_SESSION["lastpage"]);

if(isset($_POST["submit"])){
    if(isset($_POST["itemid"])){
        ///
        ///CHECK IF THE ITEM IS ALREADY IN THE SHOPPING CART, IF SO, INCREASE THE AMOUNT BY 1.
        ///
        
        $query = $conn->query("select * from shopping_cart where user_id={$_SESSION['u_id']} and product_id={$_POST['itemid']}");
        $count = $query->rowCount(); //gets count

        if($count>0){

            $newCount = $count;
            $newCount++;
    
            $query = $conn->query("UPDATE shopping_cart SET `amount`=(`amount`+1) WHERE `user_id` = '{$_SESSION['u_id']}' AND product_id ='{$_POST['itemid']}';");
        }else{
            ///
            ///ITEM DOESNT EXIST IN THE SHOPPING CART YET 
            ///
            $conn->query('insert into shopping_cart(product_id,user_id,amount) values('.$_POST["itemid"].','.$_SESSION["u_id"].',1);');
            header("Location: ../".$_SESSION["lastpage"]."?added=true&itemid=".$_POST['itemid']);
        }       
    }
}