<section class="container section-gallery mb-md  <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <?php $images = get_sub_field('images');
$size = 'large'; // (thumbnail, medium, large, full or custom size)
$original = 'full';
$galleryLayout = get_sub_field('gallery_display');
if ($images) : ?>
        <div class="outer-container gallery-outer mb10">
            <div class="gallery-wrapper <?php if ($galleryLayout == "grid") : echo "gallery-wrapper__blocks";
                                    endif; ?>">
                <?php foreach ($images as $image_id) :
                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE); ?>
                <div class="gallery-image">
                    <a data-fslightbox="gallery" href="<?php echo wp_get_attachment_image_url($image_id, $original); ?>"
                        class="lightbox-gallery" alt="<?php echo $image_alt; ?>">
                        <?php echo wp_get_attachment_image($image_id, $size); ?></a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>

</section>