<?php $typeSelector = get_sub_field('typeselect');
if($typeSelector === 'event'):
$today = date('Y-m-j H:i:s');
                    $posts = get_posts(array(
                        'posts_per_page' => 1, /* how many post you need to display */
                        'offset' => 0,
                        // 'orderby' => 'post_date',
                        // 'order' => 'DESC',
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
                        
                    ));
                   

                   if($posts): ?>
<?php foreach( $posts as $post ): 
        setup_postdata( $post );
        $terms = get_the_terms( get_the_ID(), 'location' );
        $location = get_field('location', $queried_object);
        ?>

<section class="container section-latest-block">
    <div class="latest-block--image">
        <div class="image">
            <?php echo get_the_post_thumbnail(get_the_ID(), 'large'); ?>
        </div>
    </div>
    <div class="latest-block--text">
        <div class="text">
            <?php if($typeSelector === 'post'):?>
            <h2 class="heading-2">News</h2>
            <h3 class="heading-4 heading-4--green">Featured Article</h3>
            <h1 class="heading-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <h3 class="heading-5"><?php echo get_the_date(); ?></h3>
            <?php else: ?>
            <h2 class="heading-2">Events</h2>
            <h3 class="heading-4 heading-4--green"><i class="fa-duotone fa-calendar-days"></i>
                <?php $startDate = date('j.m.y', strtotime(get_field('start_date_and_time')));
                        $endDate = date('j.m.y', strtotime(get_field('end_date_and_time')));
                                                                            echo $startDate; ?><?php if($startDate !== $endDate):?>
                - <?php 
                    echo $endDate; ?><?php endif;?></h3>
            <h1 class="heading-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <h3 class="heading-5">
                <?php if( $terms ): ?>
                <?php foreach( $terms as $term ): ?>
                <?php $icon = get_field('location', $term->taxonomy . '_' . $term->term_id);?>
                <?php echo $icon['address'] ?>
                <?php endforeach; ?>
                <?php endif; ?>
            </h3>
            <?php endif;?>

            <p><?php
                                    echo wp_trim_words(get_the_excerpt(), 30, '...');
                                    ?></p>
            <a href="<?php the_permalink(); ?>" class="button textonly"
                aria-label="Find out more about <?php the_title(); ?>">Read More<i
                    class="fa-sharp fa-light fa-arrow-right"></i></a>
        </div>
        <div class="center bounce">
            <i class="fa-sharp fa-light fa-chevron-down"></i>
        </div>

    </div>
</section>

<?php endforeach; ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>

<?php elseif ($typeSelector === 'post'): $posts = get_posts(array(
                        'posts_per_page' => 1, /* how many post you need to display */
                        'offset' => 0,
                        'orderby' => 'post_date',
                        'order' => 'DESC',
                        'post_type' => 'post', /* your post type name */
                        'post_status' => 'publish',
                        
                        
                    ));
                   

                   if($posts): ?>
<?php foreach( $posts as $post ): 
        setup_postdata( $post );
        $terms = get_the_terms( get_the_ID(), 'location' );
        $location = get_field('location', $queried_object);
        ?>

<section class="container section-latest-block">
    <div class="latest-block--image">
        <div class="image">
            <?php echo get_the_post_thumbnail(get_the_ID(), 'large'); ?>
        </div>
    </div>
    <div class="latest-block--text">
        <div class="text">
            <?php if($typeSelector === 'post'):?>
            <h2 class="heading-2">News</h2>
            <h3 class="heading-4 heading-4--green">Featured Article</h3>
            <h1 class="heading-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <h3 class="heading-5"><?php echo get_the_date(); ?></h3>
            <?php else: ?>
            <h2 class="heading-2">Events</h2>
            <h3 class="heading-4 heading-4--green"><i class="fa-duotone fa-calendar-days"></i>
                <?php $startDate = date('j.m.y', strtotime(get_field('start_date_and_time')));
                        $endDate = date('j.m.y', strtotime(get_field('end_date_and_time')));
                                                                            echo $startDate; ?><?php if($startDate !== $endDate):?>
                - <?php 
                    echo $endDate; ?><?php endif;?></h3>
            <h1 class="heading-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <h3 class="heading-5">
                <?php if( $terms ): ?>
                <?php foreach( $terms as $term ): ?>
                <?php $icon = get_field('location', $term->taxonomy . '_' . $term->term_id);?>
                <?php echo $icon['address'] ?>
                <?php endforeach; ?>
                <?php endif; ?>
            </h3>
            <?php endif;?>

            <p><?php
                                    echo wp_trim_words(get_the_excerpt(), 30, '...');
                                    ?></p>
            <a href="<?php the_permalink(); ?>" class="button textonly"
                aria-label="Find out more about <?php the_title(); ?>">Read More<i
                    class="fa-sharp fa-light fa-arrow-right"></i></a>
        </div>
        <div class="center bounce">
            <i class="fa-sharp fa-light fa-chevron-down"></i>
        </div>

    </div>
</section>

<?php endforeach; ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>

<?php endif; ?>