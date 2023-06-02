<section class="container section-event-map">
    <div class="row col-10">
        <div class="event-map">
            <?php
$terms = get_the_terms( get_the_ID(), 'location' );
if ( $terms && ! is_wp_error( $terms ) ):?>
            <?php foreach ( $terms as $term ): 
        $location = get_field('location', $term);?>
            <div id='map-location'></div>
            <script>
            mapboxgl.accessToken =
                'pk.eyJ1Ijoic2lsdmVybGVzcyIsImEiOiJjaXNibDlmM2gwMDB2Mm9tazV5YWRmZTVoIn0.ilTX0t72N3P3XbzGFhUKcg';
            var map = new mapboxgl.Map({
                container: 'map-location',
                style: 'mapbox://styles/silverless/ckk5kbjw20m9117oq075t73og',
                center: [<?php echo esc_attr($location['lng']); ?>, <?php echo esc_attr($location['lat']); ?>],
                zoom: 11,
                maxZoom: 17,
                minZoom: 6,
            });
            map.addControl(new mapboxgl.NavigationControl());
            // add marker to map
            new mapboxgl.Marker({
                    color: 'black'
                })
                .setLngLat([<?php echo esc_attr($location['lng']); ?>, <?php echo esc_attr($location['lat']); ?>])
                .addTo(map);
            </script>
            <?php endforeach;?>
            <?php endif;?>
        </div>
        <div class="directions-link">
            <a href="https://www.google.com/maps/dir/Current+Location/<?php echo esc_attr($location['lat']); ?>,<?php echo esc_attr($location['lng']); ?>"
                class="button google-maps-link" target="_blank">Get Directions<i class="fa-duotone fa-route"></i></a>
        </div>
    </div>
</section>