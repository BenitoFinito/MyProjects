<?php
if(isset($_POST['log'])){
    echo $_POST['login'], "<br>", sha1($_POST['passwd']), "<br>";
    if(isset($_POST['remember'])){
        echo "Pole checkbox zostało zaznaczone.";
    }else{
        echo "Pole checkbox nie zostało zaznaczone.";
    }
}
?>