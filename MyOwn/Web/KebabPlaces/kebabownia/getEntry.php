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

$sql = "SELECT * FROM kebaby WHERE id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response["status"] = "success";
    $response["data"] = $row;
} else {
    $response["status"] = "error";
    $response["message"] = "Nie znaleziono wpisu o podanym identyfikatorze.";
}

$conn->close();

$json = json_encode($response);
echo $json;
?>
