<?php
if(isset($_POST['DODAJ'])){

    $tytul = $_POST['tytul'];
    $gatunek = $_POST['gatunek'];
    $rok = $_POST['rok'];
    $ocena = $_POST['ocena'];

    $bc = mysqli_connect('localhost','root','','dane');

    $sql = "INSERT INTO filmy (tytul, gatunki_id, rok, ocena) VALUES ('$tytul', '$gatunek', '$rok', '$ocena')";

if (mysqli_query($bc, $sql)) {
    echo "Film " . $tytul . " został dodany do bazy";
}else{
    echo "Error";
}
mysqli_close($bc);
}
?>