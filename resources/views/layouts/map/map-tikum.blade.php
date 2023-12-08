<div class="container">
    <div class="text-center">
        <div id="map" style="height: 50vh; width: 50vh;"></div>

    </div>
</div>

<script>
    var tikumIcon = L.icon({
        iconUrl: "{{ asset('img/tikum.png') }}",

        iconSize: [20, 20], // size of the icon
        shadowSize: [50, 64], // size of the shadow
        iconAnchor: [20, 20], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 62], // the same for the shadow
        popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
    });

    var map = L.map('map').setView(["{{$data->latitude}}", "{{$data->longitude}}"], 13);

    const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var marker = L.marker(["{{$data->latitude}}", "{{$data->longitude}}"], {
        icon: tikumIcon
    }).addTo(map).bindPopup("{{$data->nama}}");
</script>