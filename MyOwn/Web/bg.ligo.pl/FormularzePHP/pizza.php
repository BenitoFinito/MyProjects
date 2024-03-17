<!DOCTYPE html>
<html>
<head>
    <title>Koszt dowozu pizzy - wynik</title>
</head>
<body>
    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $odleglosc = intval($_POST["odleglosc"]);
        $cieplaDostawa = isset($_POST["ciepla"]);


        $kosztDowozu = $odleglosc * 0.5; 
        if ($cieplaDostawa) {
            $kosztDowozu *= 1.15; 
        }

       
        echo "Odległość: " . $odleglosc . " km<br>";
        echo "Ciepła dostawa: " . ($cieplaDostawa ? "Tak" : "Nie") . "<br>";
        echo "Koszt dowozu: " . round($kosztDowozu, 2) . " zł";
    }
    ?>
</body>
</html>