<section class="container section-product-best section-product-best--shop <?php the_sub_field('bg_main'); ?>" id="best">
    <div class="row <?php the_sub_field('column_size'); ?>">
        <h4 class="heading-4">Products</h4>
        <h2 class="heading-1 heading-1--green">Our bestsellers<i class="fa-sharp fa-regular fa-angle-right"></i></h2>
        <div class="featured-wrapper">
            <?php echo do_shortcode('[products limit="8" class="best-selling-shop" best_selling="true" /]'); ?>
        </div>
        <?php 
$link = get_sub_field('shop_link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
        <a class="button shop-link tileup" href="<?php echo esc_url( $link_url ); ?>"
            target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><i
                class="fa-sharp fa-light fa-arrow-right"></i></a>
        <?php endif; ?>
    </div>
</section>