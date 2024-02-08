<div class="justify-content-center align-center px-5">
    <div id="map" style="height: 87vh; width: 100%;"></div>
</div>
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
        </div>
        <div class="dropdown mt-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                Dropdown button
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>
    </div>
</div>

<script src="{{ asset('js/pangandaran.js') }}"></script>
<script src="{{ asset('js/tsunami.js') }}"></script>

<script type="text/javascript">
    // MAP STYLE
    const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    });

    const osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles style by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
    });

    const CartoDB_DarkMatter = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
        subdomains: 'abcd',
        maxZoom: 20
    });

    const CartoDB_Positron = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
        subdomains: 'abcd',
        maxZoom: 20
    });

    const Google = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 15,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });
    // END MAP STYLE

    // ICON SHELTER
    var shelterIcon = L.icon({
        iconUrl: "{{ asset('img/shelter.png') }}",

        iconSize: [25, 25], // size of the icon
        shadowSize: [50, 64], // size of the shadow
        iconAnchor: [25, 25], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 62], // the same for the shadow
        popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
    });

    // ICON TIKUM
    var tikumIcon = L.icon({
        iconUrl: "{{ asset('img/tikum.png') }}",

        iconSize: [25, 25], // size of the icon
        shadowSize: [50, 64], // size of the shadow
        iconAnchor: [25, 25], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 62], // the same for the shadow
        popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
    });

    const shelter = L.layerGroup();
    $(document).ready(function() {
        $.getJSON('titikShelter/json', function(data) {
            $.each(data, function(index) {
                // alert(data[index].nama)
                L.marker([data[index].latitude, data[index].longitude], {
                    icon: shelterIcon
                }).addTo(shelter).bindPopup("<div><table> <th class = 'text-center' colspan='3'> Information </th><tr><td class='text-center' colspan='3'><img class='img-fluid' style='border-radius: 0.5em;padding: 10px 0 10px 0;' src=" + '/storage/' + data[index].image + "></td></tr><tr><td style = 'padding: 10px 0 10px 0;'> Nama </td><td>:</td><td>" + data[index].nama + "</td></tr><tr><td style = 'padding: 10px 0 10px 0;' > Keterangan </td><td>:</td><td>" + data[index].keterangan + "</td></tr><tr><td style = 'padding: 10px 0 10px 0;'> Kapasitas </td><td>:</td><td> " + data[index].kapasitas + " Orang</td></tr><tr><td class = 'text-center'colspan = '3'><a class = 'btn btn-primary'style = 'color:#fff;'href = " + '/detailShelter/' + data[index].id + " > Detail </a></td></tr></table></div>");
            });
        });
    });

    //MARKER TIKUM
    const tikum = L.layerGroup();
    $(document).ready(function() {
        $.getJSON('titikTikum/json', function(data) {
            $.each(data, function(index) {
                // alert(data[index].nama)
                L.marker([data[index].latitude, data[index].longitude], {
                    icon: tikumIcon
                }).addTo(tikum).bindPopup("<div><table> <th class = 'text-center' colspan='3'> Information </th><tr><td class='text-center' colspan='3'><img style='width: 100%;border-radius: 0.5em;padding: 10px 0 10px 0;' src=" + '/storage/' + data[index].image + "></td></tr><tr><td style = 'padding: 10px 0 10px 0;'> Nama </td><td>:</td><td>" + data[index].nama + "</td></tr><tr><td style = 'padding: 10px 0 10px 0;' > Keterangan </td><td>:</td><td>" + data[index].keterangan + "</td></tr><tr><td style = 'padding: 10px 0 10px 0;'> Kapasitas </td><td>:</td><td> " + data[index].kapasitas + " Orang</td></tr><tr><td class = 'text-center'colspan = '3'><a class = 'btn btn-primary'style = 'color:#fff;'href = " + '/detailTikum/' + data[index].id + " > Detail </a></td></tr></table></div>");
            });
        });
    });

    // DRAW POLYGON 
    const Polygon = L.layerGroup();
    $(document).ready(function() {
        $.getJSON('titikPolygon/json', function(data) {
            $.each(data, function(index) {
                if (data[index].is_active == 'Active') {
                    if ([data[index].tipe] == 'Sangat Berbahaya') {
                        L.polygon(JSON.parse([data[index].polygon]), {
                            color: '#ff4242',
                            weight: 3,
                            opacity: 0.3,
                        }).addTo(Polygon).bindTooltip('Zona Sangat Berbahaya', {
                            direction: "center"
                        });
                    } else if ([data[index].tipe] == 'Berbahaya') {
                        L.polygon(JSON.parse([data[index].polygon]), {
                            color: '#fcff42',
                            weight: 3,
                            opacity: 0.3,
                        }).addTo(Polygon).bindTooltip('Zona Berbahaya', {
                            direction: "center"
                        });
                    } else {
                        L.polygon(JSON.parse([data[index].polygon]), {
                            color: '#42ff4c',
                            weight: 3,
                            opacity: 0.3,
                        }).addTo(Polygon).bindTooltip('Zona Aman', {
                            direction: "center"
                        });
                    }
                }
            });
        });
    });

    // KERUSAKAN
    const Kerusakan = L.layerGroup();
    $(document).ready(function() {
        $.getJSON('viewKerusakan/json', function(data) {
            $.each(data, function(index) {
                if (data[index].is_active == 'Active') {
                    if ([data[index].density] >= 66) {
                        L.polygon(JSON.parse([data[index].polygon]), {
                            fillColor: '#ff4242', //Polygon Color
                            weight: 3, //Outline
                            opacity: 0.5, //Opacity Outline
                            fillOpacity: 0.5, //Opacity Polygon
                            color: 'black', //Outline color
                        }).addTo(Kerusakan).bindTooltip("<div><table> <th class = 'text-center' colspan='3'> <h6>Persentase Kerusakan</h6> </th><tr><td class='text-center' colspan='3'></td></tr><tr><td> <b>Desa " + data[index].name + "</b></td></tr><tr><td > Kerusakan " + data[index].density + "%</td></tr></table></div>");
                    } else if ([data[index].density] >= 33 && [data[index].density] < 66) {
                        L.polygon(JSON.parse([data[index].polygon]), {
                            fillColor: '#fcff42', //Polygon Color
                            weight: 3, //Outline
                            opacity: 0.5, //Opacity Outline
                            fillOpacity: 0.5, //Opacity Polygon
                            color: 'black', //Outline color
                        }).addTo(Kerusakan).bindTooltip("<div><table> <th class = 'text-center' colspan='3'> <h6>Persentase Kerusakan</h6> </th><tr><td class='text-center' colspan='3'></td></tr><tr><td> <b>Desa " + data[index].name + "</b></td></tr><tr><td > Kerusakan " + data[index].density + "%</td></tr></table></div>");
                    } else {
                        L.polygon(JSON.parse([data[index].polygon]), {
                            fillColor: '#42ff4c', //Polygon Color
                            weight: 3, //Outline
                            opacity: 0.5, //Opacity Outline
                            fillOpacity: 0.5, //Opacity Polygon
                            color: 'black', //Outline color
                        }).addTo(Kerusakan).bindTooltip("<div><table> <th class = 'text-center' colspan='3'> <h6>Persentase Kerusakan</h6> </th><tr><td class='text-center' colspan='3'></td></tr><tr><td> <b>Desa " + data[index].name + "</b></td></tr><tr><td > Kerusakan " + data[index].density + "%</td></tr></table></div>");
                    }
                }
            });
        });
    });

    var baseMaps = {
        "Open Street Map": osm,
        "Dark": CartoDB_DarkMatter,
        "Positron": CartoDB_Positron,
        "Google": Google
    };

    // BASE MAP OSM
    const map = L.map('map', {
        center: [-7.686146052364736, 108.57400527343061],
        zoom: 12,
        layers: [osm, shelter, tikum, Polygon]
    });

    var overlayMaps = {
        "Lokasi Shelter": shelter,
        "Titik Kumpul": tikum,
        "Peta Bahaya": Polygon,
        // "Peta Bahaya (Contoh)": petaDanger,
        "Peta Kerusakan": Kerusakan
    };

    map.attributionControl.addAttribution('Tsunami Danger &copy; <a href="https://www.instagram.com/sndyprtn/">Sendy Apriatna</a> &copy; <a href="http://census.gov/">US Census Bureau</a>');

    var legend = L.control({
        position: 'bottomleft'
    });

    legend.onAdd = function(map) {
        var div = L.DomUtil.create("div", "legend");
        div.innerHTML += "<h4>Map Legend</h4>";
        div.innerHTML += '<i style="background: red"></i><span>Zona Sangat Berbahaya</span><br>';
        div.innerHTML += '<i style="background: yellow"></i><span>Zona Berbahaya</span><br>';
        div.innerHTML += '<i style="background: green"></i><span>Zona Aman</span><br>';
        div.innerHTML += '<img src="{{ asset("img/shelter.png") }}" style="width:18px;" alt="" class="img-fluid mt-n2"><span class="px-2">Lokasi Shelter</span><br>';
        div.innerHTML += '<img src="{{ asset("img/tikum.png") }}" style="width:18px;" alt="" class="img-fluid mt-n2"><span class="px-2">Lokasi Titik Kumpul</span><br>';
        return div;
    };

    legend.addTo(map);
    L.control.locate().addTo(map);
    const layerControl = L.control.layers(baseMaps, overlayMaps).addTo(map);
</script>