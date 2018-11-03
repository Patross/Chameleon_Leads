<?php
if(isset($_POST['submit']))
{
  session_start();
  $page = basename($_SESSION["lastpage"]);
  session_unset();
  session_destroy();
  header('Location: ../'.$page);
}
else{
  header("Location ../index.php");
}
?>