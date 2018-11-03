<?php
include_once "dbh.inc.php";
session_start();
if (!isset($_POST['submit'])) {
    header('Location: ../login.php');
} else {
    $email = htmlentities($_POST['email']);
    $password = htmlentities($_POST['password']);
    //  $query = $conn->query("SELECT * FROM onlinebookfinder.users WHERE username='$email' OR email='$email';");
    $query = $conn->query("SELECT * FROM users WHERE email='$email';");
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if ($count = $query->rowCount() == 1) {
        if (password_verify($password, $result['password'])) {
            $_SESSION['u_id'] = $result['id'];
            $_SESSION['u_first'] = $result['first_name'];
            $_SESSION['u_last'] = $result['last_name'];
            $_SESSION['u_email'] = $result['email'];
            header('Location: ../login.php?login=success');
        } else {
            header('Location: ../login.php?login=nomatch');
        }
    } else {
        header('Location: ../login.php?login=nomatch');
    }
}
