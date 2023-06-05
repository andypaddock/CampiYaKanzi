<section class="container section-accordion <?php the_sub_field('bg_main'); ?>"
    id="<?php the_sub_field('section_id'); ?>">
    <div class="toggle-block row <?php the_sub_field('column_size'); ?>">

        <?php if( have_rows('accordion_item') ): $count = 0; while ( have_rows('accordion_item') ) : the_row(); ?>

        <div class="item tile">

            <label>
                <h2 class="heading-4"><?php the_sub_field('title'); ?></h2>
                <i class="fal fa-chevron-right fa-2x"></i>
            </label>
            <div class="content mb2">
                <?php the_sub_field('description'); ?>
            </div>

        </div>

        <?php $count++; endwhile; endif; ?>
    </div>
</section>