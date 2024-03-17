<?php
if(isset($_POST["wyslij"])){
    $tlo = $_POST['tlo'];
    $tekst = $_POST['tekst'];
    $lentlo = strlen($tlo);
    $lentekst = strlen($tekst);


    if($lentlo < 6){
        $addzero = "";
        while(strlen($addzero) < (6-$lentlo)){
            $addzero .= "0";
        }
    }
    if($lentekst < 6){
        $addzero1 = "";
        while(strlen($addzero1) < (6-$lentekst)){
            $addzero1 .= "0";
        }
    }
    echo "Kolor tła: $addzero$tlo<br>";
    echo "Kolor tekstu: $addzero1$tekst";

}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Kolory</title>
</head>
<style>
    p{
        height: 50%;
        width: 50%;
        border: dashed 2px red;
        margin-left:auto;
        margin-right: auto;
        margin-top: 50px;
        background-color: <?php echo "$addzero$tlo" ?>;
        color: <?php echo "$addzero1$tekst" ?>;
    }
</style>
<body>
    <p>Beniamin Gnatowski</p>
</body>
</html>