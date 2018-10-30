<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "secretrootpass";

try
{
    $conn = new PDO("mysql:host={$db_host};",$db_user,$db_pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->query("create database if not exists chameleon;");
    $conn->query("CREATE USER if not exists 'chameleon'@'%' IDENTIFIED BY 'chameleon-leads';");
    $conn->query("  grant SELECT on chameleon.* to 'chameleon'@'%';
                    grant INSERT on chameleon.* to 'chameleon'@'%';
                    grant DELETE on chameleon.* to 'chameleon'@'%';
                    grant UPDATE on chameleon.* to 'chameleon'@'%';
                    grant CREATE TEMPORARY TABLES on chameleon.* to 'chameleon'@'%';
                    FLUSH PRIVILEGES;");
    $conn->query("use chameleon;");
}
catch(PDOException $e)
{
 echo $e->getMessage();
}
?>