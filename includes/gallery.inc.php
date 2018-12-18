<?php
    require_once("dbh.inc.php");
    
    
    // $conn->query("insert into gallery(caption) values('{$_POST["caption"]}');");
    
    // $query = $conn->query("SELECT * FROM gallery ORDER BY id DESC LIMIT 1;");
    
    // $result = $query->fetch(PDO::FETCH_ASSOC);
    // $productid = $result["id"];
    // $fileName = $_POST['ItemName'];
    
    $name = $_FILES["Image"]["name"];
    $ext = end((explode(".", $name))); # extra () to prevent notice

    // id int not null primary key auto_increment,
    // image_path varchar(255) not null,
    // caption varchar(255),
    // verified boolean not null
    
    $id = $conn->query("SELECT id FROM gallery ORDER BY id DESC LIMIT 1");
    $filePath = "img/gallery/".$id.".".$ext;
    $conn->query("insert into gallery(image_path,caption,verified) values('{$filePath}','{$_POST["caption"]}',false)");


    $path = "../img/gallery/";
    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }


    $target_file = $path . //productIDhere);hallo
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["Image"]["tmp_name"]);
        if($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
            move_uploaded_file($_FILES["Image"]["tmp_name"], "../img/gallery/".$id.".".$ext);
        } else {
            // echo "File is not an image.";
            $uploadOk = 0;
        }
    }