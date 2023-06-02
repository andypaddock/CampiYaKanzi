<section class="container section-awards <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">

        <div class="awards-wrapper">
            <?php if( have_rows('awards') ): ?>
            <ul class="slides">
                <?php while( have_rows('awards') ): the_row(); 
        $image = get_sub_field('image');
        ?>
                <li>
                    <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                    <p><?php the_sub_field('caption'); ?></p>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php endif; ?>

        </div>
    </div>
</section>