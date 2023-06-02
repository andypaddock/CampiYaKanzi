<section class="container section-map <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?> map-wrapper">
        <div id="map"></div>
        <div id="info-panel">
            <h3>Point 1</h3>
            <p>Basic information about Point 1.</p>
        </div>
        <div id="map-settings">
            <p id="map-pitch"></p>
            <p id="map-zoom"></p>
            <p id="map-bearing"></p>
        </div>
        <div class="point-controls">
            <div class="prev" id="prev-button"><i class="fa-sharp fa-light fa-square-chevron-left"></i></div>
            <div class="next" id="next-button"><i class="fa-sharp fa-light fa-square-chevron-right"></i></div>
            
        </div>

        <script>
        mapboxgl.accessToken =
            'pk.eyJ1Ijoic2lsdmVybGVzcyIsImEiOiJjaXNibDlmM2gwMDB2Mm9tazV5YWRmZTVoIn0.ilTX0t72N3P3XbzGFhUKcg';

        var points = [{
                name: 'Point 1',
                coordinates: [37.5330, 2.4642],
                info: 'Basic information about Point 1.',
                pitch: 85,
                bearing: 180,
                image: '/wp-content/uploads/2023/05/placeholder-1024x683-1.png',
                link: ''

            },
            {
                name: 'Point 2',
                coordinates: [37.5328, 2.5447],
                info: 'Basic information about Point 2.',
                pitch: 65,
                bearing: 150,
                image: '/wp-content/uploads/2023/05/placeholder-1024x683-1.png'

            },
            {
                name: 'Point 3',
                coordinates: [37.52606, 2.45078],
                info: 'Basic information about Point 3.',
                pitch: 75,
                bearing: 120,
                image: '/wp-content/uploads/2023/05/placeholder-1024x683-1.png'

            }
        ];

        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/silverless/clh0piium00lg01qy3g76gcf7', // style URL
            center: [37.50606, 2.55078], // starting position [lng, lat]
            pitch: 65,
            bearing: -180,
            zoom: 12, // starting zoom
        });

        map.on('load', function() {
            // Add points to the map
            points.forEach(function(point, index) {
                var el = document.createElement('div');
                el.className = 'marker';
                el.addEventListener('click', function() {
                    updateInfoPanel(index);
                    flyToLocation(point.coordinates, point.pitch, point.bearing);
                });
                new mapboxgl.Marker(el)
                    .setLngLat(point.coordinates)
                    .addTo(map);
            });

            updateInfoPanel(0); // Display info panel for Point 1 initially
        });

        function updateInfoPanel(index) {
            var infoPanel = document.getElementById('info-panel');
            var point = points[index];
            infoPanel.innerHTML = `
        <img src="${point.image}" alt="Point Image">
            <h3>${point.name}</h3>
            <p>${point.info}</p>
            <a class="map-link" href="${point.link}">Explore</a>
        `;
            // Remove "active" class from all marker elements
            var markerElements = document.getElementsByClassName('marker');
            for (var i = 0; i < markerElements.length; i++) {
                markerElements[i].classList.remove('active');
                markerElements[i].innerText = i + 1;
            }

            // Add "active" class to the currently displayed marker
            var activeMarker = markerElements[index];
            activeMarker.classList.add('active');
            activeMarker.innerText = index + 1;
        }

        function flyToLocation(coordinates, pitch, bearing) {
            map.flyTo({
                center: coordinates,
                zoom: 12,
                pitch: pitch,
                bearing: bearing,
                duration: 2000, // Adjust the duration (in milliseconds) for smoother animation
                easing: function(t) {
                    return t;
                    // Experiment with different easing functions for smoother animation,
                    // such as "t * (2 - t)" or "Math.pow(t, 2)"
                }
            });
        }

        map.on('move', function() {
            var pitchElement = document.getElementById('map-pitch');
            var zoomElement = document.getElementById('map-zoom');
            var bearingElement = document.getElementById('map-bearing');

            pitchElement.innerText = 'Pitch: ' + map.getPitch().toFixed(2);
            zoomElement.innerText = 'Zoom: ' + map.getZoom().toFixed(2);
            bearingElement.innerText = 'Bearing: ' + map.getBearing().toFixed(2);
        });

        var currentIndex = 0; // Keep track of the current index

        var nextButton = document.getElementById('next-button');
        var prevButton = document.getElementById('prev-button');

        nextButton.addEventListener('click', function() {
            currentIndex = (currentIndex + 1) % points.length;
            updateInfoPanel(currentIndex);
            flyToLocation(points[currentIndex].coordinates, points[currentIndex].pitch, points[currentIndex]
                .bearing);
        });

        prevButton.addEventListener('click', function() {
            currentIndex = (currentIndex - 1 + points.length) % points.length;
            updateInfoPanel(currentIndex);
            flyToLocation(points[currentIndex].coordinates, points[currentIndex].pitch, points[currentIndex]
                .bearing);
        });
        </script>
    </div>
</section>