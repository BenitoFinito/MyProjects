<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
    Podaj liczbę do sprawdzenia najbliższej do niej wartości z tablicy:
    <input type="number" name='a' required min=0 max=100>
    <input type="submit" name="check" value="Sprawdź">
</form>
<?php
if(isset($_POST["check"])){
$tab[100];
$a = $_POST['a'];

for($i=0;$i < 100;$i++){
    $tab[$i] = rand() % 100 + 1;
}
 //Wypisanie w celu zweryfikowania.
 /*
for($i=1;$i-1 < 100;$i++){
    echo $tab[$i-1],"    |   ";
    if($i%10 == 0) echo "<br>";
}*/
$max = 0; $ile = 0; $n = 0; $ni = 0; $p = 0; $roz = 100; $roz1 = 100; $min = 100; $nt = 0; $j = 0;
for($i=0;$i < 100;$i++){
    if($tab[$i] > $max) $max = $tab[$i];
    if($tab[$i]% 2 == 1) $nie[$n++] = $tab[$i];
    if($i%2 == 1) $nieind[$ni++] = $tab[$i];
    if($tab[$i] >= 5 && $tab[$i] < 15) $prz[$p++] = $tab[$i];
    if($tab[$i]-$a < $roz && $tab[$i] > $a) {
        $roz = $tab[$i] - $a;
        $wysa = $tab[$i];
    }
    if($a - $tab[$i] < $roz1 && $tab[$i] < $a) {
        $roz1 = $a - $tab[$i];
        $nisa = $tab[$i];
    }
    if($a == $tab[$i]) $rowne = true;
    if($tab[$i] < $min){ 
        $min = $tab[$i];
        $mind = $i;
        if($mind-1 > 0) $bool = true;
        if($mind+1 < 100) $bool1 = true;
        $pop = $tab[$mind-1];
        $nan = $tab[$mind+1];
    }
    if($tab[$i] > 10) $newtab[$nt++] = $tab[$i];
}
echo "<br><br>Podana wartość: $a. "; 
if($rowne) echo "W tablicy istnieje taka sama wartość jak podana."; echo "<br>";
if($a > 1) echo "Najbliższa niższa wartość do podanej: $nisa. "; 
if($a < 100) echo "Najbliższa wyższa wartość do podanej: $wysa.";
echo "<br><br>";
for($i=0;$i < 100;$i++){
    if($max == $tab[$i]) $ile++;
}
echo "Największa liczba: ", $max, "<br> Ile razy wystąpiła: ", $ile, "<br><br>";
echo "Liczby nieparzyste: <br>";
for($i=1;$i-1 < $n;$i++){
    echo $nie[$i-1],"    |   ";
    if($i%10 == 0) echo "<br>";
}
echo "<br><br>Liczby o nieparzystych indeksach: <br>";
for($i=1;$i-1 < $ni;$i++){
    echo $nieind[$i-1],"    |   ";
    if($i%10 == 0) echo "<br>";
}
echo "<br><br>Liczby w przedziale <5,15): <br>";
for($i=1;$i-1 < $p;$i++){
    echo $prz[$i-1],"    |   ";
    if($i%10 == 0) echo "<br>";
}
echo "<br><br>";
if($bool) echo "Poprzednik najmniejszej wartości w tablicy: $pop. ";
if($bool1) echo "Następnik najmniejszej wartości w tablicy: $nan. ";
echo "<br><br>";
echo "Nowa tablica z wartościami większymi niż 10: <br>";
for($i=1;$i-1 < $nt;$i++){
    echo $newtab[$i-1],"    |   ";
    if($i%10 == 0) echo "<br>";
}
echo "<br><br>";
$tab1[100];
for($i=0;$i < 100;$i++){
    while($j <= $i){
    $tab1[$i] += $tab[$j++];
    }
    $j = 0;
}
echo "Druga tablica 100 elementowa: <br>";
for($i=1;$i-1 < 100;$i++){
    echo $tab1[$i-1],"    |   ";
    if($i%10 == 0) echo "<br>";
}
echo "<br><br>";
echo "Druga tablica posortowana malejąco: <br>";
rsort($tab1);

showArr($tab1);
//var_dump($tab1);

/*for($i=1;$i-1 < 100;$i++){
    echo $tab1[$i-1],"    |   ";
    if($i%10 == 0) echo "<br>";
}
*/
echo "<br><br>";
echo "Wartości, które wystąpiły przynajmniej 3 razy w tablicy: <br>";

rsort($tab);
$count = 0;
$previous =  array(0,0);
foreach ($tab as $key => $value) {
   //echo "element $key to wartosc: $value <br>";
    if ( $skip == $value ) {
        $count++;
        continue;
    }elseif($count >= 3){
            echo "Liczba ", $tab[$key - 1] , " wystąpiła $count razy.<br>";
        $count = 0;
    }
    if ( $tab[$key - 1] == $value && $tab[$key - 2] == $value ) {
        $skip = $value;
        $count = 3;
    }
}

}

function showArr($arr) {
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}

?>
</body>
</html>