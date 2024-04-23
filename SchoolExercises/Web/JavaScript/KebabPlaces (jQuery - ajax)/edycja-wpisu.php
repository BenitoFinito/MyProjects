<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="kebabownia.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css">
    <style>
        #map {
            height: 300px;
            width: 100%;
        }
    </style>
    <title>Kebabownia</title>
</head>
<body>
<div class="tlo"></div>
<div class="header">
    <div>
        <h1 style="margin: 0"><a href="./">Kebabownia</a></h1>
        <h3 style="margin: 0">Zapisuj swoje ulubione kebabownie</h3>
    </div>
</div>
<div class="form">
    <label>
        Podaj nazwę lokalu: <br />
        <ul>
            <li>
                <label>
                    <input type="text" id="nazwa" placeholder="Nazwa" />
                </label>
            </li>
        </ul>
    </label>
    <label>
        Podaj ocenę lokalu: <br />
        <ul>
            <li>
                <label>
                    <label class="ocena">
                        1<input type="radio" id="ocena" name="ocena" value="1" />
                    </label>
                    <label class="ocena">
                        2<input type="radio" id="ocena" name="ocena" value="2" />
                    </label>
                    <label class="ocena">
                        3<input type="radio" id="ocena" name="ocena" value="3" />
                    </label>
                    <label class="ocena">
                        4<input type="radio" id="ocena" name="ocena" value="4" />
                    </label>
                    <label class="ocena">
                        5<input type="radio" id="ocena" name="ocena" value="5" />
                    </label>
                </label>
            </li>
        </ul>
    </label>
    <label>
        Podaj miejsce lokalu: <br />
        <div id="map">
            <div id="coordinates">Szerokość: 0, Długość: 0</div>
        </div>
    </label>
    <label>
        Podaj opis lokalu: <br />
        <ul>
            <li>
                <label>
                    Opis: <br />
                    <textarea id="opis" style="width: 500px; height: 160px"></textarea>
                </label>
            </li>
        </ul>
    </label>
    <label>
        <button id="przycisk">Zapisz zmiany</button>
    </label>
</div>

<script>
    var urlLocal = "http://localhost/Zadanie15/";
    var entryId = <?php echo isset($_GET['id']) ? $_GET['id'] : 'null'; ?>;
    var latitude, longitude;

    var map = L.map("map", {
        maxBounds: [
            [-70, -180],
            [90, 180],
        ],
        maxBoundsViscosity: 1.0,
        minZoom: 2,
    }).setView([0, 0], 2);

    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution:
            '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    }).addTo(map);

    var marker;

    var coordinatesDiv = document.getElementById("coordinates");

    map.on("click", function (e) {
        latitude = e.latlng.lat.toFixed(6);
        longitude = e.latlng.lng.toFixed(6);
        coordinatesDiv.innerHTML =
            "Szerokość: " + latitude + ", Długość: " + longitude;
        coordinatesDiv.style.display = "block";

        if (marker) {
            map.removeLayer(marker);
        }

        marker = L.marker([latitude, longitude]).addTo(map);
    });

    $(document).ready(function () {
        if (entryId !== null) {
            $.ajax({
                url: urlLocal + "getEntry.php",
                method: "post",
                data: {id: entryId},
                dataType: "json",
                success: function (response) {
                    var data = response.data;
                    $("#nazwa").val(data.nazwa);
                    $("input[name='ocena'][value='" + data.ocena + "']").prop("checked", true);
                    var opis = data.opis.replace(/<br \/>/g, "");
                    $("#opis").val(opis);
                    latitude = data.szerokosc;
                    longitude = data.dlugosc;
                    coordinatesDiv.innerHTML =
                        "Szerokość: " + latitude + ", Długość: " + longitude;
                    coordinatesDiv.style.display = "block";

                    if (marker) {
                        map.removeLayer(marker);
                    }

                    marker = L.marker([latitude, longitude]).addTo(map);
                    map.setView([latitude, longitude], 15);
                },
                error: function (xhr, status, error) {
                    Swal.fire({
                        icon: "error",
                        title: "Błąd!",
                        text: "Wystąpił błąd podczas pobierania danych do edycji.",
                    });
                    console.log(xhr.responseText, status, error);
                },
            });
        }
    });

    $("#przycisk").click(function () {
        var nazwa = $("#nazwa").val();
        var szerokosc = latitude;
        var dlugosc = longitude;
        var ocena = $("input[name='ocena']:checked").val();
        var opis = $("#opis").val();

        var pustePola = [];

        if (nazwa.trim() === "") {
            pustePola.push("Nazwa");
        }
        if (ocena === undefined) {
            pustePola.push("Ocena");
        }
        if (szerokosc === undefined || dlugosc === undefined) {
            pustePola.push("Miejsce");
        }
        if (opis.trim() === "") {
            pustePola.push("Opis");
        }

        if (pustePola.length > 0) {
            var komunikat =
                "Następujące pola muszą być wypełnione:<br>" +
                pustePola.join("<br>");
            Swal.fire({
                icon: "error",
                title: "Uzupełnij wszystkie pola",
                html: komunikat,
            });
            return;
        }

        console.log(urlLocal + "editEntry.php", {
            id: entryId,
            nazwa: nazwa,
            szerokosc: szerokosc,
            dlugosc: dlugosc,
            ocena: ocena,
            opis: opis,
        });

        $.ajax({
            url: urlLocal + "editEntry.php",
            data: {
                id: entryId,
                nazwa: nazwa,
                szerokosc: szerokosc,
                dlugosc: dlugosc,
                ocena: ocena,
                opis: opis,
            },
            method: "post",
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    Swal.fire({
                        icon: "success",
                        title: "Sukces!",
                        text: "Dane zostały zaktualizowane.",
                        confirmButtonText: "Przejdź do strony głównej",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "./";
                        }
                    });
                    console.log("Dane zostały zaktualizowane.");
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Błąd!",
                        text: "Wystąpił błąd podczas aktualizacji danych.",
                    });
                    console.log("Wystąpił błąd podczas aktualizacji danych.");
                }
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    icon: "error",
                    title: "Błąd!",
                    text: "Wystąpił błąd podczas przesyłania danych.",
                });
                console.log(xhr.responseText, status, error);
            },
        });
    });
</script>
</body>
</html>