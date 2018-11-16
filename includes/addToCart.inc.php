<?php
require_once ("dbh.inc.php");
session_start();

if(isset($_POST["submit"])){
    if(isset($_POST["itemid"])){
        
        $conn->query('insert into shopping_cart(product_id,user_id) values('.$_POST["itemid"].','.$_SESSION["u_id"].');');
    }
}