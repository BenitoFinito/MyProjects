<?php
if(isset($_POST['wyslij'])){
    $benzin = floatval($_POST['cost']);
    $km = intval($_POST['km']);
    $burn = floatval($_POST['burn']);
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Koszt</title>
</head>
<body>
    <?php
    $przejazd = ($km / 100) * ($burn * $benzin);

    echo "Koszt benzyny: $benzin zł/l.<br>";
    echo "Ilość kilometrów: $km km.<br>";
    echo "Średnie spalanie: $burn l/100km.<br>";
    echo "Koszt przejazdu: ".round($przejazd, 2)." zł.";
    ?>
</body>
</html>
