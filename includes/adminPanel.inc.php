<?php
 require_once( "../PatrossPHP\PatrossPHP\PatrossPHP\PatrossPHP.php");

 require_once("dbh.inc.php");
    $target_dir = "../img/products/";
    $target_file = $target_dir . //productIDhere);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["Image"]["tmp_name"]);
        if($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
            move_uploaded_file($_FILES["Image"]["tmp_name"], $target_file);
        } else {
            // echo "File is not an image.";
            $uploadOk = 0;
        }
    }


    $conn->query("insert into products(name, description, price) values('{$_POST["ItemName"]}', '{$_POST["Description"]}', '{$_POST["price"]}');");

    $query = $conn->query("SELECT * FROM products ORDER BY id DESC LIMIT 1;");

    $result = $query->fetch(PDO::FETCH_ASSOC);
    $productid = $result["id"];
    $fileName = $_POST['ItemName'];
    $path = "img/products/";
    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }
    $filePath = $path.$fileName;
    $conn->query("insert into images(path,product_id) values('{$filePath}',{$productid})");