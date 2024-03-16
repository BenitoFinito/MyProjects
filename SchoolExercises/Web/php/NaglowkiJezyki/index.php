<?php
include_once('config.php');
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
</head>
<style>
    html {
        font-family: sans-serif;
        color: white;
        height: 100vh;
    }
    body{
        overflow: hidden;
        background-image: url('tlo.gif');
        background-position: center;
        background-size:cover;
        background-repeat: no-repeat;
    }
</style>

<body>

    <div>
        <h1>Witaj, kolego drogi.<br> Jesteś może zagubiony i szukasz drogi?
            <hr>
        </h1>
    </div>

    <div>
        <h2>Wybierz język, a znajdziesz się tam <br>tak szybko jak nikt inny raz dwa!</h2>
        <hr>
    </div>

    <div>
        <h3>Logowanie</h3>
        <form action="strona.php" method="get">
            <button type="submit">Wzywa cię</button><br><br>
            <hr>

            <label>
                Wybierz język, proszę cię:
                <select name="jezyki">
                    <option value="auto" selected>Auto</option>
                    <?php
                    foreach ($available_languages as $language) {
                        echo "<option value='$language'>$language</option>";
                    }
                    ?>
                </select>
            </label>
        </form>
    </div>

</body>

</html>