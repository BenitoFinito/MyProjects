<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Rozgrywki futbolowe</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <section id="baner">
        <h2>Światowe Rozgrywki Piłkarskie</h2>
        <img src="obraz1.jpg" alt="boisko">
    </section>
    <section id="mecze">
<?php
    $conn = mysqli_connect("localhost", "root", "", "egzamin");
    
    $result = mysqli_query($conn,'SELECT zespol1, zespol2, wynik, data_rozgrywki FROM `rozgrywka` WHERE zespol1 = "EVG"');

    while($row=mysqli_fetch_assoc($result)){
    $zespol1 = $row["zespol1"];
    $zespol2 = $row["zespol2"];
    $wynik = $row["wynik"];
    $data = $row["data_rozgrywki"];
    echo "<section id='info'>";
    echo "<h3>$zespol1 - $zespol2</h3>";
    echo "<h4>$wynik</h4>";
    echo "<p>w dniu: $data</p>";
    echo "</section>";
    }

    mysqli_close($conn);
?>
    </section>
    <section id="główny">
        <h2>Reprezentacja Polski</h2>
    </section>
    <section id="lewy">
        <p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy):</p>
        <form method="POST" action="futbol.php">
            <input type="number" name="number">
            <input type="submit" name="button" value="Sprawdź">
        </form>
        <ul>
<?php
    if(isset($_POST['number']) && !empty($_POST['number'])) {
    $number = $_POST["number"];
    
    $conn = mysqli_connect("localhost", "root", "", "egzamin"); 
    
    $result = mysqli_query($conn,"SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = '$number'");

    while($row = mysqli_fetch_assoc($result)) {
        $imie = $row['imie'];
        $nazwisko = $row['nazwisko'];
        echo "<li>$imie $nazwisko</li>";
    }

    mysqli_close($conn);
    }
?>
        </ul>
    </section>
    <section id="prawy">
        <img src="zad1.png" alt="piłkarz">
        <p>Autor: 2137694202115</p>
    </section>

</body>
</html>