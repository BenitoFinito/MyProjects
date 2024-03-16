<?php
session_start();
if (isset($_SESSION['auth']) && $_SESSION['auth'] === true) {
    echo 'Użytkownik jest zalogowany.<br>';
    print_r($_SESSION);
} else {
    echo 'Użytkownik nie jest zalogowany.';
}
?>