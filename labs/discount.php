<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "<span>Your cost</span>";
        $price = $_POST["price"] ?? 0;
        if ($price < 1000){
            echo "<h1>$price</h1>";
        }
        else if ($price >= 1000 && $price < 5000){
            echo "<h1>" . $price * 0.95 . "</h1>";
        }
        else if ($price >= 5000 && $price < 10000){
            echo "<h1>" . $price * 0.90 . "</h1>";
        }
        else{
            echo "<h1>" . $price * 0.85 . "</h1>";
        }
    ?>
</body>
</html>