<?php
session_start();
if (isset($_SESSION['auth']) && $_SESSION['auth'] === true) {
    include 'form.logout.html';
} else {
    include 'form.login.html';
}
?>