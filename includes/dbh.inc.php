<?php
 $db_host = "localhost";
$db_user = "root";
$db_pass = "";
 try
{
    $conn = new PDO("mysql:host={$db_host};dbname=chameleon",$db_user,$db_pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $conn->query("create database if not exists chameleon;");
    // $conn->query("CREATE USER if not exists 'chameleon'@'%' IDENTIFIED BY 'chameleon-leads';");
    // $conn->query("  grant SELECT on chameleon.* to 'chameleon'@'%';
    //                 grant INSERT on chameleon.* to 'chameleon'@'%';
    //                 grant DELETE on chameleon.* to 'chameleon'@'%';
    //                 grant UPDATE on chameleon.* to 'chameleon'@'%';
    //                 grant CREATE TEMPORARY TABLES on chameleon.* to 'chameleon'@'%';
    //                 FLUSH PRIVILEGES;");
    // $conn->query("use chameleon;");

    $conn->query("CREATE TABLE IF NOT EXISTS users(
	id int not null primary key auto_increment,
    first_name varchar(255) not null,
    last_name varchar(255) not null,
    email varchar(255) not null,
    password varchar(255) not null
    );");

    $conn->query("CREATE TABLE IF NOT EXISTS products(
	id int not null primary key auto_increment,
    name varchar(255) not null,
    description varchar(255) not null,
    price decimal(6,2) not null
    );");

    $conn->query("CREATE TABLE IF NOT EXISTS images(
	id int not null primary key auto_increment,
    path varchar(255) not null,
    product_id int not null,
    foreign key (product_id) references products(id)
    );");

    $conn->query("CREATE TABLE IF NOT EXISTS shopping_cart(
	id int not null primary key auto_increment,
    product_id int not null,
    foreign key (product_id) references products(id),
    user_id int not null,
    foreign key (user_id) references users(id),
    amount int not null
    );");
}
catch(PDOException $e)
{
 echo $e->getMessage();
}
?>
