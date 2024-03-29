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

    // MARKER SHELTER

    // Data Coba Array
    // const sunset = L.marker([-7.689200277633338, 108.64573192575138]).bindPopup('This is SUNSET, CO.').addTo(shelter);
    // const vape = L.marker([-7.686532445061385, 108.65008521394437]).bindPopup('This is VAPE, CO.').addTo(shelter);

    // Original
    // $(document).ready(function() {
    //     $.getJSON('titikShelter/json', function(data) {
    //         $.each(data, function(index) {
    //             // alert(data[index].nama)
    //             L.marker([data[index].latitude, data[index].longitude], {
    //                 icon: shelterIcon
    //             }).addTo(shelter).bindPopup("<div><img style='width: 100%;border-radius: 0.5em;' src=" + '/storage/' + data[index].image + "><br><br><b>" + data[index].nama + "</b><br><br>" + data[index].keterangan + "<br><br>Kapasitas " + data[index].kapasitas + " Orang<br><br><a class='btn btn-primary' style='color:#fff;' href=" + '/detailShelter/' + data[index].id + ">Detail</a></div>");
    //         });
    //     });
    // });
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

    //MARKET TIKUM
    const tikum = L.layerGroup();
    // const klinik = L.marker([-7.678952915858859, 108.66750698247081]).bindPopup('This is KLINIK, CO.').addTo(tikum);
    // const salon = L.marker([-7.681720111412515, 108.65030682785383]).bindPopup('This is SALON, CO.').addTo(tikum);
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
    // $(document).ready(function() {
    //     $.getJSON('titikTikum/json', function(data) {
    //         $.each(data, function(index) {
    //             // alert(data[index].nama)
    //             L.marker([data[index].latitude, data[index].longitude], {
    //                 icon: tikumIcon
    //             }).addTo(tikum).bindPopup("<p data-bs-toggle='offcanvas' data-bs-target='#offcanvasExample'>cek</p>");
    //         });
    //     });
    // });


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
                            opacity: 0.3
                        }).addTo(Polygon).bindTooltip('Zona Sangat Berbahaya', {
                            direction: "center"
                        });
                    } else if ([data[index].tipe] == 'Berbahaya') {
                        L.polygon(JSON.parse([data[index].polygon]), {
                            color: '#fcff42',
                            weight: 3,
                            opacity: 0.3
                        }).addTo(Polygon).bindTooltip('Zona Berbahaya', {
                            direction: "center"
                        });
                    } else {
                        L.polygon(JSON.parse([data[index].polygon]), {
                            color: '#42ff4c',
                            weight: 3,
                            opacity: 0.3
                        }).addTo(Polygon).bindTooltip('Zona Aman', {
                            direction: "center"
                        });
                    }
                }
                // console.log(JSON.parse([data[index].polygon]));
            });
        });
    });

    const Kerusakan = L.layerGroup();
    $(document).ready(function() {
        $.getJSON('viewKerusakan/json', function(data) {
            $.each(data, function(index) {
                if ([data[index].density] >= 80) {
                    L.polygon(JSON.parse([data[index].polygon]), {
                        color: '#ff4242',
                        weight: 3,
                        opacity: 0.5
                    }).addTo(Kerusakan).bindTooltip("<div class='rounded'><table> <th class = 'text-center' colspan='3'> <h6>Persentase Kerusakan</h6> </th><tr><td class='text-center' colspan='3'></td></tr><tr><td> <b>Desa " + data[index].name + "</b></td></tr><tr><td > Kerusakan " + data[index].density + "%</td></tr></table></div>");
                } else if ([data[index].density] >= 40 && [data[index].density] < 80) {
                    L.polygon(JSON.parse([data[index].polygon]), {
                        color: '#fcff42',
                        weight: 3,
                        opacity: 0.5
                    }).addTo(Kerusakan).bindTooltip("<div class='rounded'><table> <th class = 'text-center' colspan='3'> <h6>Persentase Kerusakan</h6> </th><tr><td class='text-center' colspan='3'></td></tr><tr><td> <b>Desa " + data[index].name + "</b></td></tr><tr><td > Kerusakan " + data[index].density + "%</td></tr></table></div>");
                } else {
                    L.polygon(JSON.parse([data[index].polygon]), {
                        color: '#42ff4c',
                        weight: 3,
                        opacity: 0.5
                    }).addTo(Kerusakan).bindTooltip("<div class='rounded'><table> <th class = 'text-center' colspan='3'> <h6>Persentase Kerusakan</h6> </th><tr><td class='text-center' colspan='3'></td></tr><tr><td> <b>Desa " + data[index].name + "</b></td></tr><tr><td > Kerusakan " + data[index].density + "%</td></tr></table></div>");
                }
                // console.log(JSON.parse([data[index].polygon]));
            });
        });
    });

    // POLYGON PETA DANGER CONTOH JSON (UDAH JADI)
    // const petaDanger = L.geoJSON(tsunamiData, {
    //     style: function(feature) {
    //         switch (feature.properties.party) {
    //             case 'Aman':
    //                 return {
    //                     color: "#00ff44"
    //                 };
    //             case 'Democrat':
    //                 return {
    //                     color: "#0000ff"
    //                 };
    //         }
    //     }
    // });
    // END POLYGON PETA DANGER

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


    // CHROLOPETH MAP
    // control that shows state info on hover
    const info = L.control({
        position: 'bottomright'
    });

    info.onAdd = function(map) {
        this._div = L.DomUtil.create('div', 'info');
        this.update();
        return this._div;
    };

    info.update = function(props) {
        const contents = props ? `<b>Desa ${props.name}</b><br />Kerusakan ${props.density} %` : 'Hover over a state';
        this._div.innerHTML = `<h5>Persentase Kerusakan</h5>${contents}`;
    };

    info.addTo(map);

    // get color depending on population density value
    // function getColor(d) {
    //     return d > 90 ? '#800026' :
    //         d > 75 ? '#BD0026' :
    //         d > 60 ? '#E31A1C' :
    //         d > 45 ? '#FC4E2A' :
    //         d > 30 ? '#FD8D3C' :
    //         d > 15 ? '#FEB24C' :
    //         d > 0 ? '#FED976' : '#FFEDA0';
    // }

    function getColor(d) {
        return d > 99 ? '#ff0019' :
            d > 66 ? '#c45151' :
            d > 33 ? '#c4c251' :
            d > 0 ? '#51c451' : '#51c451';
    }

    function style(feature) {
        return {
            weight: 2,
            opacity: 1,
            color: 'white',
            dashArray: '3',
            fillOpacity: 0.7,
            fillColor: getColor(feature.properties.density)
        };
    }

    function highlightFeature(e) {
        const layer = e.target;

        layer.setStyle({
            weight: 5,
            color: '#666',
            dashArray: '',
            fillOpacity: 0.8
        });

        layer.bringToFront();

        info.update(layer.feature.properties);
    }

    /* global statesData */
    const geojson = L.geoJson(admDataPangandaran, {
        style,
        onEachFeature
    }).bindTooltip('contoh bindtooltip', {
        direction: "center"
    });

    function resetHighlight(e) {
        geojson.resetStyle(e.target);
        info.update();
    }

    function zoomToFeature(e) {
        map.fitBounds(e.target.getBounds());
    }

    function onEachFeature(feature, layer) {
        layer.on({
            mouseover: highlightFeature,
            mouseout: resetHighlight,
            click: zoomToFeature
        });
    }

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
    // END CHROLOPETH

    // POPUP LAT LNG
    // var popup = L.popup();

    // function onMapClick(e) {
    //     popup
    //         .setLatLng(e.latlng)
    //         .setContent("You clicked the map at " + e.latlng.toString())
    //         .openOn(map);
    // }

    // map.on('click', onMapClick);


    // DRAW POLYGON 

    // LOKASI SAYA SAAT INI
    L.control.locate().addTo(map);

    // ADD TO LAYER
    const layerControl = L.control.layers(baseMaps, overlayMaps).addTo(map);
    layerControl.addOverlay(geojson, 'Peta Kerusakan');
    // layerControl.addOverlay(petaDanger, 'Danger');
    // layerControl.addOverlay(shelter, 'Lokasi Shelter');
    // layerControl.addOverlay(tikum, 'Lokasi Titik Kumpul');

    // SEARCH BOX
    // L.Control.geocoder().addTo(map);

    // EXAMPLE POLYGON LATLNG
    // const polygon = L.polygon([
    //     [-7.670233268313565, 108.63824113892787], // LAT, LNG
    //     [-7.680440673620556, 108.6575530431738],
    //     [-7.689074245854085, 108.65158781052894],
    //     [-7.681248749402704, 108.63068803860058]
    // ]).addTo(map);

    // STYLE POLYGON
    // polygon.setStyle({
    //     fillColor: '#ff0000', // FILL COLOR
    //     weight: 2,
    //     opacity: 1,
    //     color: '#ff0000', // OUTLINE COLOR
    //     fillOpacity: 0.6 // OPACITY
    // });
</script>