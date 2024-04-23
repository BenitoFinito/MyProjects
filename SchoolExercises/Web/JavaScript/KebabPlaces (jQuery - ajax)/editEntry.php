<?php
header("Access-Control-Allow-Origin: *");

require('config.php');

$response = array();

$conn = new mysqli($host, $username, "");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->select_db($database);

$id = $_POST["id"];
$nazwa = $_POST["nazwa"];
$ocena = $_POST["ocena"];
$szerokosc = $_POST["szerokosc"];
$dlugosc = $_POST["dlugosc"];
$opis = $_POST["opis"];

$nazwa = mysqli_real_escape_string($conn, $nazwa);
$opis = nl2br($opis);
$opis = mysqli_real_escape_string($conn, $opis);

$sql = "UPDATE kebaby SET nazwa='$nazwa', ocena='$ocena', szerokosc='$szerokosc', dlugosc='$dlugosc', opis='$opis' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    $response["status"] = "success";
} else {
    $response["status"] = "error";
    $response["message"] = "Błąd podczas aktualizacji danych: " . $conn->error;
}

$conn->close();

echo json_encode($response);
?>
