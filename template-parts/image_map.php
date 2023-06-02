<?php $images = get_sub_field('images');
$size = 'large'; // (thumbnail, medium, large, full or custom size)
$original = 'full'; ?>
<section class="container section-image-map <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="image-map--wrapper">
            <div class="image-map--gallery">
                <?php foreach ($images as $image_id) :
                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE); ?>
                <div class="gallery-image">
                    <a data-fslightbox="gallery" href="<?php echo wp_get_attachment_image_url($image_id, $original); ?>"
                        class="lightbox-gallery" alt="<?php echo $image_alt; ?>">
                        <?php echo wp_get_attachment_image($image_id, $size); ?></a>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="image-map--map">
                <?php  $location = get_sub_field('map');?>
                <div id='map'></div>
                <script>
                mapboxgl.accessToken =
                    'pk.eyJ1Ijoic2lsdmVybGVzcyIsImEiOiJjaXNibDlmM2gwMDB2Mm9tazV5YWRmZTVoIn0.ilTX0t72N3P3XbzGFhUKcg';
                var map = new mapboxgl.Map({
                    container: 'map',
                    style: 'mapbox://styles/silverless/ckk5kbjw20m9117oq075t73og',
                    center: [<?php echo esc_attr($location['lng']); ?>,
                        <?php echo esc_attr($location['lat']); ?>
                    ],
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
            </div>
        </div>
    </div>

</section>