<?php
include_once "dbh.inc.php";
session_start();
if (!isset($_POST['submit'])) {
    header('Location: ../gallery.php');
} else {
    $galleryID = htmlentities($_POST['imageid']);

    if(empty($galleryID)){
        header("Location: ../gallery.php");
    } else {
        $conn->query("UPDATE `gallery` SET `verified` = 1 WHERE `id` = '$galleryID';");
        header("Location: ../gallery.php");
    }
}