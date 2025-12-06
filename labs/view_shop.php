<?php

    $con = new PDO("mysql:host=classroom.thnic.or.th;dbname=std09;charset=utf8mb4", 
                    "user07", "thnicacademy");

    $x = $_GET["x"] ?? null;
    $y = $_GET["y"] ?? null;

    if ($x === null || $y === null) {
        die("❌ กรุณาเลือกตำแหน่งจากแผนผังก่อน");
    }

    $stmt = $con->prepare("SELECT * FROM shops WHERE shop_x = ? AND shop_y = ?");
    $stmt->execute([$x, $y]);
    $row = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ฟอร์มเพิ่มแผง</title>
    <link rel="stylesheet" href="template.css">
    <link rel="stylesheet" href="shop.css">
</head>
<body>
    <div class="container">
        <h1>เพิ่มแผงตลาด</h1>
        <div class="position">ตำแหน่ง: (<?=$x?>, <?=$y?>)</div>

        <form action="shop_add.php" method="post">
            <input disabled type="text" name="id" value="<?=$row["id"] ?? ''?>" hidden>
            <input disabled type="hidden" name="x" value="<?=$x?>">
            <input disabled type="hidden" name="y" value="<?=$y?>">

            <div class="form-warpper">
                <label for="shop_name">ชื่อร้านค้า</label>
                <input disabled type="text" name="shop_name" id="shop_name" 
                       value="<?=$row["shop_name"] ?? ''?>">
            </div>

            <div class="form-warpper">
                <label for="shop_phone">เบอร์โทรศัพท์</label>
                <input disabled type="text" name="shop_phone" id="shop_phone" 
                       value="<?=$row["shop_phone"] ?? ''?>">
            </div>

            <div class="form-warpper">
                <label for="shop_category">หมวดหมู่ร้านค้า</label>
                <select name="shop_category" id="shop_category">
                    <option disabled value="อาหาร"      <?=($row["shop_category"] ?? '')=="อาหาร"?'selected':''?>>อาหาร</option>
                    <option disabled value="เสื้อผ้า"   <?=($row["shop_category"] ?? '')=="เสื้อผ้า"?'selected':''?>>เสื้อผ้า</option>
                    <option disabled value="เครื่องดื่ม" <?=($row["shop_category"] ?? '')=="เครื่องดื่ม"?'selected':''?>>เครื่องดื่ม</option>
                </select>
            </div>

            <div class="form-warpper">
                <label for="shop_description">รายละเอียดร้านค้า</label>
                <input disabled type="text" name="shop_description" id="shop_description"
                       value="<?=$row["shop_description"] ?? ''?>">
            </div>

            <div class="form-warpper">
                <label for="shop_img">รูปภาพ</label>
                <input disabled type="file" name="shop_img" id="shop_img"
                       value="<?=$row["shop_img"] ?? ''?>">
            </div>

            <a href="view.php">กลับ</a>
            <!-- <input class="btn-success" type="submit" value="บันทึก"> -->
        </form>
    </div>
</body>
</html>