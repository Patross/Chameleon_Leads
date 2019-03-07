<?php
include_once "dbh.inc.php";
session_start();
if (!isset($_POST['submit'])) {
    header('Location: ../qna.php');
} else {
    $question = htmlentities($_POST['question']);  
    if(empty($question)){
        header("Location: ../qna.php");
    } else {
        $conn->query("DELETE FROM `qa` WHERE `question` = '$question'");
        header("Location: ../qna.php");
    }
}
