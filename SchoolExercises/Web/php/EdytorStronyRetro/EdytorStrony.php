<?php
    session_start();
    
    if (isset($_POST["tekst"]) && isset($_POST["kolorek"]))
    {
        $size=$_POST["size"]."px";
        $opis=$_POST["cv"];
        $text=$_POST["tekst"];
        $kolor=$_POST["kolorek"];
        $dik=$_POST["dik"];
        $dis=$_POST["dis"]."px";
        $ktytul=$_POST["kolortytul"];
        $divh=$_POST["divh"]."px";
        $divw=$_POST["divw"]."px";
        $marg=$_POST["margines"]."px";
        $divs=$_POST["divs"];
        $border=$_POST["border"];
        $bkol=$_POST["bkol"];
        $bor=$_POST["bor"]."px";
        $pep=$_POST["pep"];
        $brd=$_POST["bord"];
        $czc=$_POST["czcionka"];
        $aah=$_POST["goofy"];
        echo "<h2 style='color: $ktytul; font-size: $size; text-align: $pep; font-family:$czc;'>$text<h2>";
        
    if(isset($_POST["centr"])){
        if(isset($_POST["float"])){
            $float=$_POST["float"];
            $flt=$_POST["flt"];
            for ($i = 0; $i < $divs; $i++){
                echo "<div style='background-color: $kolor; color: $dik; font-size: $dis; height: $divh; width: $divw; margin: $marg; float: $flt; display: grid; place-items: center; border$brd:$border $bkol $bor; font-family:$czc; $aah'>$opis</div>";
            }
        }
        else
        {
            for ($i = 0; $i < $divs; $i++){
                echo "<div style='background-color: $kolor; color: $dik; font-size: $dis; height: $divh; width: $divw; margin: $marg; display: grid; place-items: center; border$brd:$border $bkol $bor;font-family:$czc;$aah'>$opis</div>";
            }
        }
    
    }
    else{
        if(isset($_POST["text-align"])){
            $txa=$_POST["tx-a"];
            $textalign=$_POST["text-align"];
            if(isset($_POST["float"])){
                $float=$_POST["float"];
                $flt=$_POST["flt"];
                for ($i = 0; $i < $divs; $i++){
                    echo "<div style='background-color: $kolor; color: $dik; font-size: $dis; height: $divh; width: $divw; margin: $marg; float: $flt; text-align: $txa; border$brd:$border $bkol $bor;font-family:$czc;$aah'>$opis</div>";
                }
            }
            else
            {
            for ($i = 0; $i < $divs; $i++){
                echo "<div style='background-color: $kolor; color: $dik; font-size: $dis; height: $divh; width: $divw; margin: $marg; text-align: $txa; border$brd:$border $bkol $bor;font-family:$czc;$aah'>$opis</div>";
            }
            }
        }
        else{
            if(isset($_POST["float"])){
                $float=$_POST["float"];
                $flt=$_POST["flt"];
                for ($i = 0; $i < $divs; $i++){
                    echo "<div style='background-color: $kolor; color: $dik; font-size: $dis; height: $divh; width: $divw; margin: $marg; float: $flt; display: grid; place-items: center; border$brd:$border $bkol $bor;font-family:$czc;$aah'>$opis</div>";
                }
            }
            else
            {
                for ($i = 0; $i < $divs; $i++){
                    echo "<div style='background-color: $kolor; color: $dik; font-size: $dis; height: $divh; width: $divw; margin: $marg; border$brd:$border $bkol $bor;font-family:$czc;$aah'>$opis</div>";
                }
            }
        }
    }
if(isset($_FILES['background-image'])){
    $errors= array();
    $file_name = $_FILES['background-image']['name'];
    $file_size =$_FILES['background-image']['size'];
    $file_tmp =$_FILES['background-image']['tmp_name'];
    $file_type=$_FILES['background-image']['type'];   
    $tmp = explode('.',$_FILES['background-image']['name']);
    $file_ext = end($tmp);
    $extensions = array("png");        
    if(in_array($file_ext,$extensions )=== false){
        $errors[]="extension not allowed, please choose a PNG file.";
    }
    if($file_size > 2097152){
        $errors[]='File size must be excately 2 MB';
    }               
    if(empty($errors)==true){
        $oldFile = "background-image.png";
        if (file_exists($oldFile)) {
            unlink($oldFile);
        }
        move_uploaded_file($file_tmp,"background-image.".$file_ext);
        $bgImg = "background-image.png";
    }else{
        print_r($errors);
    }
}
$_SESSION['bg_image'] = true;

        $amogus=$_POST["prawko"];
        

        if($amogus == "yes"){
        echo "<div style='background-color: red;
            border-right: 5px solid black;
            border-left: 5px solid black;
            border-top: 5px solid black;
            clear: left;
            height: 210px;
            width: 180px;
            margin-left: 320px;
            border-top-left-radius: 80px;
            border-top-right-radius: 50px;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 7px;
            position: relative;'>
        <div style='background-color: red;
            height: 140px;
            width: 50px;
            margin-left: 180px;
            margin-bottom: 12px;
            position: absolute; bottom: 0;
             5px solid black;
            border-top-right-radius: 40px;
            border-bottom-right-radius: 30px;'></div>
        <div style='background-color: cyan;
             5px solid black;
            height: 70px;
            width: 140px;
            margin-left: -30px;
            margin-top: 30px;
            border-top-left-radius: 60px;
            border-top-right-radius: 30px;
            border-bottom-left-radius: 40px;
            border-bottom-right-radius: 30px;'></div>
        <div style='height: 70px;
            width: 180px;
            position: absolute; bottom: 0;'>
        <div style='background-color: red;
            height: 100px;
            width: 60px;
            border-right: 5px solid black;
            border-left: 5px solid black;
            border-bottom: 5px solid black;
            margin-top: 67px;
            margin-left: 5px;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            float: left;'></div>
        <div style='background-color: red;
            height: 100px;
            width: 60px;
            border-right: 5px solid black;
            border-left: 5px solid black;
            border-bottom: 5px solid black;
            margin-top: 67px;
            margin-left: 0px;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            float: right;'></div>
        <div style='border-bottom: 5px solid black;
            width: 35px;
            float: left;
            height:67px;'></div>
            </div>
            </div>";        
        }
    } elseif (isset($_SESSION['bg_image'])) {
        unset($_SESSION['bg_image']);
    }
    
    ?>
