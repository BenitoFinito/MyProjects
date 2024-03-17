<?php
function showArr($arr) {
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        font-family: Arial;
    }
</style>
<body>
    <?php
    $t[100];
    $t[0] = 1;
    for($i = 1;$i < 100;$i++){
        $t[$i] = $t[$i-1] + $t[$i-2];
    }
    echo "Ciąg Fibonacciego: ";
    showArr($t);
    echo "Kolejne potęgi liczby 2: ";
    $t[0] = 2;
    for($i = 1;$i < 100;$i++){
        $t[$i] = $t[$i - 1] * 2;
    }
    showArr($t);
    echo "Liczby kolejno o 3 większe od poprzedniej: ";
    $t[0] = 3;
    for($i = 1;$i < 100;$i++){
        $t[$i] = $t[$i - 1] + 3;
    }
    showArr($t);
    ?>
</body>
</html>