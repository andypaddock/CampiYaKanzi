<?php $bannerImage = get_sub_field('image');
$size = 'large'; ?>
<section class="container section-cta-banner <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="cta-banner-wrapper">
            <?php echo wp_get_attachment_image($bannerImage, $size); ?>
            <?php if (get_sub_field('add_background_overlay')) { ?>
            <div class="background-overlay"
                style="background:black; opacity: 0.<?php the_sub_field('background_opacity'); ?>;">
            </div>
            <?php } ?>
            <h2 class="heading-1 heading-1--green tileup">
                <?php the_sub_field('title'); ?></h2>
            <div class="cta-button tileup">
                <?php 
$link = get_sub_field('link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                <a class="button light button__inline" href="<?php echo esc_url( $link_url ); ?>"
                    target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><i
                        class="fa-sharp fa-light fa-arrow-right"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </div>

</section>