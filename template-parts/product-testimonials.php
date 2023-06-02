<section class="container section-testimonials <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row col-10">
        <?php esc_attr( get_field('trip_link','options') ); ?>
        <div class="testimonial-wrapper">

            <?php if( have_rows('testimonial', 'options') ): $defaultText = get_field('page_element_headings', 'options');
					while( have_rows('testimonial', 'options') ): the_row(); 
                    $testType = get_sub_field('testimonial_type');?>
            <div class="quote">
                <?php get_template_part("inc/img/quote"); ?>
                <div class="copy underscores underscores__xl"><?php the_sub_field('quote');?></div>
                <div class="attrib"><?php the_sub_field('attrib');?></div>
                <div class="quote-details">
                    <?php if ($testType === 'trip'): ?>
                    <?php 
$link = get_field('trip_link','options');

    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                    <a href="<?php echo esc_url( $link_url ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>"><?php get_template_part('inc/img/trip'); ?><div
                            class="stars" style="--rating: <?php the_sub_field('star_rating');?>;"
                            aria-label="Rating of this product is 2.3 out of 5.">
                        </div>
                        <div class="date">
                            <?php echo $defaultText['test_pre']; ?>
                            <?php the_sub_field('date');?>
                            <?php echo $defaultText['test_post']; ?><i class="fa-sharp fa-light fa-arrow-right"></i>


                        </div>
                    </a>
                    <?php elseif ($testType === 'google'):?>
                    <?php 
$link = get_field('google_link','options');
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                    <a href="<?php echo esc_url( $link_url ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>"><?php get_template_part('inc/img/google'); ?>
                        <div class="stars" style="--rating: <?php the_sub_field('star_rating');?>;"
                            aria-label="Rating of this product is 2.3 out of 5.">
                        </div>
                        <div class="date">
                            <?php echo $defaultText['test_pre']; ?>
                            <?php the_sub_field('date');?>
                            <?php echo $defaultText['test_post']; ?><i class="fa-sharp fa-light fa-arrow-right"></i>
                        </div>
                    </a>

                    <?php elseif ($testType === 'face'):?>
                    <?php 
$link = get_field('facebook_link','options');

    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                    <a href="<?php echo esc_url( $link_url ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>"><?php get_template_part('inc/img/face'); ?><div
                            class="stars" style="--rating: <?php the_sub_field('star_rating');?>;"
                            aria-label="Rating of this product is 2.3 out of 5.">
                        </div>
                        <div class="date">
                            <?php echo $defaultText['test_pre']; ?>
                            <?php the_sub_field('date');?>
                            <?php echo $defaultText['test_post']; ?><i class="fa-sharp fa-light fa-arrow-right"></i>
                        </div>
                    </a>

                    <?php else :?>
                    <div class="stars" style="--rating: <?php the_sub_field('star_rating');?>;"
                        aria-label="Rating of this product is 2.3 out of 5."></div>
                    <div class="date"><?php echo $defaultText['test_pre']; ?> <?php the_sub_field('date');?>
                        <?php echo $defaultText['test_post']; ?></div>
                    <?php endif;?>
                </div>
            </div>
            <?php endwhile; endif;?>
        </div>
    </div>
</section>