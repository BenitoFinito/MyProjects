<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include($_SERVER['DOCUMENT_ROOT'] . '/pkp-info/connect.php');
if(isset($_POST['zmien_nazwe'])){
    $nazwastrony = $_POST['nazwa_strony'];
    $_SESSION['nazwa_strony'] = $nazwastrony;
    $plik = 'nazwa_strony.txt';
    file_put_contents($plik, $nazwastrony);
    header("Location: edycja.php");
}
$plik = $_SERVER['DOCUMENT_ROOT'] . '/pkp-info/linki/nazwa_strony.txt';
if(file_exists($plik) && filesize($plik) > 0) {
    $nazwastrony = file_get_contents($plik);
    $nazwastrony = mb_substr($nazwastrony, 0, 20);
    $_SESSION['nazwa_strony'] = $nazwastrony;
}elseif (isset($_SESSION['nazwa_strony'])) {
    $nazwastrony = $_SESSION['nazwa_strony'];
    file_put_contents($plik, $nazwastrony);
}else{
    // Domyślna wartość, jeśli plik nie istnieje
    $nazwastrony = 'PKP-INFO';
}
if(isset($_POST['przeslij_obraz'])){
    if ($_FILES['logo']['error'] === UPLOAD_ERR_OK) {
        $logoPaths = [
            $_SERVER['DOCUMENT_ROOT'] . '/pkp-info/logo.jpeg',
            $_SERVER['DOCUMENT_ROOT'] . '/pkp-info/logo.jpg',
            $_SERVER['DOCUMENT_ROOT'] . '/pkp-info/logo.png'
        ];

        foreach ($logoPaths as $path) {
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
      $sourceFile = $_FILES['logo']['tmp_name'];
      $extension = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
      $destinationFile = $_SERVER['DOCUMENT_ROOT'] . '/pkp-info/logo.' . $extension;

      $sciezkaplik = 'sciezka_logo.txt';
      file_put_contents($sciezkaplik, $destinationFile);

      $allowedFormats = ['jpeg', 'png', 'jpg'];
      
      if (in_array($extension, $allowedFormats)) {
        if (move_uploaded_file($sourceFile, $destinationFile)) {
          echo "Plik został przesłany i skopiowany jako logo." . $extension;
          header("Location: edycja.php");
        } else {
          echo "Błąd podczas kopiowania pliku.";
          header("Location: edycja.php");
        }
      } else {
        echo "Nieprawidłowe rozszerzenie pliku. Dozwolone rozszerzenia to JPEG i PNG.";
        header("Location: edycja.php");
      }
    } else {
      echo "Wystąpił błąd podczas przesyłania pliku.";
      header("Location: edycja.php");
    }
}
$sciezkaplik = $_SERVER['DOCUMENT_ROOT'] . '/pkp-info/linki/sciezka_logo.txt';

if (file_exists($sciezkaplik) && filesize($sciezkaplik) > 0) {
    $destinationFile = file_get_contents($sciezkaplik);
} else {
    $logoPaths = [
        $_SERVER['DOCUMENT_ROOT'] . '/pkp-info/logo.jpeg',
        $_SERVER['DOCUMENT_ROOT'] . '/pkp-info/logo.jpg',
        $_SERVER['DOCUMENT_ROOT'] . '/pkp-info/logo.png'
    ];

    foreach ($logoPaths as $path) {
        if (file_exists($path)) {
            $destinationFile = $path;
            break;
        }
    }

    if (!isset($destinationFile)) {
        $destinationFile = '';
    }
}

if (!empty($destinationFile)) {
    $fullPath = 'http://localhost' . str_replace($_SERVER['DOCUMENT_ROOT'], '', $destinationFile);
} else {
    echo 'Brak pliku logo.';
}
?>