<script>
    /* leaflet - INI */
    var du_mymap = {
        map: false,
        config: <?php echo $modulesData["leaflet"]["config"] ? json_encode($modulesData["leaflet"]["config"]) : "false"; ?>,
        geoLayer: false,
        maxBounds: false,
        polys: [],
        markers: [],
        currentStyle: false,
        activeArea: false,
        legend: false,
        legendData: false,
        options: {
            worldCopyJump: true,
            minZoom: 5,
            maxZoom: 12,
            zoom: 7,
            center: [52.503, -0.06]
        },
        defaultStyle: {
            /* fillColor: getColor(feature.properties.density), */
            weight: 1,
            color: "#ddd",
            opacity: 1,
            /* dashArray: "3", */
            fillColor: "#fcfcfc",
            fillOpacity: 1
        },
        colourSet: ["#eeee44", "#f1c100", "#ef9100", "#e75e00", "#d80808"]
    };
    var du_startMap = function() {
        du_mymap.map = L.map("du-map", du_mymap.options);
        if (
            du_mymap.config &&
            du_mymap.config.tiles
        ) {
            L.tileLayer(
                    du_mymap.config.tiles.url, {
                        maxZoom: 19,
                        attribution: du_mymap.config.tiles.attribution
                    })
                .addTo(du_mymap.map);
        }
        du_mymap.polys[0] = L.polygon([
                [52.609, -0.08],
                [52.503, -0.18],
                [52.41, 0.18]
            ])
            .addTo(du_mymap.map);
        du_mymap.polys[0]
            .bindPopup("I am a polygon.");
        du_mymap.markers[0] = L.marker([52.41, 0.18])
            .addTo(du_mymap.map);
        du_mymap.markers[0]
            .bindPopup("<b>Hello world!</b><br>I am a popup.")
            .openPopup();
    };
    /* leaflet - END */