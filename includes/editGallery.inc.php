<?php
include_once "dbh.inc.php";
session_start();
if (!isset($_POST['submit'])) {
    header('Location: ../gallery.php');
} else {
    $galleryID = htmlentities($_POST['imageid']);
    $galleryCaption = htmlentities($_POST['caption']);

    if(empty($galleryID)){
        header("Location: ../gallery.php");
    } else {
        $conn->query("UPDATE `gallery` SET `caption` = '$galleryCaption' WHERE `id` = $galleryID;");
        header("Location: ../gallery.php");
    }
}