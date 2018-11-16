<?php
require_once ("dbh.inc.php");
session_start();

if(!isset($_SESSION['u_id'])) header("Location: ../".$_SESSION["lastpage"]);

if(isset($_POST["submit"])){
    if(isset($_POST["itemid"])){
        ///
        ///CHECK IF THE ITEM IS ALREADY IN THE SHOPPING CART, IF SO, INCREASE THE AMOUNT BY 1.
        ///



        ///
        ///ITEM DOESNT EXIST IN THE SHOPPING CART YET 
        ///
        $conn->query('insert into shopping_cart(product_id,user_id,amount) values('.$_POST["itemid"].','.$_SESSION["u_id"].',1);');
        header("Location: ../".$_SESSION["lastpage"]."?added=true&itemid=".$_POST['itemid']);
    }
}