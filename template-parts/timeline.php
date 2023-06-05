<section class="container section-timeline <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
       <div class="timeline-wrapper">
    <?php $timeline = get_sub_field('timeline');
    if ($timeline && have_rows('timeline')) : $count = 0; ?>
        <?php while (have_rows('timeline')) : the_row();
            $count++;
            $is_last = $count === count($timeline);
        ?>
            <div class="timeline-event">
                <div class="timeline-event__date">
                    <div><?php the_sub_field('yeardate'); ?></div>
                </div>
                <div class="timeline-event__timeline">
                    <div class="top"></div>
                    <div class="center <?php if ($is_last) echo 'last'; ?>"></div>
                    <div class="bottom"></div>
                </div>
                <div class="timeline-event__details">
                    <div class="label">
                        <h3 class="heading-2 heading-2--green"><?php the_sub_field('title'); ?></h3>
                    </div>
                    <div class="content">
                        <?php
                        $image = get_sub_field('image');
                        $size = 'full';
                        if ($image) {
                            echo wp_get_attachment_image($image, $size);
                        }
                        ?>
                        <?php the_sub_field('description'); ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>




    </div>

</section>