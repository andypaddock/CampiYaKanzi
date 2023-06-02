<?php $pageElements = get_field('page_element_headings', 'options'); ?>
<section class="container section-blog-feed"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="blog-feed-wrapper row <?php the_sub_field('column_size'); ?>">

        <div class="blog-filters controls">
            <?php if (get_sub_field('show_filters')) : ?>
            <div class=" checkbox-group" role="group" aria-label="filter">

                <?php
    $all_categories = get_categories(array(
        'hide_empty' => true
    ));
    ?>

                <?php foreach ($all_categories as $category) : ?>
                <div class="checkbox recipe-filter-item">

                    <input type="checkbox" id="<?php echo $category->slug; ?>" name="<?php echo $category->slug; ?>"
                        value=".<?php echo $category->slug; ?>">
                    <label for="<?php echo $category->slug; ?>"
                        class="filter-label"><?php echo $category->name; ?></label>
                </div>
                <?php endforeach; ?>


            </div>
            <?php endif; ?>
        </div>
        <div class="blog-content filter-content">
            <?php

            $args = array(
                'posts_per_page' => 99, /* how many post you need to display */
                'offset' => 1,
                'orderby' => 'post_date',
                'order' => 'DESC',
                'post_type' => 'post', /* your post type name */
                'post_status' => 'publish'
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();

            ?>
            <?php
        $categories = get_the_category();
        $slugs = wp_list_pluck($categories, 'slug');
        $class_names = join(' ', $slugs);
        ?>
            <div id="blog-<?php echo $post->ID ?>"
                class="blog mix <?php if ($class_names) { echo ' ' . $class_names;} ?>">
                <div class="blog-image">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>"
                        alt="<?php the_title_attribute(); ?>" />
                </div>
                <div class="text">
                    <div class="heading">
                        <h2 class="heading-4 heading-4--green"><?php the_title(); ?></h2>
                    </div>

                    <div class="recipe-meta">
                        <div class="recipe-meta__cook"><span
                                class="meta"><?php echo $defaultText['cook']; ?></span><?php the_field('cook_time'); ?>
                        </div>
                        <div class="recipe-meta__serves"><span
                                class="meta"><?php echo $defaultText['serves']; ?></span><?php the_field('serves'); ?>
                        </div>
                    </div>

                    <div class="description">
                        <p><?php echo wp_trim_words(get_the_excerpt(), 30, '...');?></p>
                    </div>
                    <div class="itin-button"> <a class="button" href="<?php the_permalink(); ?>" class="button textonly"
                            aria-label="Find out more about <?php the_title(); ?>"><?php echo $pageElements['news_button_text']; ?><i
                                class="fa-sharp fa-light fa-arrow-right"></i></a>
                    </div>



                </div>
            </div>
            <?php
                endwhile;
            endif;
            // Restore original post data.
            wp_reset_postdata();


            $args2 = array(
                'posts_per_page' => -1, /* how many post you need to display */
                'offset' => 0,
                'orderby' => 'post_date',
                'order' => 'DESC',
                'post_type' => 'itinerary', /* your post type name */
                'post_status' => 'publish'
            );
            $query2 = new WP_Query($args);
            if ($query2->have_posts()) : ?>
            <script>
            const camps = {
                "type": "FeatureCollection",
                "features": [
                    <?php while ($query2->have_posts()) : $query2->the_post(); ?>
                    <?php if (have_rows('itinerary_daily_planner')) : ?>
                    <?php while (have_rows('itinerary_daily_planner')) : the_row();  ?>
                    <?php $featured_posts = get_sub_field('activities');
                                        if ($featured_posts) : ?>
                    <?php foreach ($featured_posts as $featured_post) :

                                                $location = get_field('location', $featured_post->ID);

                                            ?> {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Point',
                            'coordinates': [<?php echo esc_attr($location['lng']); ?>,
                                <?php echo esc_attr($location['lat']); ?>
                            ]
                        },
                        'properties': {
                            'title': '<?php the_sub_field('day_title'); ?>',
                            'ident': '<?php echo $post->ID ?>',
                        }
                    },

                    <?php endforeach; ?>
                    <?php endif; ?>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    <?php
                            endwhile; ?>

                ]
            };
            </script>
            <?php endif;
            // Restore original post data.
            wp_reset_postdata();
            ?>




        </div>

    </div>

</section>