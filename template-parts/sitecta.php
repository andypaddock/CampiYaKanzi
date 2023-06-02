<?php if(isset($eventDateEnd)):?>
<?php
$todayDate = date("Y-m-d H:i:s");
$eventDateBegin = get_field('cta_start_time','options');
$eventDateEnd = get_field('cta_end_time','options');
if($todayDate > $eventDateBegin && $todayDate < $eventDateEnd):?>
<section class="container section-site-cta <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <?php
        $image = get_field('cta_image','options');
        $size = 'hero-image'; // (thumbnail, medium, large, full or custom size)
        ?>
        <div class="card">
            <div class="card__image__right">
                <div class="text-block <?php the_field('tb_bg'); ?>">
                    <div class="text-block__wrapper ">
                        <div class="sub-heading"><?php the_field('cta_sub_heading','options'); ?></div>
                        <h2 class="heading-1 heading-1--green"><?php the_field('cta_main_heading','options'); ?>
                        </h2>
                        <?php the_field('cta_text_block','options'); ?>
                        <?php
                            $link = get_field('cta_link','options');
                            if ($link) :
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                        <a class="button light button__inline" href="<?php echo esc_url($link_url); ?>"
                            target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?><i
                                class="fa-sharp fa-light fa-arrow-right"></i></a>
                        <?php endif; ?>

                    </div>

                </div>
                <div class="image">
                    <?php echo wp_get_attachment_image($image, $size); ?>
                </div>

            </div>


        </div>
    </div>

</section>
<?php endif;?>
<?php else: ?>
<?php
$todayDate = date("Y-m-d H:i:s");
$eventDateBegin = get_field('cta_start_time','options');
$eventDateEnd = get_field('cta_end_time','options');
if($todayDate > $eventDateBegin):?>
<section class="container section-site-cta <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <?php
        $image = get_field('cta_image','options');
        $size = 'hero-image'; // (thumbnail, medium, large, full or custom size)
        ?>
        <div class="card">
            <div class="card__image__right">
                <div class="text-block <?php the_field('tb_bg'); ?>">
                    <div class="text-block__wrapper ">
                        <div class="sub-heading"><?php the_field('cta_sub_heading','options'); ?></div>
                        <h2 class="heading-1 heading-1--green"><?php the_field('cta_main_heading','options'); ?>
                        </h2>
                        <?php the_field('cta_text_block','options'); ?>
                        <?php
                            $link = get_field('cta_link','options');
                            if ($link) :
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                        <a class="button light button__inline" href="<?php echo esc_url($link_url); ?>"
                            target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?><i
                                class="fa-sharp fa-light fa-arrow-right"></i></a>
                        <?php endif; ?>

                    </div>

                </div>
                <div class="image">
                    <?php echo wp_get_attachment_image($image, $size); ?>
                </div>

            </div>


        </div>
    </div>

</section>
<?php endif;?><?php endif;?>