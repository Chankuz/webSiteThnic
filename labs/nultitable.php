<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $num = $_POST["nums"];
        $s = $_POST["s"];
        for ($i = 1; $i <= $num; ++$i) {
            echo "<h1>แม่ ". $i . "</h1><br>";
            for ($j = 1; $j <= $s; ++$j) {
                echo $i . "*" . $j . "=" . $i*$j . "<br>";
            }
        }
    ?>
</body>
</html>