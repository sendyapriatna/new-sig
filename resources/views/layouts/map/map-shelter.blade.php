<div class="">
    <div id="map" style="height: 50vh; width: 100%;"></div>
    <!-- <textarea type="text" name="polygon" id="polygon" style="width: 800px; height:400px;"></textarea> -->
</div>

<script>
    var shelterIcon = L.icon({
        iconUrl: "{{ asset('img/shelter.png') }}",

        iconSize: [25, 25], // size of the icon
        shadowSize: [50, 64], // size of the shadow
        iconAnchor: [25, 25], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 62], // the same for the shadow
        popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
    });
    var map = L.map('map').setView(["{{$data->latitude}}", "{{$data->longitude}}"], 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var marker = L.marker(["{{$data->latitude}}", "{{$data->longitude}}"], {
        icon: shelterIcon
    }).addTo(map).bindPopup("{{$data->nama}}");
</script>