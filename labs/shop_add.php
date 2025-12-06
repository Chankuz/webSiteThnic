<?php

    $shop_name = $_POST["shop_name"];
    $shop_phone = $_POST["shop_phone"];
    $shop_category = $_POST["shop_category"];
    $shop_description = $_POST["shop_description"];
    
    $shop_x = $_POST["x"];
    $shop_y = $_POST["y"];
    $id = $_POST["id"];

    $con = new PDO("mysql:
        host=classroom.thnic.or.th;
        dbname=std09;
        charset=utf8mb4",
        "user07",
        "thnicacademy"
    );

    $save_as = $_POST["old_img"] ?? "";

    if(isset($_FILES["shop_image"])) {
            $filename = $_FILES["shop_image"]["name"];
            $save_as = "/images" . $shop_x . "_" . $shop_y . "_" . $filename;
            move_uploaded_file($_FILES["shop_image"]["tmp_name"], $save_as);
        }

    if ($id != "") {
        $stmt = $con->prepare("UPDATE shops SET 
        `shop_name` = ?, 
        `shop_phone` = ?, 
        `shop_description` = ?, 
        `shop_category` = ?, 
        `shop_x` = ?, 
        `shop_y` = ?,
        `shop_img` = ?
        WHERE id = ?");
        $stmt->execute([$shop_name,$shop_phone,$shop_description,$shop_category,$shop_x,$shop_y,$id,$save_as]);
    }
    else{        
        $stmt = $con->prepare("INSERT INTO shops
        (`shop_name`, `shop_phone`, `shop_description`, `shop_category`, `shop_x`, `shop_y`, `shop_img`) 
            VALUES (?,?,?,?,?,?,?)");
    
        $stmt->execute([$shop_name,$shop_phone,$shop_description,$shop_category,$shop_x,$shop_y,$save_as]);
    }

    header("Location: home.php");

?>