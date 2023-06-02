<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Campi_Ya_Kanzi
 */

?>
<?php $pageElements = get_field('page_element_headings', 'options'); ?>
<footer id="colophon" class="container">
    <div class="row col-10 latest-images">
        <h2 class="heading-2 heading-2--light"><?php the_field('instagram_title', 'options'); ?></h2>
        <?php echo do_shortcode('[instagram-feed feed=1]'); ?>
    </div>
    <div class="row footer-logo"> <a href="<?php echo site_url(); ?>">
            <?php get_template_part('inc/img/footerlogo'); ?>
        </a></div>
    <div class="row col-8 footer-accordian">
        <div class="footer-accordian--links">
            <div class="footer-accordian--heading">
                <h3 class="heading-4 footer-accordian--title"><?php echo $pageElements['footer_links_title']; ?></h3><i
                    class="fal fa-chevron-down fa-2x" aria-hidden="true"></i>
            </div>
            <div class="footer-accordian--content">
                <? wp_nav_menu(array(
                            'theme_location' => 'quick',
                            'container' => '',
                        )); ?>
            </div>
        </div>
        <div class="footer-accordian--contact">
            <div class="footer-accordian--heading">
                <h3 class="heading-4 footer-accordian--title"><?php echo $pageElements['footer_contact_title']; ?></h3>
                <i class="fal fa-chevron-down fa-2x" aria-hidden="true"></i>
            </div>
            <div class="footer-accordian--content"> <div class="contacts-wrapper">
                <div class="address">
                <?php the_field('address', 'options'); ?>
            </div>
            <div class="email"><?php
                                $link = get_field('email', 'options');
                                if ($link) :
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                <a href="<?php echo esc_url($link_url); ?>"
                    target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                <?php endif; ?>
            </div>
            <div class="phone"><?php
                                $link = get_field('phone_number', 'options');
                                if ($link) :
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                <a href="<?php echo esc_url($link_url); ?>"
                    target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                <?php endif; ?>
            </div>
                                </div></div>
        </div>
    </div>
    <div class="row col-8 footer-gutter">
        <div class="footer__social"><?php if (have_rows('social_media_links', 'options')) : ?>
            <ul class="social-links">
                <?php while (have_rows('social_media_links', 'options')) : the_row(); ?>

                <li>
                    <?php
                                                $link = get_sub_field('link', 'options');
                                                if ($link) :
                                                    $link_url = $link['url'];
                                                    $link_title = $link['title'];
                                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                    <a href="<?php echo esc_url($link_url); ?>"
                        target="<?php echo esc_attr($link_target); ?>"><?php the_sub_field('icon', 'options'); ?></a>
                    <?php endif; ?>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php endif; ?>
        </div>
        <div class="terms">
            <div class="copyright"><?php the_field('copy_text', 'options'); ?></div>
        </div>
        <div class="silverless"><a href="https://silverless.co.uk">

                <?php get_template_part('inc/img/silverless', 'logo'); ?>

            </a></div>
    </div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>
</body>

</html>