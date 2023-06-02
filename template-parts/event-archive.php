<?php $pageElements = get_field('page_element_headings', 'options');
$defaultText = get_field('recipe_headings', 'options'); ?>
<?php
$today = date('Y-m-j H:i:s');
            $args = array(
                'posts_per_page' => 99, /* how many post you need to display */
                'offset' => 1,
                'post_type' => 'event', /* your post type name */
                'post_status' => 'publish',
                'meta_key' => 'start_date_and_time',
                'orderby' => 'meta_value',
                'order' => 'ASC',
                'meta_query' => array(
                            array(
                                'key' => 'start_date_and_time',
                                'value' => $today,
                                'type' => 'DATE',
                                'compare' => '>='
                            )
                            ),
                            
                            
                            
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
            ?>
<?php $terms = wp_get_post_terms($post->ID, 'recipe_type');?>

<section class="container section-event"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="event-wrapper row <?php the_sub_field('column_size'); ?>">


        <div class="event">

            <div class="text">
                <div class="event-date meta"><i class="fa-duotone fa-calendar-days"></i>
                    <?php $startDate = date('j.m.y', strtotime(get_field('start_date_and_time')));
                        $endDate = date('j.m.y', strtotime(get_field('end_date_and_time')));
                                                                            echo $startDate; ?><?php if($startDate !== $endDate):?>
                    - <?php 
                    echo $endDate; ?><?php endif;?></div>
                <div class="heading">
                    <h2 class="heading-1"><?php the_title(); ?></h2>
                </div>



                <div class="description">
                    <p><?php the_excerpt() ?></p>
                </div>
                <div class="itin-button"> <a class="button" href="<?php the_permalink(); ?>" class="button textonly"
                        aria-label="Find out more about <?php the_title(); ?>"><?php echo $pageElements['read_more']; ?><i
                            class="fa-sharp fa-light fa-arrow-right"></i></a>
                </div>



            </div>
            <div class="event-image">
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>"
                    alt="<?php the_title_attribute(); ?>" />
            </div>
        </div>






    </div>

    </div>

</section>

<?php
                endwhile;
            endif;
            // Restore original post data.
            wp_reset_postdata(); ?>