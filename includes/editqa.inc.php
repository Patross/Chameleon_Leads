<?php
include_once "dbh.inc.php";
session_start();
if (!isset($_POST['submit'])) {
    header('Location: ../qna.php');
} else {
    $question = htmlentities($_POST['question']);
    $answer = htmlentities($_POST['answer']);  
    if(empty($answer)){
        header("Location: ../qna.php");
    } else {
        $conn->query("UPDATE `qa` SET `answer` = '$answer' WHERE `question` = '$question';");
        header("Location: ../qna.php");
    }
}