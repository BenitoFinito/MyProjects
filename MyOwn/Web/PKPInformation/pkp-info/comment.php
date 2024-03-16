<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include($_SERVER['DOCUMENT_ROOT'] . '/pkp-info/connect.php');
if (isset($_POST["skomentuj"])){
    $loginsesji = $_SESSION["twojLogin"];
    $tresc = $_POST["kom"];
    mysqli_query($conn, "INSERT INTO `comments` (`User`,`kom`) VALUES ('$loginsesji','$tresc')");
    header("Location: pkp-info-glowna.php");
}elseif(isset($_POST['anuluj'])){
    header("Location: pkp-info-glowna.php");
}else{
header("Location: logreg/logowanie-rejestracja.php");
}
?>