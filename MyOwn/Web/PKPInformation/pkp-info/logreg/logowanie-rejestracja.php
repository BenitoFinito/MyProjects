<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include($_SERVER['DOCUMENT_ROOT'] . '/pkp-info/connect.php');
include($_SERVER['DOCUMENT_ROOT'] . '/pkp-info/linki/config.php');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Logowanie / Rejestracja do <?php 
                echo "$nazwastrony";
        ?></title>
    <link rel="stylesheet" href="logreg.css">
    <link rel='icon' href='http://localhost/pkp-info/ikona.png'>
</head>
<body>
    <header> 
    <?php
if($notconn == 1){
    echo "<div id='error'>";
    echo "Nie udało się połączyć z bazą danych. <br> Błąd: " . $errorMessage;
    echo "</div>";
}
?>
<img src='<?php echo "$fullPath"; ?>' alt='logo'>
        <h2><?php 
            echo "$nazwastrony";
        ?>
        </h2>
    </header>
    <div id="reglogblock">
        <div id="logblock">ZALOGUJ SIĘ</div>
        <div id="regblock">ZAREJESTRUJ SIĘ</div>
    </div>
    <section id="loginreg">
    <form method="POST" id="logo" action="sukces.php">
        <section id="sec_log">
            Login <br>
            <input type="text" id="login" name="login" placeholder="Username" required> <br>
            Hasło <br>
            <input type="password" id="passwd" name="passwd" placeholder="Password" required> <br>
            <input type="submit" value="Zaloguj się" name="loginbutt" id="logbutt">
        </section>
        <?php
        if(isset($_SESSION['sprawdzono'])){
            if($_SESSION["zalogowany"] == 1){
                header('Location: /pkp-info/pkp-info-glowna.php');
            }
            elseif($_SESSION["zalogowany"] == 0){
                echo "<p id='sucq'>Błędny login lub hasło.<br>Spróbuj jeszcze raz lub się zarejestruj!</p>";
            }elseif($_SESSION["zalogowany"] == -2){
                echo "<p id='sucq'>Wystąpił nieoczekiwany błąd.</p>";
            }
            unset($_SESSION['sprawdzono']);
        }
        ?>
    </form>
    <form method="POST" id="reg" action="sukces.php">
        <section id="sec_reg">
            Login <br>
            <input type="text" id="login1" name="reglogin" placeholder="Username" maxlength=22 required pattern='.{3,22}' title="Login musi składać się z 3 do 22 znaków."> <br>
            Hasło <br>
            <input type="password" id="passwd1" name="regpasswd" placeholder="Password" required pattern='.{6,}' title="Hasło musi składać się z przynajmniej 6 znaków."> <br>
            Potwierdź hasło <br>
            <input type="password" id="passwd1" name="confirmpasswd" placeholder="Confirm password"  required> <br>
            <input type="submit" value="Zarejestruj się" name="register" id="regbutt">
        </section>
        <?php   
        if(isset($_SESSION['wyslano'])){
            if($_SESSION['zarejestrowany'] == 1){
                echo "<p id='sucq'>Jesteś pierwszym zarejestrowanym!<br>Możesz się zalogować jako admin!</p>";
            }
            elseif($_SESSION['zarejestrowany'] == 2){
                echo "<p id='sucq'>Pomyślnie zarejestrowano!<br>Możesz się zalogować!</p>";
            }
            elseif($_SESSION['zarejestrowany'] == 0){
                echo "<p id='sucq'>Ktoś taki już istnieje!<br>Spróbuj jeszcze raz lub się zaloguj!</p>";
            }elseif($_SESSION["zarejestrowany"] == -2){
                echo "<p id='sucq'>Wystąpił nieoczekiwany błąd.</p>";
            }elseif($_SESSION["zarejestrowany"] == -3){
                echo "<p id='sucq'>Hasła nie są takie same.<br> Spróbuj ponownie.</p>";
            }
            unset($_SESSION['wyslano']);
        }
        ?>
    </form>
</section>
<div id="gosc">
Nie chcesz się logować lub rejestrować? Kliknij <a href="/pkp-info/pkp-info-glowna.php">tutaj</a> aby przejść do strony głównej!
</div>
</body>
</html>
