<?php
$defaultLanguage = 'en';

$dir = './i18n/';

$available_languages = array_map('basename', glob($dir . '*.xml'));
foreach($available_languages as &$a){
    $a = substr($a,0,2);
}
?>