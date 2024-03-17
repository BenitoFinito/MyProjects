<?php
if(isset($_POST['wyslij'])){
    $lista = $_POST['lista'];
    $radio = $_POST['radio'];
    $auto = $_POST['auto'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Wybrane samochody:
<?php 
    echo "<ul>";
    for($i=0;$i<count($lista);$i++){
      echo "<li>".$lista[$i]."</li>";
    }
    echo "</ul>";
?>
    Wybrana przekładnia: <br>
    <ul><li>
    <?php 
      echo $radio;
    ?>
    </ul></li>
    Wybrany drogi samochód: <br>
    <?php 
      echo "<ul>";
      for($i=0;$i<3;$i++){
      if(isset($auto[$i])){
        echo "<li>".$auto[$i]."</li>";
      }
    }
      echo "</ul>";
    ?>
</body>
</html>