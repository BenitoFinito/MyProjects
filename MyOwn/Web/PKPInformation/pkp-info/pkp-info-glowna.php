<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST["logout"])){
    session_unset();
    session_destroy();
}
if (isset($_POST["login"])){
    header("Location: /pkp-info/logreg/logowanie-rejestracja.php");
}
include($_SERVER['DOCUMENT_ROOT'] . '/pkp-info/connect.php');
require($_SERVER['DOCUMENT_ROOT'] . '/pkp-info/linki/config.php');
if($notconn == 0){
if(isset($_POST['zapisz'])){
    $id_kom = $_POST['id_kom'];
    $nowy_kom = $_POST['nowy_kom'];
    mysqli_query($conn, "UPDATE `comments` SET `kom`='$nowy_kom', `data_komentarza`= Current_timestamp(), `edytowany` = 1 WHERE `id`='$id_kom'");
}
if(isset($_POST['zapiszedit'])){
    $id = $_POST['idedit'];
    $przewoznik = $_POST['przewoznik'];
    $opoz = $_POST['opoz'];
    $pociag = $_POST['pociag'];
    $maszynista = $_POST['maszynista'];
    $oddata = $_POST['oddata'];
    $czasmin = $_POST['czasmin'];
    $czasgodz = $_POST['czasgodz'];
    $czas_sformatowany = sprintf("%02d:%02d", $czasgodz, $czasmin);
    mysqli_query($conn, "UPDATE `pkp_dane` SET `Data_wpisu` = Current_timestamp(), `Numer_pociągu` = '$pociag', `Nazwisko_maszynisty` = '$maszynista', `Data_odjazdu` = '$oddata', `Szacunkowy_czas_dojazdu` = '$czas_sformatowany', `Opóźnienie` = '$opoz', `Nazwa_przewoźnika` = '$przewoznik' WHERE `id` = '$id'");
}
if(isset($_POST['usun'])){
    $id_kom = $_POST['id_kom'];
    mysqli_query($conn, "DELETE FROM `comments` WHERE `id`='$id_kom'");
}
if(isset($_POST['usundane'])){
    $id = $_POST['id'];
    mysqli_query($conn, "DELETE FROM `pkp_dane` WHERE `id`='$id'");
}
if(isset($_POST['dodajnowywpis'])){
    $przewoznik = $_POST['przewoznik1'];
    $opoz = $_POST['opoz1'];
    $pociag = $_POST['pociag1'];
    $maszynista = $_POST['maszynista1'];
    $oddata = $_POST['oddata1'];
    $czasmin = $_POST['czasmin1'];
    $czasgodz = $_POST['czasgodz1'];
    $czas_sformatowany = sprintf("%02d:%02d", $czasgodz, $czasmin);
    mysqli_query($conn, "INSERT INTO `pkp_dane` VALUES ('', Current_timestamp(),'$pociag', '$maszynista', '$oddata', '$czas_sformatowany', '$opoz', '$przewoznik')");
}
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title><?php 
            echo "$nazwastrony";
        ?></title>
    <link rel="stylesheet" href="pkp-info.css">
    <link rel='icon' href='http://localhost/pkp-info/ikona.png'>
</head>
<body>
    <header>
        <?php
        if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == 1){
            $loginsesji=$_SESSION["twojLogin"];
        ?>
        <div id="userinfo">ZALOGOWANY:<br><?php echo "$loginsesji"; ?></div>
        <?php   if($_SESSION["role"]==2){
                    echo "<div id='rola1'>ADMIN</div>";
                    ?>
                    <nav>
                        <a href="/pkp-info/linki/edycja.php">Edycja</a>
                        <a href="/pkp-info/linki/uzytkownicy.php">Użytkownicy</a>
                    </nav>
                    <?php
                }
                if($_SESSION["role"]==3){ 
                    echo "<div id='rola2'>ADMIN</div>";
                    ?>
                    <nav>
                        <a href="/pkp-info/linki/edycja.php">Edycja</a>
                        <a href="/pkp-info/linki/uzytkownicy.php">Użytkownicy</a>
                        <a href="/pkp-info/linki/rezygnacja.php">Rezygnacja</a>
                    </nav>
                    <?php
                }?>
        <form method="POST"><input type="submit" value="Wyloguj" name="logout" id="log"></form>
        <?php }else{ ?>
        <div id="userinfo2">NIEZALOGOWANO</div>
        <form method="POST"><input type="submit" value="Zaloguj" name="login" id="log2"></form>
        <?php } ?>
        <img src='<?php echo "$fullPath"; ?>' alt='logo'>
        <h2> 
        <?php 
        echo "$nazwastrony";
        ?>
        </h2>
    </header>
    <section id="main">
        <section id="pociagi">
        <?php
        if($notconn == 0){
            if(isset($_POST['newwpis'])){

                $result1 = mysqli_query($conn, 'SELECT *, DATE_FORMAT(`Data_wpisu`, "%d.%m.%Y") AS `Data_wpisu`, DATE_FORMAT(`Data_odjazdu`, "%d.%m.%Y %H:%i") AS `Data_odjazdu`, CONCAT(HOUR(`Szacunkowy_czas_dojazdu`), "h ", MINUTE(`Szacunkowy_czas_dojazdu`), "min") AS `czas` FROM `pkp_dane` ORDER BY `id` DESC LIMIT 1');
                if($row1=mysqli_fetch_assoc($result1)){

                $pociag1 = $row1["Numer_pociągu"];
                $maszynista1 = $row1["Nazwisko_maszynisty"];
                $oddata1 = $row1["Data_odjazdu"];
                $wpisdata1 = $row1["Data_wpisu"];
                $czas1 = $row1["czas"];
                $przewoźnik1 = $row1["Nazwa_przewoźnika"];
                $opoz1 = $row1["Opóźnienie"];

                echo "<section id='info'>";
                echo "<div id='blok'>";
                echo "<form method='post'>";
                echo "<p><b>Nazwa przewoźnika: </b><br><input type='text' name='przewoznik1' value='".htmlspecialchars($przewoźnik1)."' maxlength='40' class='text' required></p>";
                echo "<p><b>Nazwisko maszynisty: </b><br><input type='text' name='maszynista1' value='".htmlspecialchars($maszynista1)."' maxlength='40' class='text' pattern='[A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ][A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ -]*' required></p>";
                echo "</div>";
                echo "<div id='blok'>";
                echo "<p><b>Numer pociągu: </b><input type='number' name='pociag1' value=".$pociag1." min='0' class='time1' required></p>";
                echo "<p><b>Opóźnienie: </b><input type='number' name='opoz1' value=".$opoz1." min='0' class='time1' required> minut.</p>";
                echo "</div>";
                echo "<div id='blok'>";
                echo "<p><b>Data i czas odjazdu: </b><input type='datetime-local' name='oddata1' value=".date('Y-m-d\TH:i', strtotime($oddata1))." min='1914-01-01T00:00' max='2077-12-31T23:59' required></p>";
                sscanf($czas1, "%dh %dmin", $godziny1, $minuty1);
                echo "<p><b>Szacunkowy czas dojazdu: </b><input type='number' name='czasgodz1' min='0' max='99' value='".$godziny1."' class='time'>h <input type='number' name='czasmin1' min='0' max='59' value='".$minuty1."' class='time' required>min.</p>";
                echo "</div>";
                echo "<div id='deledit'>";
                echo "<input type='submit' value='Zapisz' name='dodajnowywpis' class='savean'>";
                echo "<input type='submit' value='Anuluj' class='savean' formnovalidate>";
                echo "</div>";
                echo "</form>";
                echo "<div id='stopka'>Data wpisu: <b>".DATE('d.m.Y')."</b></div>";
                echo "</section>";
                }else{
                
                echo "<section id='info'>";
                echo "<div id='blok'>";
                echo "<form method='post'>";
                echo "<p><b>Nazwa przewoźnika: </b><br><input type='text' name='przewoznik1' maxlength='40' class='text' required></p>";
                echo "<p><b>Nazwisko maszynisty: </b><br><input type='text' name='maszynista1' maxlength='40' class='text' pattern='[A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ][A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ -]*' required></p>";
                echo "</div>";
                echo "<div id='blok'>";
                echo "<p><b>Numer pociągu: </b><input type='number' name='pociag1' min='0' class='time1' required></p>";
                echo "<p><b>Opóźnienie: </b><input type='number' name='opoz1' min='0' class='time1' required> minut.</p>";
                echo "</div>";
                echo "<div id='blok'>";
                echo "<p><b>Data i czas odjazdu: </b><input type='datetime-local' name='oddata1' min='1914-01-01T00:00' max='2077-12-31T23:59' required></p>";
                echo "<p><b>Szacunkowy czas dojazdu: </b><input type='number' name='czasgodz1' min='0' max='99' class='time'>h <input type='number' name='czasmin1' min='0' max='59' class='time' required>min.</p>";
                echo "</div>";
                echo "<div id='deledit'>";
                echo "<input type='submit' value='Zapisz' name='dodajnowywpis' class='savean'>";
                echo "<input type='submit' value='Anuluj' class='savean' formnovalidate>";
                echo "</div>";
                echo "</form>";
                echo "<div id='stopka'>Data wpisu: <b>".DATE('d.m.Y')."</b></div>";
                echo "</section>";
                }
            }
        $result = mysqli_query($conn,'SELECT *, DATE_FORMAT(`Data_wpisu`, "%d.%m.%Y") AS `Data_wpisu`, DATE_FORMAT(`Data_odjazdu`, "%d.%m.%Y %H:%i") AS `Data_odjazdu`, CONCAT(HOUR(`Szacunkowy_czas_dojazdu`), "h " , MINUTE(`Szacunkowy_czas_dojazdu`), "min") AS `czas` FROM `pkp_dane` ORDER BY `Opóźnienie` DESC');
        while($row=mysqli_fetch_assoc($result)){
            $pociag = $row["Numer_pociągu"];
            $maszynista = $row["Nazwisko_maszynisty"];
            $oddata = $row["Data_odjazdu"];
            $wpisdata = $row["Data_wpisu"];
            $czas = $row["czas"];
            $przewoźnik = $row["Nazwa_przewoźnika"];
            $opoz = $row["Opóźnienie"];

            echo "<section id='info'>";
            echo "<div id='blok'>";
            if(isset($_POST['editdane']) && $_POST['id'] == $row['id']){
                echo "<form method='post'>";
                echo "<input type='hidden' name='idedit' value='".$row['id']."'>";
                echo "<p><b>Nazwa przewoźnika: </b><br><input type='text' name='przewoznik' value='".htmlspecialchars($przewoźnik)."' maxlength='40' class='text' required></p>";
                echo "<p><b>Nazwisko maszynisty: </b><br><input type='text' name='maszynista' value='".htmlspecialchars($maszynista)."' maxlength='40' class='text' pattern='[A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ][A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ -]*' required></p>";
                echo "</div>";
                echo "<div id='blok'>";
                echo "<p><b>Numer pociągu: </b><input type='number' name='pociag' value=".$pociag." min='0' class='time1' required></p>";
                echo "<p><b>Opóźnienie: </b><input type='number' name='opoz' value=".$opoz." min='0' class='time1' required> minut.</p>";
                echo "</div>";
                echo "<div id='blok'>";
                echo "<p><b>Data i czas odjazdu: </b><input type='datetime-local' name='oddata' value=".date('Y-m-d\TH:i', strtotime($oddata))." min='1914-01-01T00:00' max='2077-12-31T23:59' required></p>";
                sscanf($czas, "%dh %dmin", $godziny, $minuty);
                echo "<p><b>Szacunkowy czas dojazdu: </b><input type='number' name='czasgodz' min='0' max='99' value='".$godziny."' class='time'>h <input type='number' name='czasmin' min='0' max='59' value='".$minuty."' class='time' required>min.</p>";
                echo "</div>";
                echo "<div id='deledit'>";
                echo "<input type='submit' value='Zapisz' name='zapiszedit' class='savean'>";
                echo "<input type='submit' value='Anuluj' class='savean' formnovalidate>";
                echo "</div>";
                echo "</form>";
            }else{
            echo "<p><b>Nazwa przewoźnika:</b><br> $przewoźnik</p>";
            echo "<p><b>Nazwisko maszynisty:</b><br> $maszynista</p>";
            echo "</div>";
            echo "<div id='blok'>";
            echo "<p><b>Numer pociągu:</b> $pociag</p>";
            if($opoz > 10){
                echo "<p><b class='opoz1'>Opóźnienie: $opoz minut</b></p>";
            }elseif($opoz <= 10 && $opoz > 3){
                echo "<p><b class='opoz2'>Opóźnienie: $opoz minut</b></p>";    
            }else{
                echo "<p><b class='opoz3'>Opóźnienie: $opoz minut</b></p>"; 
            }
            echo "</div>";
            echo "<div id='blok'>";
            echo "<p><b>Data i czas odjazdu:</b> $oddata</p>";
            echo "<p><b>Szacunkowy czas dojazdu:</b> $czas</p>";
            echo "</div>";

            if(isset($_SESSION['zalogowany']) && ($_SESSION['role'] == 2 || $_SESSION['role'] == 3)){
                    echo "<div id='deledit'>";
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='id' value='".$row['id']."'>";
                    echo "<input type='submit' value='Usuń' name='usundane' class='danedane'>";
                    echo "<input type='submit' value='Edytuj' name='editdane' class='danedane'>";
                    echo "</form>";
                    echo "</div>";
            }
            }
            echo "<div id='stopka'>Data wpisu: <b>$wpisdata</b></div>";
            echo "</section>";
            }
        }else{
            echo "<div id='error'>Nie udało się połączyć z bazą danych. <br> Błąd: " .$errorMessage. "</div>";
        }
        ?>
        </section>
        <section id="komentarze">
            <form method="POST" id="kom" action='comment.php'>
                <?php 
                if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == 1){
                echo "<b>$loginsesji</b> ● Komentarz<br>";?>
            <textarea placeholder="Dodaj komentarz" name="kom" required></textarea>
            <input type="submit" value="Skomentuj" name="skomentuj" id="dodkom">
            <input type="reset" value="Anuluj" id="ankom">
            <?php }else{ ?>
                <b>Niezalogowany</b><br>
                <textarea placeholder="Musisz się zalogować, aby móc komentować" rows='3' disabled></textarea>
                <?php } ?>
            </form>
            <?php
    if($notconn == 0){
        $rescom = mysqli_query($conn,'SELECT *, DATE_FORMAT(`data_komentarza`, "%Y-%m-%d %H:%i") AS `dataczas` FROM `comments`');
        if($rescom){
        if(mysqli_num_rows($rescom) <= 0){
            echo "<div id='nocomm'> Nikt jeszcze nie skomentował. Bądź pierwszy i skomentuj!</div>";
        }else{
            while($row=mysqli_fetch_assoc($rescom)){
                $autor = $row["User"];
                $kom = $row["kom"]; 
                $data = $row["dataczas"];
               
                $edited = $row['edytowany'] == 1 ? '(Edytowano)' : '';

				echo "<div id='comm'><b>$autor ● $data $edited</b> <br> ";
                if(isset($_POST['edit']) && $_POST['id_kom'] == $row['id']){
                    echo "<div id='deledit'>";
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='id_kom' value='".$row['id']."'>";
                    echo "<textarea name='nowy_kom' id='nowy_kom'>".$kom."</textarea><br>";
                    echo "<input type='submit' value='Zapisz' name='zapisz' class='savean'>";
                    echo "<input type='submit' value='Anuluj' class='savean'>";
                    echo "</form>";
                    echo "</div>";
                }else{
                    echo "<div>".nl2br($kom)."</div>";

                    if(isset($_SESSION['zalogowany'])){
                        if($loginsesji == $autor && $_SESSION['role'] == 1){
                            echo "<div id='deledit'>";
                            echo "<form method='post'>";
                            echo "<input type='hidden' name='id_kom' value='".$row['id']."'>";
                            echo "<input type='submit' value='Usuń' name='usun' class='deledit'>";
                            echo "<input type='submit' value='Edytuj' name='edit' class='deledit'>";
                            echo "</form>";
                            echo "</div>";
                        }elseif($_SESSION['role'] == 2 || $_SESSION['role'] == 3){
                            echo "<div id='deledit'>";
                            echo "<form method='post'>";
                            echo "<input type='hidden' name='id_kom' value='".$row['id']."'>";
                            echo "<input type='submit' value='Usuń' name='usun' class='deledit'>";
                            if($loginsesji == $autor){
                            echo "<input type='submit' value='Edytuj' name='edit' class='deledit'>";
                            }
                            echo "</form>";
                            echo "</div>";
                        }
                    }
                }
                echo "</div>";
            }
        }
     }
    }
            ?>
        </section>
    </section>
</body>
</html>