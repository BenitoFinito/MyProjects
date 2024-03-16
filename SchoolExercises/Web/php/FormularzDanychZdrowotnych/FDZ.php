<html>
<head>
    <title>Formularz danych zdrowotnych</title>
</head>
<body>
<?php
if(isset($_POST['submit'])){

    echo "<table border='1'>";
	echo "<tr><th>Data</th><th>Waga</th><th>Puls</th><th>Ciśnienie krwi</th><th>Wzrost</th><th>Nasycenie krwi tlenem</th><th>Temperatura ciała</th><th>Poziom stresu</th><th>Wypite szklanki wody</th><th>Aktywność</th></tr>";


    $date = $_POST['date'];
    $weight = $_POST['weight'];
    $pulse = $_POST['pulse'];
    $blood_pressure = $_POST['blood_pressure'];
    $height = $_POST['height'];
    $oxygen_saturation = $_POST['oxygen_saturation'];
    $body_temperature = $_POST['body_temperature'];
    $stress_level = $_POST['stress_level'];
    $water_intake = $_POST['water_intake'];
    $activity = $_POST['activity'];

    //connect to the database
    $dbc = mysqli_connect('localhost','root','','zdrowie');
    //insert data into the database
    if($dbc){
    mysqli_query($dbc, "INSERT INTO health_data VALUES ('$date', '$weight', '$pulse', '$blood_pressure', '$height', '$oxygen_saturation', '$body_temperature', '$stress_level', '$water_intake', '$activity')");
    echo "Dane zostały przesłane poprawnie!";

    $result=mysqli_query($dbc, 'SELECT date, weight, pulse, blood_pressure, height, oxygen_saturation, body_temperature, stress_level, water_intake, activity from health_data');
			if (mysqli_num_rows($result)>0){ //funkcja sprawdza ile w bazie jest wierszy sprawdzajacych dane zapytanie, do IFA wejde, gdy tych wierszy jest wiecej niz zero
			
			//while nizej czyta funkcja mysqli_fetch_assoc wiersz po wierszu
			//w kazdym wierszu jest kilka danych, tutaj imie i wiek
				while( $row= mysqli_fetch_assoc($result)){
					//czytam sobie te dane do zmiennych
					$datazb=$row["date"];
					$wagazb=$row["weight"];
                    $pulszb=$row["pulse"];
                    $krwzb=$row['blood_pressure'];
                    $wyszb=$row['height'];
                    $tlenzb=$row['oxygen_saturation'];
                    $tpzb=$row['body_temperature'];
                    $streszb=$row['stress_level'];
                    $wodazb=$row['water_intake'];
                    $aktzb=$row['activity'];
					//wyswietlam w tabeli jako nowe wiersze TR i komórki TD
					echo "<tr>
							<td>$datazb</td><td>$wagazb kg</td><td>$pulszb</td><td>$krwzb</td><td>$wyszb cm</td><td>$tlenzb %</td><td>$tpzb ℃</td><td>$streszb</td><td>$wodazb</td><td>$aktzb</td>
						</tr>";
				}
                echo "</table>";
			}
			//czyszcze pamiec po danych i zamykam polaczenie
			mysqli_free_result($result);

    $result=mysqli_query($dbc, 'SELECT sum(weight) from health_data where height>120'); 
    //wybiera z bazy wagi osób, które mają więcej niż 120 cm wzrostu i potem te wagi sumuje i wyświetla
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    $waga=$row["sum(weight)"];

                    echo "<br>Suma wag osób, które mają powyżej 120 cm wzrostu: <br>";
                    echo "$waga kg  <br>";
                }
            }
			mysqli_free_result($result);

     $result=mysqli_query($dbc, 'SELECT avg(height) as xd, activity from health_data where stress_level<3 group by activity'); 
     //wybiera z bazy wysokość i aktywność osób które mają poziom stresu niższy od 3 i potem wyświtla pogrupowane względem aktywności średni wzrost osób, który jest nazwany jako xd.
            if(mysqli_num_rows($result)>0){
                echo "<br>Średni wzrost osób (nazwany jako xd) , które mają poziom stresu niższy od 3 i pogrupowane są przez ich aktywność (czyli że osobno wylicza średnią wysokość dla osób z aktywnością np. bieganie a kroki): <br>";
                while($row=mysqli_fetch_assoc($result)){
                    $xd=$row["xd"];
                    $act=$row["activity"];
                    if($act == "Bieganie"){
                    echo "Średni wzrost osób biegających: $xd cm <br>";
                    }else if($act == "Kroki"){
                    echo "Średni wzrost osób robiących kroki: $xd cm <br>";
                    }else {
                    echo "Średni wzrost osób wykonujących inną aktywność: $xd cm <br>";
                    }
                }
                echo "<br>";
            }
			mysqli_free_result($result);

     $result = mysqli_query($dbc, "SELECT pulse as puls FROM health_data WHERE stress_level < 3 AND activity = 'Bieganie' ORDER BY height DESC"); 
     //wybiera z bazy puls osób, które mają poziom stresu niższy od 3 i jako aktywność mają ustawioną bieganie, które są posortowane w kolejności malejąco względem ich wzrostu.

            if (mysqli_num_rows($result) > 0) {
              echo "Puls (nazwany jako puls) osób biegających, które mają poziom stresu niższy od 3, posortowany malejąco względem ich wzrostu: <br>";
              while ($row = mysqli_fetch_assoc($result)) {
                $puls = $row["puls"];
                echo "Puls: $puls <br>";
              }
            } else {
              echo "Brak wyników";
            }
            
            mysqli_free_result($result);

    $result=mysqli_query($dbc, 'SELECT stress_level as sl, avg(body_temperature) as sbd from health_data where water_intake>=2 group by stress_level');
           //wybiera z bazy poziom stresu i temperaturę ciała osób które wypiły 2 lub więcej szklanek i wyświetla średnią temperaturę tych osób pogrupowane przez poziom stresu.
            if(mysqli_num_rows($result)>0){
                echo "<br>Średnia temperatura ciała (nazwana jako sbd) osób, które wypiły 2 lub więcej szklanek wody, które są pogrupowane przez poziom stresu (nazwany jako sl): <br>";
                while($row=mysqli_fetch_assoc($result)){
                    $sl=$row["sl"];
                    $bp=$row["sbd"];

                    if($sl == 1){
                         echo "Średnia temperatura ciała osób, które mają poziom stresu równy 1: ";
                            echo "$bp ℃<br>";
                    }else if($sl == 2){
                        echo "Średnia temperatura ciała osób, które mają poziom stresu równy 2: ";
                            echo "$bp ℃<br>";
                    }else if($sl == 3){
                        echo "Średnia temperatura ciała osób, które mają poziom stresu równy 3: ";
                            echo "$bp ℃<br>";
                    }else if($sl == 4){
                         echo "Średnia temperatura ciała osób, które mają poziom stresu równy 4: ";
                            echo "$bp ℃<br>";
                    }else if($sl == 5){
                         echo "Średnia temperatura ciała osób, które mają poziom stresu równy 5: ";
                            echo "$bp ℃<br>";
                    }else{
                         echo "To nie istnieje bruh i nie ma możliwości istnienia bruh.";
                    }
                }
                echo "<br>";
            }
			mysqli_free_result($result);
            
        $result = mysqli_query($dbc, "SELECT AVG(oxygen_saturation) as oxy, MIN(body_temperature) as body, MAX(water_intake) as water, SUM(pulse) as puls, COUNT(pulse) as count, ((SUM(pulse) / (AVG(stress_level) * SUM(stress_level)) * AVG(oxygen_saturation)) * 100) as prc FROM health_data");
                //to zapytanie bierze z bazy danych i wyświetla średnią saturację krwi wszystkich ludzi, najniższą temperaturę, najwięcej wypitych szklanek, sumę pulsów, liczbę osób liczonych przez liczbę pulsów, sumę pulsów podzieloną przez średnią pulsów pomnożoną przez sumę pulsów, które zostało pomnożone przez średnią saturację krwi i przez 100 z bazy danych o nazwie health_data 
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $oxy = $row["oxy"];
                $body = $row["body"];
                $water = $row["water"];
                $puls = $row["puls"];
                $count = $row["count"];
                $prc = $row["prc"];
            
                echo "Średnie nasycenie krwi tlenem: $oxy %<br>";
                echo "Najniższa temperatura ciała: $body ℃<br>";
                echo "Najwięcej wypitych szklanek: $water<br>";
                echo "Suma wszystkich pulsów: $puls<br>";
                echo "Liczba osób (liczone przez liczbę pulsów): $count<br>";
                echo "Procentowy udział średniej sumy pulsów do średniej saturacji krwi i poziomu stresu : $prc % <br>";
            }
            
            mysqli_free_result($result);
            

            mysqli_close($dbc);

    }else{
        echo "Coś nie pykło!";
    }
}
else{
?>

<form method="post" action="FDZ.php">
    <br><label for="date">Data:</label><br>
    <input type="date" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" required><br>
    
    <label for="weight">Waga:</label><br>
    <input type="number" name="weight" id="weight" min="0" step="0.1" required>kg<br>
    
    <label for="pulse">Puls:</label><br>
    <input type="number" name="pulse" id="pulse" min="0" required><br>
    
    <label for="blood_pressure">Ciśnienie tętnicze: </label><br>
    <input type="text" name="blood_pressure" id="blood_pressure" required><br>
    
    <label for="height">Wzrost:</label><br>
    <input type="number" name="height" id="height" min="0" step="0.1" required>cm<br>
    
    <label for="oxygen_saturation">Nasycenie krwi tlenem:</label><br>
    <input type="number" name="oxygen_saturation" id="oxygen_saturation" min="0" max="100" step="0.1" required>%<br>
    
    <label for="body_temperature">Temperatura ciała:</label><br>
<input type="number" name="body_temperature" id="body_temperature" min="0" step="0.1" required>℃<br>

<label for="stress_level">Poziom stresu:</label><br>
1<input type="range" name="stress_level" id="stress_level" min="1" max="5" required>5<br>

<label for="water_intake">Liczba wypitych szklanek wody:</label><br>
<input type="number" name="water_intake" id="water_intake" min="0" required><br>

<label for="activity">Aktywność:</label><br>
<select name="activity" id="activity" required>
    <option value=""></option>
    <option value="Kroki">Kroki</option>
    <option value="Bieganie">Bieganie</option>
    <option value="Inne">Inne</option>
</select><br>

<input type="submit" name="submit" value="Zapisz"><br><br>
</form>
<?php
}
?>
</body>
</html>