<html>
<head>
    <title>Edytor strony retro</title>
</head>
<style>
    body{
    <?php if (isset($_SESSION['bg_image'])) { ?>
    background-image: url('<?php echo $bgImg; ?>');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    background-position: center;
    <?php } ?>
    }
</style>
<body>
    <?php
    if (isset($_POST["tekst"]) && isset($_POST["kolorek"])){
    }else{
    ?>
    <form action="PH.php" method="post" enctype="multipart/form-data">
    <span style="color: blue; font-size: 20px; font-weight: bold;">Chcesz włączyć tryb amogus? Najlepiej działa bez żadnych innych wartości.</span>
            <span style="color: green; font-size: 20px; font-weight: bold;"><input type="radio" name="prawko" value="yes" style="height: 20px; width: 20px;"> Tak </span>
            <span style="color: red; font-size: 20px; font-weight: bold;"><input type="radio" name="prawko" value="no" style="height: 20px; width: 20px;" checked> Nie </span><br> 
        
        
        Wpisz tekst tytułowy strony jaki ma się pojawić: <input type="text" name="tekst" ><br>
        Podaj wielkość tekstu tytułowego: <input type="number" name="size"><br>
        Wycentrować  tekst tytułowy? <input type="radio" name="pep" value="center"> Tak <input type="radio" name="pep" value="none" checked>Nie <br>
        Kolor tekstu tytułowego: <input type="color" name="kolortytul"><br>
        Podaj liczbę divów: <input type="number" name="divs">
        Podaj wysokość divów: <input type="number" name="divh">
        Podaj szerokość divów: <input type="number" name="divw"><br>
        Wybierz rozmiar marginesu ze wszystkich stron: <br>
            0px <input type="range" min="0" max="100" value="100" name="margines">100px<br>

        Podaj wielkość tekstu w divach: <input type="number" name="dis"><br>
        Wpisz tekst, jaki ma się pojawić w środku divów: <textarea name="cv"></textarea><br>
        Bonus do czcionek <br>
        (tylko divy + pochylenie tylko z pogrubieniem <br>
        działa lub bez + kreślenia ze sobą nie działają):<br>
        <select name="goofy" size="3" multiple>
                <option value="font-weight: bold;">Pogrubienie</option>
                <option value="font-style: italic;">Pochylenie</option>
                <option value="text-decoration: underline;">Podkreślenie</option>
                <option value="text-decoration: line-through;">Przekreślenie</option>
                <option value="text-decoration: overline;">Nadkreślenie</option>
                <option value="text-decoration: red wavy underline;">Podkreślenie falowane (na czerwono)</option>
                <option value="text-decoration: underline overline;">Podkreślenie i nadkreślenie</option>
                <option value="text-decoration: underline dotted;">Podkreślenie kropkowane</option>
                <option value="" selected>Brak</option>
            </select>
        
        Kolor tła divów: <input type="color" name="kolorek"> Kolor tekstu divów: <input type="color" name="dik"><br>
        Dodatkowe opcje do divów:<Br>
            <input type="checkbox" name="float"> float: <input type="text" name="flt"><br>
            <input type="checkbox" name="text-align"> text-align: <input type="text" name="tx-a"><br>
            <input type="checkbox" name="centr"> Wyśrodkowanie w pionie i w poziomie tekstu (najlepiej działa bez powyższej opcji włączonej).<br>
        Border divów:
            <select name="border">
                <option value="none " selected>Brak</option>
                <option value="dashed ">Przerywana linia</option>
                <option value="dotted ">Kropkowany</option>
                <option value="solid ">Pełne</option>
                <option value="double ">Podwójna linia ciągła</option>
            </select>
        Który bok:
        <select name="bord" size="3">
                <option value="" selected>Wszystkie</option>
                <option value="-top">Górny</option>
                <option value="-bottom"> Dolny</option>
                <option value="-left">Lewy</option>
                <option value="-right">Prawy</option>
            </select>
        Grubość borderu w px: <input type="number" name="bor">
        Kolor borderu: <input type="color" name="bkol"><br>

            Tło strony: <input type="file" name="background-image"><br>
            
            Czcionka tekstu na całej stronie: 
            <select name="czcionka" size="8">
                <option value="Arial" selected>Arial</option>
                <option value="Helvetica">Helvetica</option>
                <option value="Verdana">Verdana</option>
                <option value="Trebuchet MS">Trebuchet MS</option>
                <option value="Gill Sans">Gill Sans</option>
                <option value="Noto Sans">Noto Sans</option>
                <option value="Avantgarde">Avantgarde</option>
                <option value="Arial Narrow">Arial Narrow</option>
                <option value="Times New Roman">Times New Roman</option>
                <option value="Didot">Didot</option>
                <option value="Georgia">Georgia</option>
                <option value="Palatino">Palatino</option>
                <option value="Bookman">Bookman</option>
                <option value="New Century Schoolbook">New Century Schoolbook</option>
                <option value="American Typewriter">American Typewriter</option>
                <option value="Andale Mono">Andale Mono</option>
                <option value="Courier New">Courier New</option>
                <option value="Courier">Courier</option>
                <option value="FreeMono">FreeMono</option>
                <option value="OCR A Std">OCR A Std</option>
                <option value="DejaVu Sans Mono">DejaVu Sans Mono</option>
                <option value="Comic Sans MS">Comic Sans MS</option>
                <option value="Apple Chancery">Apple Chancery</option>
                <option value="Bradley Hand">Bradley Hand</option>
                <option value="Brush Script MT">Brush Script MT</option>
                <option value="Snell Roundhand">Snell Roundhand</option>
                <option value="URW Chancery L">URW Chancery L</option>
                <option value="Impact">Impact</option>
                <option value="Luminari">Luminari</option>
                <option value="Jazz LET">Jazz LET</option>
                <option value="Marker Felt">Marker Felt</option>
                <option value="Trattatello">Trattatello</option>
                <option value="sans-serif">sans-serif</option>
                <option value="serif">serif</option>
                <option value="monospace">monospace</option>
                <option value="cursive">cursive</option>
                <option value="fantasy">fantasy</option>
            </select><br>
                
        <input type="submit" value="Stwórz" style="height: 100px; width: 200px; font-size: 60px; margin-left: 40%;">
    </form>
    <?php
    }
    ?>
</body>
</html>