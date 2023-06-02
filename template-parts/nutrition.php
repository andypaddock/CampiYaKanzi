<section class="container section-nutrition <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <?php
        $image = get_sub_field('image');
        $size = 'large'; // (thumbnail, medium, large, full or custom size)
        $nutType = get_sub_field('select_nut_block');
        ?>

        <?php if ($nutType === 'img-right') : ?>
        <div class="nutrition--right <?php the_sub_field('text_align'); ?>">
            <div class="nutrition--text">
                <div class="text-block__wrapper fmbottom <?php the_sub_field('tb_bg'); ?>">
                    <h2
                        class="<?php the_sub_field('heading_size'); ?> <?php the_sub_field('heading_size'); ?><?php the_sub_field('heading_colour'); ?>">
                        <?php the_sub_field('title'); ?></h2>
                    <?php the_sub_field('paragraphs'); ?>
                </div>
                <div class="nutrition--facts">
                    <?php if( have_rows('nutrition_stats') ): ?>

                    <?php while( have_rows('nutrition_stats') ): the_row();  ?>
                    <div class="nut-info tileup"><span class="counter"><?php the_sub_field('quantity'); ?></span><span
                            class="measure"><?php the_sub_field('item'); ?></span></div>
                    <?php endwhile; ?>

                    <?php endif; ?>
                </div>
            </div>
            <div class="nutrition--image"><?php echo wp_get_attachment_image($image, $size); ?></div>
        </div>

        <?php elseif ($nutType === 'img-left') : ?>

        <div class="nutrition--left <?php the_sub_field('text_align'); ?>">
            <div class="nutrition--image"><?php echo wp_get_attachment_image($image, $size); ?></div>
            <div class="nutrition--text">
                <div class="text-block__wrapper fmbottom <?php the_sub_field('tb_bg'); ?>">
                    <h2
                        class="<?php the_sub_field('heading_size'); ?> <?php the_sub_field('heading_size'); ?><?php the_sub_field('heading_colour'); ?>">
                        <?php the_sub_field('title'); ?></h2>
                    <?php the_sub_field('paragraphs'); ?>
                </div>
                <div class="nutrition--facts">
                    <?php if( have_rows('nutrition_stats') ): ?>

                    <?php while( have_rows('nutrition_stats') ): the_row();  ?>
                    <div class="nut-info tileup"><span class="counter"><?php the_sub_field('quantity'); ?></span><span
                            class="measure"><?php the_sub_field('item'); ?></span></div>
                    <?php endwhile; ?>

                    <?php endif; ?>
                </div>
            </div>




        </div>

        <?php elseif ($nutType === 'text-only') : ?>

        <div class="nutrition--just-text <?php the_sub_field('text_align'); ?>">
            <div class="nutrition--text">
                <div class="text-block__wrapper fmbottom <?php the_sub_field('tb_bg'); ?>">
                    <h2
                        class="<?php the_sub_field('heading_size'); ?> <?php the_sub_field('heading_size'); ?><?php the_sub_field('heading_colour'); ?>">
                        <?php the_sub_field('title'); ?></h2>
                    <?php the_sub_field('paragraphs'); ?>
                </div>
                <div class="nutrition--facts">
                    <?php if( have_rows('nutrition_stats') ): ?>

                    <?php while( have_rows('nutrition_stats') ): the_row();  ?>
                    <div class="nut-info tileup"><span class="counter"><?php the_sub_field('quantity'); ?></span><span
                            class="measure"><?php the_sub_field('item'); ?></span></div>
                    <?php endwhile; ?>

                    <?php endif; ?>
                </div>
            </div>



        </div>

        <?php endif; ?>


    </div>

</section>