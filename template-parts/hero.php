<?php
$heroType = get_sub_field('hero_type_select');
$heroImage = get_sub_field('hero_image');
$heroVideo = get_sub_field('hero_video');
$anchorTop = get_field('hero_image_bleed');
?>
<div class="hero-wrapper <?php if ($anchorTop || is_singular( 'post' )) : echo 'anchor-top'; endif; ?>">
    <?php if ($heroType == 'image') : ?>
    <section
        class="container full-image imageoff-<?php the_field('mobile_offset'); ?> <?php the_field('hero_height'); ?>  anchor-<?php the_field('image_anchor'); ?>"
        style="background-image: url(<?php if ($heroImage) : ?><?php echo $heroImage['sizes']['hero-image']; ?><?php else : ?><?php echo get_the_post_thumbnail_url(get_the_ID(), 'hero-image'); ?><?php endif ?>)">
        <?php if ( !is_single() ) { ?>
        <div class="hero-textblock">
            <h1 class="heading-1 heading-1--light tileup">
                <?php if (get_sub_field('hero_heading')): ?><?php the_sub_field('hero_heading'); ?><?php else: ?><?php the_title(); ?><?php endif ?>
            </h1>
            <?php 
$link = get_sub_field('hero_link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
            <a class="button light tileup" href="<?php echo esc_url( $link_url ); ?>"
                target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><i
                    class="fa-sharp fa-light fa-arrow-right"></i></a>
            <?php endif; ?>
        </div>
        <?php } ?>
        <div class="center-wrapper">
            <div class="center bounce">
                <i class="fa-sharp fa-solid fa-chevron-down"></i>
            </div>
        </div>

    </section>
    <?php if ( is_single() ) { ?>
    <section class="container news-meta">
        <?php wpb_posts_nav(); ?>
        <div class="row <?php the_sub_field('column_size'); ?>">
            <h3 class="heading-5 heading-5--green tileup">
                <?php echo get_the_date(); ?>
            </h3>
            <h1 class="heading-1 tileup">
                <?php if (get_sub_field('hero_heading')): ?><?php the_sub_field('hero_heading'); ?><?php else: ?><?php the_title(); ?><?php endif ?>
            </h1>

        </div>
    </section>
    <?php } ?>
    <?php elseif ($heroType == 'video') : ?>
    <section class="container full-image <?php the_field('hero_height'); ?>">
        <video playsinline autoplay muted loop poster="placeholder.jpg" id="bgvideo" width="x" height="y">
            <source src="<?php echo $heroVideo['url']; ?>" type="video/mp4">
        </video>
        <div class="hero-textblock">
            <h1 class="heading-1 heading-1--light tileup">
                <?php if (get_sub_field('hero_heading')): ?><?php the_sub_field('hero_heading'); ?><?php else: ?><?php the_title(); ?><?php endif ?>
            </h1>
            <?php 
$link = get_sub_field('hero_link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
            <a class="button light tileup" href="<?php echo esc_url( $link_url ); ?>"
                target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><i
                    class="fa-sharp fa-light fa-arrow-right"></i></a>
            <?php endif; ?>
        </div>
        <div class="center-wrapper">
            <div class="center bounce">
                <i class="fa-sharp fa-solid fa-chevron-down"></i>
            </div>
        </div>
    </section>
    <?php if ( is_single() ) { ?>
    <section class="container news-meta">
        <div class="row <?php the_sub_field('column_size'); ?>">
            <h3 class="heading-5 heading-5--green tileup">
                <?php echo get_the_date(); ?>
            </h3>
            <h1 class="heading-1 tileup">
                <?php if (get_sub_field('hero_heading')): ?><?php the_sub_field('hero_heading'); ?><?php else: ?><?php the_title(); ?><?php endif ?>
            </h1>

        </div>
    </section>
    <?php } ?>
    <?php elseif ($heroType == 'slider') : ?>
    <section class="container header full-image  <?php the_field('hero_height'); ?>">
        <div class="hero-slider">
            <?php
                $images = get_sub_field('hero_slider');
                if ($images) : ?>
            <?php foreach ($images as $image) : ?>
            <div class="slider-image" style="background-image: url(<?php echo esc_url($image['url']); ?>)"></div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="hero-textblock">
            <h1 class="heading-1 heading-1--light">
                <?php if (get_sub_field('hero_heading')): ?><?php the_sub_field('hero_heading'); ?><?php else: ?><?php the_title(); ?><?php endif ?>
            </h1>
            <?php 
$link = get_sub_field('hero_link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
            <a class="button light" href="<?php echo esc_url( $link_url ); ?>"
                target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><i
                    class="fa-sharp fa-light fa-arrow-right"></i></a>
            <?php endif; ?>
        </div>
        <div class="center-wrapper">
            <div class="center bounce">
                <i class="fa-sharp fa-solid fa-chevron-down"></i>
            </div>
        </div>
    </section>
    <?php elseif ($heroType == 'half') : ?>
    <section class="container hero-half <?php the_field('hero_height'); ?>">
        <div class="hero-half--image"
            style="background-image: url(<?php if ($heroImage) : ?><?php echo $heroImage['sizes']['hero-image']; ?><?php else : ?><?php echo get_the_post_thumbnail_url(get_the_ID(), 'hero-image'); ?><?php endif ?>)">
        </div>
        <div class="hero-textblock">
            <h3 class="heading-5"><?php the_sub_field('hero_sub-heading'); ?></h3>
            <h1 class="heading-1 heading-1--<?php the_sub_field('heading_color'); ?>">
                <?php if (get_sub_field('hero_heading')): ?><?php the_sub_field('hero_heading'); ?><?php else: ?><?php the_title(); ?><?php endif ?>
            </h1>
            <div class="hero-textblock--para underscores">
                <?php the_sub_field('hero_text'); ?>
            </div>
            <div class="hero-textblock--opening">
                <h3 class="heading-3 heading-3--green"><?php the_sub_field('open_title'); ?></h3>
                <?php the_sub_field('open_text'); ?>
            </div>
            <?php 
$link = get_sub_field('hero_link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
            <a class="button light" href="<?php echo esc_url( $link_url ); ?>"
                target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><i
                    class="fa-sharp fa-light fa-arrow-right"></i></a>
            <?php endif; ?>

            <div class="center bounce">
                <i class="fa-sharp fa-light fa-chevron-down"></i>
            </div>

        </div>

    </section>

    <?php if ( is_single() ) { ?>
    <section class="container news-meta">
        <div class="row <?php the_sub_field('column_size'); ?>">
            <h3 class="heading-5 heading-5--green tileup">
                <?php echo get_the_date(); ?>
            </h3>
            <h1 class="heading-1 tileup">
                <?php if (get_sub_field('hero_heading')): ?><?php the_sub_field('hero_heading'); ?><?php else: ?><?php the_title(); ?><?php endif ?>
            </h1>

        </div>
    </section>
    <?php } ?>
    <?php elseif ($heroType == 'contact') : ?>

    <section class="container hero-contact <?php the_field('hero_height'); ?>">
        <div class="hero-contact--map">
            <?php $location = get_sub_field('hero-location');?>
            <div id='map-hero'></div>
            <script>
            mapboxgl.accessToken =
                'pk.eyJ1Ijoic2lsdmVybGVzcyIsImEiOiJjaXNibDlmM2gwMDB2Mm9tazV5YWRmZTVoIn0.ilTX0t72N3P3XbzGFhUKcg';
            var map = new mapboxgl.Map({
                container: 'map-hero',
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
        </div>
        <div class="hero-contact--shortcode">
            <?php
                if (get_sub_field('contact_form_shortcode')) {
                    echo do_shortcode(get_sub_field('contact_form_shortcode'));
                }
                ?>
        </div>
    </section>



    <?php elseif ($heroType == 'home') : ?>

    <section class="home-video">
        <video playsinline autoplay muted loop poster="" id="bgvideo" width="x" height="y">
            <source src="<?php echo $heroVideo['url']; ?>" type="video/mp4">
        </video>
        <div class="hero-logo">
            <a href="<?php echo site_url(); ?>">
                <?php get_template_part('inc/img/logo'); ?>
            </a>
        </div>
        <div class="hero-textblock">
            <h1 class="heading-1 heading-1--light tileup">
                <?php if (get_sub_field('hero_heading')): ?><?php the_sub_field('hero_heading'); ?><?php else: ?><?php the_title(); ?><?php endif ?>
            </h1>
            <h3 class="heading-3 heading-3--light font-italic tileup">
                <?php the_sub_field('hero_sub-heading'); ?>
            </h3>
            <?php 
$link = get_sub_field('hero_link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
            <a class="button outline light tileup" href="<?php echo esc_url( $link_url ); ?>"
                target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
        </div>

    </section>


    <?php endif; ?>













</div>