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
        $.getJSON('viewKerusakan/json', function(data) {
            $.each(data, function(index) {
                if ([data[index].density] >= 66) {
                    L.polygon(JSON.parse([data[index].polygon]), {
                        fillColor: '#ff4242', //Polygon Color
                        weight: 3, //Outline
                        opacity: 0.5, //Opacity Outline
                        fillOpacity: 0.5, //Opacity Polygon
                        color: 'black', //Outline color
                    }).addTo(map).bindTooltip("<div class='rounded'><table> <th class = 'text-center' colspan='3'> <h6>Persentase Kerusakan</h6> </th><tr><td class='text-center' colspan='3'></td></tr><tr><td> <b>Desa " + data[index].name + "</b></td></tr><tr><td > Kerusakan " + data[index].density + "%</td></tr></table></div>");
                } else if ([data[index].density] >= 33 && [data[index].density] < 66) {
                    L.polygon(JSON.parse([data[index].polygon]), {
                        fillColor: '#fcff42', //Polygon Color
                        weight: 3, //Outline
                        opacity: 0.5, //Opacity Outline
                        fillOpacity: 0.5, //Opacity Polygon
                        color: 'black', //Outline color
                    }).addTo(map).bindTooltip("<div class='rounded'><table> <th class = 'text-center' colspan='3'> <h6>Persentase Kerusakan</h6> </th><tr><td class='text-center' colspan='3'></td></tr><tr><td> <b>Desa " + data[index].name + "</b></td></tr><tr><td > Kerusakan " + data[index].density + "%</td></tr></table></div>");
                } else {
                    L.polygon(JSON.parse([data[index].polygon]), {
                        fillColor: '#42ff4c', //Polygon Color
                        weight: 3, //Outline
                        opacity: 0.5, //Opacity Outline
                        fillOpacity: 0.5, //Opacity Polygon
                        color: 'black', //Outline color
                    }).addTo(map).bindTooltip("<div class='rounded'><table> <th class = 'text-center' colspan='3'> <h6>Persentase Kerusakan</h6> </th><tr><td class='text-center' colspan='3'></td></tr><tr><td> <b>Desa " + data[index].name + "</b></td></tr><tr><td > Kerusakan " + data[index].density + "%</td></tr></table></div>");
                }
                // console.log(JSON.parse([data[index].polygon]));
            });
        });
    });
</script>