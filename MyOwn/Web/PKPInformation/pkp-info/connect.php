<?php
$notconn = 0;
$baza = "pkp_baza";

try {
    $conn = @mysqli_connect("localhost", "root", "");
}
catch (mysqli_sql_exception $e) {
    $notconn = 1;
    $errorMessage = $e->getMessage();
    $_SESSION['zalogowany'] = -1;
    $_SESSION['zarejestrowany'] = -1;
    $_SESSION['role'] = 0;
    return;
}
try{
    mysqli_select_db($conn, $baza);
}
catch(mysqli_sql_exception $f){

    // Jeśli baza danych nie istnieje, utwórz ją
    $create_db_query = "CREATE DATABASE $baza";
    mysqli_query($conn, $create_db_query);
    mysqli_select_db($conn, $baza);
    
    // Tworzenie tabeli 'comments'
    $create_comments_table_query = "CREATE TABLE `comments` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `User` varchar(22) NOT NULL,
        `kom` text NOT NULL,
        `data_komentarza` timestamp NOT NULL DEFAULT current_timestamp(),
        `edytowany` bit(1) DEFAULT b'0',
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";
    mysqli_query($conn, $create_comments_table_query);

    // Tworzenie tabeli 'pkp_dane'
    $create_pkp_dane_table_query = "CREATE TABLE `pkp_dane` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `Data_wpisu` timestamp NOT NULL DEFAULT current_timestamp(),
        `Numer_pociągu` int(6) UNSIGNED NOT NULL,
        `Nazwisko_maszynisty` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
        `Data_odjazdu` datetime NOT NULL COMMENT 'data i czas',
        `Szacunkowy_czas_dojazdu` time NOT NULL,
        `Opóźnienie` smallint(3) UNSIGNED NOT NULL COMMENT 'W minutach',
        `Nazwa_przewoźnika` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";
    mysqli_query($conn, $create_pkp_dane_table_query);

    // Tworzenie tabeli 'users'
    $create_users_table_query = "CREATE TABLE `users` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `rola` enum('1','2','3') COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Rola: 1-zwykły user 2-admin 3-pierwszy admin',
        `login` varchar(22) COLLATE utf8mb4_general_ci NOT NULL,
        `passwd` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Zahaszowane hasło',
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Rola:'";
    mysqli_query($conn, $create_users_table_query);
}
try {
    $conn = mysqli_connect("localhost", "root", "", "$baza");
}
catch (mysqli_sql_exception $e) {
        $notconn = 1;
        $errorMessage = $e->getMessage();
        $_SESSION['zalogowany'] = -1;
        $_SESSION['zarejestrowany'] = -1;
        $_SESSION['role'] = 0;
        return;
}

//Dalsza część kodu jest dlatego, że jest starsza wersja czegoś i nie akceptuje użycia try
$conn = @mysqli_connect("localhost", "root", "");
if(!$conn){
    $notconn = 1;
    $errorMessage = $e->getMessage();
    $_SESSION['zalogowany'] = -1;
    $_SESSION['zarejestrowany'] = -1;
    $_SESSION['role'] = 0;
    return;
}
if(!mysqli_select_db($conn, $baza)){
    $create_db_query = "CREATE DATABASE $baza";
    mysqli_query($conn, $create_db_query);
    mysqli_select_db($conn, $baza);
    
    $create_comments_table_query = "CREATE TABLE `comments` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `User` varchar(22) NOT NULL,
        `kom` text NOT NULL,
        `data_komentarza` timestamp NOT NULL DEFAULT current_timestamp(),
        `edytowany` bit(1) DEFAULT b'0',
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";
    mysqli_query($conn, $create_comments_table_query);

    $create_pkp_dane_table_query = "CREATE TABLE `pkp_dane` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `Data_wpisu` timestamp NOT NULL DEFAULT current_timestamp(),
        `Numer_pociągu` int(6) UNSIGNED NOT NULL,
        `Nazwisko_maszynisty` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
        `Data_odjazdu` datetime NOT NULL COMMENT 'data i czas',
        `Szacunkowy_czas_dojazdu` time NOT NULL,
        `Opóźnienie` smallint(3) UNSIGNED NOT NULL COMMENT 'W minutach',
        `Nazwa_przewoźnika` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";
    mysqli_query($conn, $create_pkp_dane_table_query);

    $create_users_table_query = "CREATE TABLE `users` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `rola` enum('1','2','3') COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Rola: 1-zwykły user 2-admin 3-pierwszy admin',
        `login` varchar(22) COLLATE utf8mb4_general_ci NOT NULL,
        `passwd` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Zahaszowane hasło',
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Rola:'";
    mysqli_query($conn, $create_users_table_query);
}
$conn = mysqli_connect("localhost", "root", "", "$baza");
if(!$conn){
    $notconn = 1;
    $errorMessage = $e->getMessage();
    $_SESSION['zalogowany'] = -1;
    $_SESSION['zarejestrowany'] = -1;
    $_SESSION['role'] = 0;
    return;
}
?>