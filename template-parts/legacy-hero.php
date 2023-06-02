<div class="sub-page hero-wrapper anchor-top">
    <section
        class="container header full-image imageoff-<?php the_field('mobile_offset'); ?> <?php the_field('hero_height'); ?>  anchor-<?php the_field('image_anchor'); ?>"
        style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'hero-image'); ?>)">
        <?php if ( !is_single() ) { ?>
        <div class="hero-textblock">
            <h1 class="heading-1 heading-1--light tileup">
                <?php if (get_sub_field('hero_heading')): ?><?php the_sub_field('hero_heading'); ?><?php else: ?><?php the_title(); ?><?php endif ?>
            </h1>
            <?php 
$link = get_sub_field('hero_link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
            <a class="button light tileup" href="<?php echo esc_url( $link_url ); ?>"
                target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><i
                    class="fa-sharp fa-light fa-arrow-right"></i></a>
            <?php endif; ?>
        </div>
        <?php } ?>
        <div class="center-wrapper">
            <div class="center bounce">
                <i class="fa-sharp fa-solid fa-chevron-down"></i>
            </div>
        </div>
    </section>
    <?php if ( is_single() ) { ?>
    <section class="container news-meta">
        <?php wpb_posts_nav(); ?>
        <div class="row col-8">
            <h3 class="heading-5 heading-5--green tileup">
                <?php echo get_the_date(); ?>
            </h3>
            <h1 class="heading-1 tileup">
                <?php if (get_sub_field('hero_heading')): ?><?php the_sub_field('hero_heading'); ?><?php else: ?><?php the_title(); ?><?php endif ?>
            </h1>

        </div>
    </section>
    <?php } ?>

</div>