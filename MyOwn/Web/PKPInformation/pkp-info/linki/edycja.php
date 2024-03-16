<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST["logout"])){
    session_unset();
    session_destroy();
    header("Location: /pkp-info/pkp-info-glowna.php");
}
if($_SESSION["role"]<=1){
    header("Location: /pkp-info/pkp-info-glowna.php");
}
if(isset($_POST["powrot"])){
    header("Location: /pkp-info/pkp-info-glowna.php");
}
include($_SERVER['DOCUMENT_ROOT'] . '/pkp-info/connect.php');
include($_SERVER['DOCUMENT_ROOT'] . '/pkp-info/linki/config.php');
if($notconn == 1){
    session_destroy();
    header("Location: /pkp-info/pkp-info-glowna.php");
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Edycja</title>
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
                }
                if($_SESSION["role"]==2){ 
                    echo "<div id='rola1'>ADMIN</div>";
                }
                    ?>
                    <nav>
                        <form method='post'><input type='submit' class='opcja' value='Powrót do strony głównej' name='powrot'></form>
                    </nav>
        <form method="POST"><input type="submit" value="Wyloguj" name="logout" id="log"></form>
        <?php } ?>
        <img src='<?php echo "$fullPath"; ?>' alt='logo'>
        <h2><?php 
        echo "$nazwastrony";
        ?></h2>
    </header>
    <section id="main">
        <section id='nazlogo'>
            <form method='post' class='form' action='config.php'>
                <input type="text" name="nazwa_strony" maxlength="20" placeholder='Nowa nazwa strony' id='nazwa' required>
                <input type="submit" value="Zmień nazwę" name="zmien_nazwe" id='button'>
            </form>

            <form method='post' enctype="multipart/form-data" class='form' action='config.php'>
                <input type="file" name="logo" required>
                <input type="submit" value="Prześlij" name="przeslij_obraz" id='button'>
            </form>
        </section>
        <section>
            <form method='post' class='form1' action='/pkp-info/pkp-info-glowna.php'>
            <button type='submit' name='newwpis' id='pluswpis'>
                <div id='plusbutt'>
                    <div class="plus1"></div>
                    <div class="plus2"></div>
                </div>
                <div id='dodwpis'>Dodaj nowy wpis</div>
            </button>
            </form>
        </section>
    </section>
</body>
</html>