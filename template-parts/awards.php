<section class="container section-awards <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
    <h2 class="heading-2 align-cent">
                            Awards</h2>


        <?php if( have_rows('awards','options') ): ?>
        <ul class="awards-wrapper">
            <?php while( have_rows('awards','options') ): the_row(); 
        $image = get_sub_field('image');
        ?>
            <li>
                <?php 
$link = get_sub_field('link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                    <?php echo wp_get_attachment_image( $image, 'full' ); ?>

                </a>
                <?php else:?>
                <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                <?php endif; ?>
            </li>
            <?php endwhile; ?>
        </ul>
        <?php endif; ?>


    </div>
</section>