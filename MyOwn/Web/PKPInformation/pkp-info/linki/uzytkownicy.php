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
if($_SESSION["role"]<=1){
    header("Location: /pkp-info/pkp-info-glowna.php");
}
include($_SERVER['DOCUMENT_ROOT'] . '/pkp-info/connect.php');
require($_SERVER['DOCUMENT_ROOT'] . '/pkp-info/linki/config.php');
if($notconn == 1){
    session_destroy();
    header("Location: /pkp-info/pkp-info-glowna.php");
}
if(isset($_POST['deluser'])){
    $userid = $_POST['userid'];
    mysqli_query($conn, "DELETE FROM `users` WHERE `id`='$userid'");
}
if(isset($_POST['awans'])){
    $userid = $_POST['userid'];
    mysqli_query($conn,"UPDATE `users` SET `rola`=2 WHERE `id`='$userid'");
}
if(isset($_POST['degradacja'])){
    $userid = $_POST['userid'];
    mysqli_query($conn,"UPDATE `users` SET `rola`=1 WHERE `id`='$userid'");
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zarządzanie użytkownikami</title>
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
        <section id="tabela">
            <p class='first'>Na tej stronie możesz zarządzać użytkownikami.</p>
    <table border='1'>
    <tr><th>Użytkownik</th><th>Rola</th><th>Usuwanie</th><th>Zarządzanie rolą</th>
    <?php
    if($_SESSION['role']==3){
        $result=mysqli_query($conn, "SELECT `id`, `rola`, `login` FROM `users` WHERE `login`!='$loginsesji' AND `rola`!=3");
    }else{
        $result=mysqli_query($conn, "SELECT `id`, `rola`, `login` FROM `users` WHERE `login`!='$loginsesji' AND `rola`=1");
    }
        if (mysqli_num_rows($result)>0){
        
            while($row=mysqli_fetch_assoc($result)){
                if($row['rola'] == 1){
                    $rola = "Użytkownik";
                }elseif($row['rola'] == 2){
                    $rola = "Admin";
                }
                $user=$row['login'];
                echo "<tr>
                <form method='post'>
                      <td>$user<input type='hidden' name='userid' value='".$row['id']."'></td>
                      <td>$rola</td>
                        <td><input type='submit' value='Usuń' name='deluser' class='opcja'></td>";
                if($row['rola']==2){
                    echo "  <td><input type='submit' value='Zdegraduj' name='degradacja' class='opcja'></td>";
                }else{
                    echo "  <td><input type='submit' value='Awansuj' name='awans' class='opcja'></td>";
                }
                echo "</form></tr>";
            }
        }else{
            if($_SESSION["role"] == 3){
            echo "<tr><td colspan='4'>Jesteś jedynym użytkownikiem obecnie.</td></tr>";
            }elseif($_SESSION["role"] == 2){
            echo "<tr><td colspan='4'>Brak dalszych użytkowników.</td></tr>";
            }
        }   
    ?>
    </table>
        </section>
    </section>
</body>
</html>