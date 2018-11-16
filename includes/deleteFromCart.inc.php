<?php
require_once ("dbh.inc.php");

if(isset($_POST['submit'])){
    $conn->query("delete from shopping_cart where product_id={$_POST['itemid']};");
}