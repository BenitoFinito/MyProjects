<?php
session_start();

if(isset($_POST['login']) && isset($_POST['passwd'])){
    $login = $_POST['login'];
    $haslo = $_POST['passwd'];

    if($login == 'admin' && $haslo == 'admin1'){
        $_SESSION['auth'] = true;
        header("Location: index.php");
    }else{
        echo "Błędny login lub hasło. Spróbuj ponownie.";
    }
}
?>