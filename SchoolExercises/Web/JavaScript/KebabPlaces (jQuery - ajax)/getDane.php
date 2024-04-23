<?php
header("Access-Control-Allow-Origin: *");

require('config.php');

$conn = new mysqli($host, $username, "", $database);

if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}

$sql = "SELECT * FROM kebaby";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $entries = array();

    while ($row = $result->fetch_assoc()) {
        $entries[] = $row;
    }

    $conn->close();

    echo json_encode($entries);
} else {
    echo json_encode(array());
}
?>