<section class="container section-card <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <?php
        $image = get_sub_field('image');
        $size = 'hero-image'; // (thumbnail, medium, large, full or custom size)
        $cardType = get_sub_field('card_type');
        $pageElements = get_field('page_element_headings', 'options');
        ?>
        <div class="card mb-sm">

            <?php if ($cardType == 'triple') : ?>


            <?php
$featured_posts = get_sub_field('triple_links');
if( $featured_posts ): ?>
            <div class="triple-cards">
                <?php foreach( $featured_posts as $post ): 

        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); ?>
                <div class="triple-cards--card">
                    <a class="top-link" href="<?php the_permalink(); ?>"><i
                            class="fa-sharp fa-light fa-square-chevron-right"></i></a>
                    <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php echo get_the_post_thumbnail_url($post, 'hero-image'); ?>"
                        alt="<?php the_title(); ?>">
                    <?php endif; ?>
                    <a href="<?php the_permalink(); ?>">
                        <h2 class="heading-2 heading-2--light"><?php the_title(); ?></h2>
                    </a>

                </div>
                <?php endforeach; ?>
            </div>
            <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
            <?php endif; ?>


            <?php elseif ($cardType === 'fullwidth') : ?>
            <div class="card__fullwidth">

                <?php
$featured_post = get_sub_field('large_page_link');
if ($featured_post):
    ?>
                <div class="link-text">
                    <h2 class="heading-2 heading-2--light"><?php echo esc_html($featured_post->post_title); ?></h2>
                    <?php the_sub_field('large_link_description'); ?>
                    <a class="bottom-link" href="<?php the_permalink($featured_post->ID); ?>"><i
                            class="fa-sharp fa-light fa-square-chevron-right"></i></a>
                </div>

                <?php
    $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($featured_post->ID), 'hero-image');
    if ($thumbnail) :
        ?>
                <img src="<?php echo $thumbnail[0]; ?>" alt="<?php echo esc_attr($featured_post->post_title); ?>">
                <?php endif; ?>
                <?php endif; ?>







            </div>
            <?php elseif ($cardType === 'imageleft') : ?>
            <div class="card__image__left">
                <div class="image">
                    <?php echo wp_get_attachment_image($image, $size); ?>
                </div>
                <div class="text-block <?php the_sub_field('tb_bg'); ?>">
                    <div class="text-block__wrapper fmright">
                        <div class="sub-heading"><?php the_sub_field('sub_heading'); ?></div>
                        <h2 class="heading-1 heading-1--green"><?php the_sub_field('main_heading'); ?></h2>
                        <?php the_sub_field('text_block'); ?>
                        <?php
                            $link = get_sub_field('link');
                            if ($link) :
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                        <a class="button button__inline" href="<?php echo esc_url($link_url); ?>"
                            target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?><i
                                class="fa-sharp fa-light fa-arrow-right"></i></a>
                        <?php endif; ?>

                    </div>

                </div>


            </div>
            <?php elseif ($cardType === 'imageright') : ?>
            <div class="card__image__right">
                <div class="text-block <?php the_sub_field('tb_bg'); ?>">
                    <div class="text-block__wrapper fmleft">
                        <div class="sub-heading"><?php the_sub_field('sub_heading'); ?></div>
                        <h2 class="heading-1 heading-1--green"><?php the_sub_field('main_heading'); ?></h2>
                        <?php the_sub_field('text_block'); ?>
                        <?php
                            $link = get_sub_field('link');
                            if ($link) :
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                        <a class="button button__inline" href="<?php echo esc_url($link_url); ?>"
                            target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?><i
                                class="fa-sharp fa-light fa-arrow-right"></i></a>
                        <?php endif; ?>

                    </div>

                </div>
                <div class="image">
                    <?php echo wp_get_attachment_image($image, $size); ?>
                </div>

            </div>
            <?php endif; ?>

        </div>
    </div>

</section>