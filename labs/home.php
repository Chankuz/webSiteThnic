<?php
    //เชื่อมต่อ database ตาม
    $con = new PDO(
        "mysql:host=classroom.thnic.or.th;dbname=std09;charset=utf8mb4",
        "user07",
        "thnicacademy"
    );

    //ดึงข้อมูล จากตาราง shops
    $stmt = $con->query("SELECT * FROM shops");

    $rows = [];
    while ($row = $stmt->fetch()) {
        array_push($rows,$row);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแผนผังตลาด</title>
    <link rel="stylesheet" href="template.css">
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="container">
        <h1>ระบบจัดการตลาด - Admin</h1>
        <div class="button-container">
            <button>จัดการแผง</button>
            <button>ดูแผนผังตลาด</button>
        </div>
        <div class="guideline">
            <div class="head">คลิกที่ช่องเพื่อเพิ่มหรือแก้ไขแผง</div>
            <div>ช่องสีเขียว = แผงที่จองแล้ว | ช่องสีขาว = แผงว่าง</div>
        </div>
        <div class="grid-container">
            <?php
                for ($y=1; $y <= 30; $y++) {
                    for ($x=1; $x <= 30; $x++) { 
                        $has_value = "";
                        foreach ($rows as $row) {
                            if($row["shop_x"] == $x && $row["shop_y"] == $y){
                                $has_value = "green";
                            }
                        }
                        echo '
                        <div class="cell"> 
                            <form action="shop.php" method="get">
                                <input type="text" name="x" value="'.$x.'" hidden>
                                <input type="text" name="y" value="'.$y.'" hidden>
                                <button style="background:'.$has_value.';" type="submit"></button>
                            </form>
                        </div>
                        ';
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>