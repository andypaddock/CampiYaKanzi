<section class="container section-card product-recipe"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?> dark">
        <?php
        $image = get_sub_field('image');
        $size = 'hero-image'; // (thumbnail, medium, large, full or custom size)
        $cardType = get_sub_field('card_type');
        $pageElements = get_field('page_element_headings', 'options');
        $defaultText = get_field('recipe_headings', 'options'); ?>
        <div class="card">
            <div class="card__recipe">
                <div class="text-block <?php the_sub_field('tb_bg'); ?>">
                    <div class="text-block__wrapper">
                        <div class="recipe-month">

                            <h3 class="heading-5">Suggested Recipe</h3>
                            <?php
$currentMonth = date('F');
$featured_posts = get_field($currentMonth,'options');
if( $featured_posts ): ?>
                            <?php foreach( $featured_posts as $post ): 
        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post);?>
                            <h2 class="heading-1 heading-1--green"><?php the_title(); ?></h2>
                            <?php the_field( 'recipe_description' ); ?>
                            <div class="recipe-meta">
                                <div class="recipe-meta__cook"><span
                                        class="meta"><?php echo $defaultText['cook']; ?></span><?php the_field('cook_time'); ?>
                                </div>
                                <div class="recipe-meta__serves"><span
                                        class="meta"><?php echo $defaultText['serves']; ?></span><?php the_field('serves'); ?>
                                </div>
                            </div>
                            <a class="button button__inline"
                                href="<?php the_permalink(); ?>"><?php echo $pageElements['recipe_button_text']; ?><i
                                    class="fa-sharp fa-light fa-arrow-right"></i></a>
                            <?php endforeach; ?>
                            <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
                            <?php endif; ?>

                        </div>

                    </div>

                </div>
                <div class=" image">
                    <?php
$currentMonth = date('F');
$featured_posts = get_field($currentMonth,'options');
if( $featured_posts ): ?>
                    <?php foreach( $featured_posts as $post ): 
        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post);?>

                    <?php echo the_post_thumbnail('large'); ?>
                    <?php endforeach; ?>
                    <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>


            </div>



        </div>
    </div>

</section>