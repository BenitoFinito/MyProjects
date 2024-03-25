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

$sql = "DELETE FROM kebaby WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    $response["success"] = "true";
} else {
    $response["success"] = "false";
}

$conn->close();

$json = json_encode($response);
echo $json;
?>
