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
        $conn->query("INSERT INTO `chameleon`.`qa` (`id`, `question`, `answer`) VALUES (NULL, '$question', '');");
        header("Location: ../contact.php");
    }
}
