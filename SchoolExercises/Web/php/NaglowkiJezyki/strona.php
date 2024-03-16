<style>
    html {
        font-family: sans-serif;
        color: white;
        height: 100vh;
    }
    body{

        overflow: hidden;
        background-image: url('tlo.gif');
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>
<?php
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $preferred_language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    if ($_GET['jezyki'] !== 'auto') {
        $jezyk = $_GET['jezyki'];
        setcookie('wybrany_jezyk', $jezyk, time() + 7 * 24 * 60 * 60, '/');
    } else {
        if(isset($_COOKIE['wybrany_jezyk'])) $jezyk = $_COOKIE['wybrany_jezyk'] !== 'auto' ? $_COOKIE['wybrany_jezyk'] : $preferred_language;
        else $jezyk = $preferred_language;
    }
    $jezyk = $jezyk . '.xml';

    $plik_jezykowy = $dir . $jezyk;

    if (file_exists($plik_jezykowy)) {
        $xml = simplexml_load_file($plik_jezykowy);

        foreach ($xml->string as $string) {
            echo "<p>" . $string . "</p>";
        }
    } else {
        $xml = simplexml_load_file($dir . $defaultLanguage . '.xml');

        foreach ($xml->string as $string) {
            echo "<p>" . $string . "</p>";
        }
    }
}
