<?php $pageElements = get_field('page_element_headings', 'options');?>
<section class="container section-product-feature <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="featured-wrapper">
            <div class="feature-intro fmleft"><?php the_sub_field('text_block'); ?></div>
            <div class="feature-product fmright">
                <div class="title"><?php  ?></div><?php
                                            $item = get_sub_field('selected_product');
                                            if ($item) :
                                                $product = wc_get_product($item->ID); ?>
                <a href="<?php echo get_permalink($item); ?>"><?php
                                                                    
                                                                    echo '<div class="product-details">';
                                                                    echo $pageElements['month'];
                                                                    echo '<h3 class="heading-3">';
                                                                    echo get_the_title($item);
                                                                    echo '</h3>';
                                                                    echo '<button class="button prods__price">';
                                                                    echo $product->get_price_html();
                                                                    echo '</button></div>';
                    echo '<div class="product-image">';
                    echo get_the_post_thumbnail($item, 'large');
                    echo '</div>';
                                                                    ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>

</section>