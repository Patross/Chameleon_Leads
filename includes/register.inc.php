<?php
include_once "dbh.inc.php";
session_start();
if (isset($_POST['submit'])) {
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $confirmPassword = htmlspecialchars($_POST['confirmPassword']);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    if (empty($firstname || empty($lastname) || empty($email) || empty($password) || empty($confirmPassword))) {
        header("Location: ../register.php?register=empty");
    } else {
        //Everything filled out.
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          //Email is valid too.
            $email = strtolower($email);
            if ($password == $confirmPassword) {
                //Passwords Match.
                if (1 === preg_match('~[0-9]~', $firstname) || 1===preg_match('~[0-9]~', $lastname)) {
                    header("Location: ../register.php?register=invalidchar");
                } else {
                    //HASH PASSWORD
                    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
                    //CHECK IF USERNAME EXISTS ALREADY
                    $query = $conn->query("SELECT * FROM users WHERE email='$email';");
                    // $query = $conn->query("SELECT * FROM onlinebookfinder.users WHERE username='$username' OR email='$email';");
                    if ($query->rowCount() == 1) {
                        header("Location: ../register.php?register=taken");
                    } else {
                        $query = $conn->query("INSERT INTO users(first_name,last_name,email,password) VALUES('$firstname','$lastname','$email','$passwordHashed');");
                        // $query = $conn->query("INSERT INTO onlinebookfinder.users(firstname,lastname,username,email,password) VALUES('$firstname','$lastname','$username','$email','$passwordHashed');");
                    
                        //Login the user
                        $query = $conn->query("SELECT * FROM users WHERE email='$email';");
                        // $query = $conn->query("SELECT * FROM onlinebookfinder.users WHERE username='$username' OR email='$username';");
                        $result = $query->fetch(PDO::FETCH_ASSOC);
                        $_SESSION['u_id'] = $result['id'];
                        $_SESSION['u_first'] = $result['first_name'];
                        $_SESSION['u_last'] = $result['last_name'];
                        $_SESSION['u_email'] = $result['email'];

                        header("Location: ../register.php?register=success");
                    }
                }
            } else {
                header("Location: ../register.php?register=password");
            }
        } else {
            header("Location: ../register.php?register=email");
        }
    }
} else {
    header("Location: ../register.php");
}
