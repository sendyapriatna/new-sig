<div class="text-center">
    <div id="map" style="height: 70vh; width: auto;"></div>
</div>

<script>
    // var map = L.map('map').setView([-7.789365453902131, 110.36420494336112], 13);
    var map = L.map('map').setView([-7.784827151781898, 110.1888290333844], 13);
    // google street
    L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(map);

    $(document).ready(function() {
        $.getJSON('titik/json', function(data) {
            $.each(data, function(index) {
                // alert(data[index].nama)
                L.marker([data[index].latitude, data[index].longitude]).addTo(map).bindPopup("<div><img style='width: 100%;border-radius: 0.5em;' src=" + '/storage/' + data[index].image + "><br><br><b>" + data[index].nama + "</b><br>" + data[index].alamat + "<br><a class='btn btn-primary' href=" + '/landing-page/detail/' + data[index].id + ">Detail</a></div>").openPopup();;
            });
        });
    });
</script>