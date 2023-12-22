<div class="justify-content-center align-center">
    <div id="map" style="height: 80vh; width: 100%;"></div>
</div>

<script type="text/javascript">
    var map = L.map('map').setView([-7.677718722836917, 108.64768251433698], 13);

    // google street
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // DRAW POLYGON 
    $(document).ready(function() {
        $.getJSON('viewPolygon/json', function(data) {
            $.each(data, function(index) {
                if (data[index].is_active == 'Active') {
                    if ([data[index].tipe] == 'Sangat Berbahaya') {
                        L.polygon(JSON.parse([data[index].polygon]), {
                            color: '#ff4242',
                            weight: 3,
                            opacity: 0.3
                        }).addTo(map).bindPopup("<a class = 'btn btn-info' style = 'color:#fff;'href = " + '/draw/updateEnum/' + data[index].id + " > Non Active Polygon </a><a class = 'btn btn-danger'style = 'color:#fff;'href = " + '/draw/delete2/' + data[index].id + " > Delete Polygon </a>").bindTooltip('Zona Sangat Berbahaya', {
                            direction: "center"
                        });
                    } else if ([data[index].tipe] == 'Berbahaya') {
                        L.polygon(JSON.parse([data[index].polygon]), {
                            color: '#fcff42',
                            weight: 3,
                            opacity: 0.3
                        }).addTo(map).bindPopup("<a class = 'btn btn-info' style = 'color:#fff;'href = " + '/draw/updateEnum/' + data[index].id + " > Non Active Polygon </a><a class = 'btn btn-danger'style = 'color:#fff;'href = " + '/draw/delete2/' + data[index].id + " > Delete Polygon </a>").bindTooltip('Zona Berbahaya', {
                            direction: "center"
                        });
                    } else {
                        L.polygon(JSON.parse([data[index].polygon]), {
                            color: '#42ff4c',
                            weight: 3,
                            opacity: 0.3
                        }).addTo(map).bindPopup("<a class = 'btn btn-info 'style = 'color:#fff;'href = " + '/draw/updateEnum/' + data[index].id + " > Non Active Polygon </a><a class = 'btn btn-danger'style = 'color:#fff;'href = " + '/draw/delete2/' + data[index].id + " > Delete Polygon </a>").bindTooltip('Zona Aman', {
                            direction: "center"
                        });
                    }
                } else {
                    if ([data[index].tipe] == 'Sangat Berbahaya') {
                        L.polygon(JSON.parse([data[index].polygon]), {
                            color: '#ff4242',
                            weight: 3,
                            opacity: 0.3
                        }).addTo(map).bindPopup("<a class = 'btn btn-success' style = 'color:#fff;'href = " + '/draw/updateEnum/' + data[index].id + " > Active Polygon </a><a class = 'btn btn-danger'style = 'color:#fff;'href = " + '/draw/delete2/' + data[index].id + " > Delete Polygon </a>").bindTooltip('Zona Sangat Berbahaya', {
                            direction: "center"
                        });
                    } else if ([data[index].tipe] == 'Berbahaya') {
                        L.polygon(JSON.parse([data[index].polygon]), {
                            color: '#fcff42',
                            weight: 3,
                            opacity: 0.3
                        }).addTo(map).bindPopup("<a class = 'btn btn-success' style = 'color:#fff;'href = " + '/draw/updateEnum/' + data[index].id + " > Active Polygon </a><a class = 'btn btn-danger'style = 'color:#fff;'href = " + '/draw/delete2/' + data[index].id + " > Delete Polygon </a>").bindTooltip('Zona Berbahaya', {
                            direction: "center"
                        });
                    } else {
                        L.polygon(JSON.parse([data[index].polygon]), {
                            color: '#42ff4c',
                            weight: 3,
                            opacity: 0.3
                        }).addTo(map).bindPopup("<a class = 'btn btn-success 'style = 'color:#fff;'href = " + '/draw/updateEnum/' + data[index].id + " > Active Polygon </a><a class = 'btn btn-danger'style = 'color:#fff;'href = " + '/draw/delete2/' + data[index].id + " > Delete Polygon </a>").bindTooltip('Zona Aman', {
                            direction: "center"
                        });
                    }
                }

                // console.log(JSON.parse([data[index].polygon]));
            });
        });
    });
</script>