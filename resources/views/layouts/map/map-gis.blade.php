<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <title>Document</title>
</head>

<body>
    <div class="text-center">
        <div id="map" style="height: 95vh; width: 100%;"></div>
    </div>
</body>

</html>


<script>
    // var map = L.map('map').setView([-7.789365453902131, 110.36420494336112], 13);

    // var map = L.map('map').setView([-7.742404393062417, 110.27684935071042], 13); (JOGJA DEFAULT)

    var map = L.map('map').setView([-7.677718722836917, 108.64768251433698], 13);

    // google street
    L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 15,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(map);


    var popup = L.popup();

    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent("You clicked the map at " + e.latlng.toString())
            .openOn(map);
    }

    map.on('click', onMapClick);

    map.on('click', (e) => {
        const longtitude = e.latlng.lat
        const lattitude = e.latlng.lng

        console.log({
            longtitude,
            lattitude
        });
        $("#Longtitude").val(longtitude);
        $("#Lattitude").val(lattitude);
    })
</script>