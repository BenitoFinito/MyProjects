<?php
header("Access-Control-Allow-Origin: *");

require('config.php');

$response = array();

$conn = new mysqli($host, $username, "");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $database CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
if ($conn->query($sql) === TRUE) {
    $response["db_status"] = "success";
    $response["database_message"] = "Baza danych została utworzona lub już istnieje.";
} else {
    $response["db_status"] = "error";
    $response["database_message"] = "Błąd tworzenia bazy danych: " . $conn->error;
}
$conn->select_db($database);

$sql = "CREATE TABLE IF NOT EXISTS kebaby (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nazwa VARCHAR(255) NOT NULL,
    ocena INT(1) NOT NULL,
    szerokosc FLOAT(10, 6) NOT NULL,
    dlugosc FLOAT(10, 6) NOT NULL,
    opis TEXT
)";

if ($conn->query($sql) === TRUE) {
    $response["tb_status"] = "success";
    $response["table_message"] = "Tabela została utworzona lub już istnieje.";
} else {
    $response["tb_status"] = "error";
    $response["table_message"] = "Błąd tworzenia tabeli: " . $conn->error;
}

$nazwa = $_POST["nazwa"];
$ocena = $_POST["ocena"];
$szerokosc = $_POST["szerokosc"];
$dlugosc = $_POST["dlugosc"];
$opis = $_POST["opis"];

$nazwa = mysqli_real_escape_string($conn, $nazwa);
$opis = nl2br($opis);
$opis = mysqli_real_escape_string($conn, $opis);

$sql = "INSERT INTO kebaby (nazwa, ocena, szerokosc, dlugosc, opis)
VALUES ('$nazwa', '$ocena', '$szerokosc', '$dlugosc', '$opis')";

if ($conn->query($sql) === TRUE) {
    $response["sd_status"] = "success";
    $response["send_message"] = "Dane zostały dodane do bazy danych";
} else {
    $response["sd_status"] = "error";
    $response["send_message"] = "Błąd podczas dodawania danych do bazy danych: " . $conn->error;
}

// $output = array(
//     "Name" => "$nazwa",
//     "Rating" => "$ocena",
//     "Latitude" => "$szerokosc",
//     "Longitude" => "$dlugosc",
//     "Description" => "<br>$opis"
// );

$conn->close(); 

$json = json_encode($response);
echo $json;
?>