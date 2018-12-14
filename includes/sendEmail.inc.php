<?php
session_start();
if(isset($_POST["submit"])){
    if(!empty($_POST["message"]) && !empty($_POST["subject"])){
        $from = $_SESSION["u_email"];
        $subject = "Chameleon Leads Enquiry: ".$_POST["subject"];
        $message = $_POST["message"];
        $to = "contactpatross@gmail.com";
        $headers = "From: {$from}" . "\r\n" .
                   "Reply-To: ${from}";
        mail($to, $subject, $message, $headers);

    }else{
        header("Location: ../contact.php?status=empty");
    }
}
///
///test on the vm ree
///
?>