<div class="container">
    <div class="text-center">
        <div id="map" style="height: 50vh; width: 50vh;"></div>

    </div>
</div>

<script>
    var map = L.map('map').setView(["{{$data->latitude}}", "{{$data->longitude}}"], 13);
    // google street
    L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(map);
    var marker = L.marker(["{{$data->latitude}}", "{{$data->longitude}}"]).addTo(map).bindPopup("{{$data->nama}}").openPopup();
</script>