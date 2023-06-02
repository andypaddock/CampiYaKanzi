<section class="container section-spacer <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="shop-navigation">
            <? wp_nav_menu(array(
                            'theme_location' => 'shop-cats',
                            'container' => '',
                        )); ?>
        </div>
    </div>
</section>