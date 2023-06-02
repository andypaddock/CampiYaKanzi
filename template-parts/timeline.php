<section class="container section-timeline <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="timeline-wrapper">
            <?php if( have_rows('timeline') ): $count = 0; ?>
            <?php while( have_rows('timeline') ): the_row(); $count ++; ?>
            <div class="timeline-event">
                <div class="timeline-event__date">
                    <div><?php the_sub_field('yeardate'); ?></div>


                </div>
                <div class="timeline-event__timeline"><div class="top"></div><div class="center"></div><div class="bottom"></div></div>
                <div class="timeline-event__details">
                    <h3 class=" heading-2 heading-2--green"><?php the_sub_field('title'); ?></h3>
                    <?php 
$image = get_sub_field('image');
$size = 'full';
if( $image ) {
    echo wp_get_attachment_image( $image, $size );
}?><div class="">
                        <?php the_sub_field('description'); ?></div>
                </div>
            </div>
            
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>

</section>