<?php
include_once "dbh.inc.php";
session_start();
if (!isset($_POST['submit'])) {
    header('Location: ../contact.php');
} else {
    $question = htmlentities($_POST['question']);  
    if(empty($question)){
        header("Location: ../contact.php");
    } else {
        $conn->query("DELETE FROM `qa` WHERE `question` = '$question'");
        header("Location: ../contact.php");
    }
}
