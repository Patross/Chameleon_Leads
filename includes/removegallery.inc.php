<?php
include_once "dbh.inc.php";
session_start();
if (!isset($_POST['submit'])) {
    header('Location: ../gallery.php');
} else {
    $image = htmlentities($_POST['imageid']);  
    if(empty($image)){
        header("Location: ../gallery.php");
    } else {


        $conn->query("DELETE FROM `gallery` WHERE `id` = $image");

        $file_pattern = "../img/gallery/{$image}.*" // Assuming your files are named like profiles/bb-x62.foo, profiles/bb-x62.bar, etc.
        array_map( "unlink", glob( $file_pattern ) );
        header("Location: ../gallery.php");
    }
}
