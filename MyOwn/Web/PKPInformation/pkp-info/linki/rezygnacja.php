<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST["logout"])){
    session_unset();
    session_destroy();
    header("Location: /pkp-info/pkp-info-glowna.php");
}
if(isset($_POST["powrot"])){
    header("Location: /pkp-info/pkp-info-glowna.php");
}
if($_SESSION["role"]!=3){
    header("Location: /pkp-info/pkp-info-glowna.php");
}
include($_SERVER['DOCUMENT_ROOT'] . '/pkp-info/connect.php');
require($_SERVER['DOCUMENT_ROOT'] . '/pkp-info/linki/config.php');
if($notconn == 1){
    session_destroy();
    header("Location: /pkp-info/pkp-info-glowna.php");
}
if(isset($_POST['confirm'])){
	$zmiana = $_POST['admini'];
	mysqli_query($conn,"UPDATE `users` SET `rola`=3 WHERE login='$zmiana'");
	mysqli_query($conn,"UPDATE `users` SET `rola`=2 WHERE login='$_SESSION[twojLogin]'");
	header("Location: /pkp-info/logreg/logowanie-rejestracja.php");
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Rezygnacja</title>
    <link rel="stylesheet" href="linki.css">
    <link rel='icon' href='http://localhost/pkp-info/ikona.png'>
</head>
<body>
<header> 
        <?php
        if (isset($_SESSION['zalogowany'])){
            $loginsesji=$_SESSION["twojLogin"];
        ?>
        <div id="userinfo">ZALOGOWANY:<br><?php echo "$loginsesji"; ?></div>
        <?php 
                if($_SESSION["role"]==3){ 
                    echo "<div id='rola2'>ADMIN</div>";
                    ?>
                    <nav>
                    <form method='post'><input type='submit' class='opcja' value='Powrót do strony głównej' name='powrot'></form>
                    </nav>
                    <?php
                }?>
        <form method="POST"><input type="submit" value="Wyloguj" name="logout" id="log"></form>
        <?php } ?>
        <img src='<?php echo "$fullPath"; ?>' alt='logo'>
        <h2><?php 
            echo "$nazwastrony";
        ?></h2>
    </header>
    <section id="main">
        <p class='first'>Na tej stronie możesz zrezygnować z bycia nadrzędnym adminem.</p>
        <p class='second'>Jeżeli jednak nie chcesz rezygnować to wróć do strony głównej poprzez kliknięcie w link u góry ↑↑↑</p>
        <p class='third'>A jeżeli chcesz zrezygnować to możesz to zrobić wybierając poniżej z listy adminów jedną osobę, <br>
        której chciałbyś przekazać tą rolę, a następnie kliknij przycisk 'Zatwierdź'.</p>
        <p class='fourth'>Po kliknięciu przycisku 'Zatwierdź' zostaniesz od razu przekierowany na stronę logowania, abyś mógł się zalogować jako zwykły admin.</p>
        <form method='post'>
            <select name='admini' id='lista' size='7' required>
                <optgroup label='---Wybierz użytkownika---'>
                    <?php
                    $result = mysqli_query($conn,'SELECT * FROM `users` WHERE `rola`="2"');

                    while($row=mysqli_fetch_assoc($result)){
                        $admin = $row['login'];
                        echo "<option value='$admin'>$admin</option>";
                    }

                    if (mysqli_num_rows($result) <= 0){
                        echo "<optgroup label='Jesteś jedynym adminem'></optgroup>";
                    }
                    ?>
                </optgroup>
            </select><br>
			<input type="submit" value="Zatwierdź" name='confirm' id='confirm'>
        </form>
    </section>
</body>
</html>