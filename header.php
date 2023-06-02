<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Campi_Ya_Kanzi
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://use.typekit.net/pdu2ebx.css">
    <script src="https://kit.fontawesome.com/3be7b1018b.js" crossorigin="anonymous"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>
    <title>
        <?php if(is_front_page() || is_home()){
			echo get_bloginfo('name');
		} else{
			echo wp_title('');
		}?>
    </title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header id="header" class="container">
        <nav id="main-navigation" class="row navigation">
            <div class="logo">
                <a href="<?php echo site_url(); ?>">
                    <?php get_template_part('inc/img/logo'); ?><h1 class="site-logo-header">
                        <?php the_field('header_title', 'options'); ?></h1>
                </a>
            </div>
            <div id="main-menu" class="main-menu">

               
                    <? wp_nav_menu(array(
                            'theme_location' => 'menu-1',
                            'container' => '',
                        )); ?>

               
            </div>
            <div class="hamburger-menu">
                <div class="hamburger"></div>
            </div>
            <?php $menuImage = get_field('menu_image','options'); ?>
            <div class="menu-container" style="background-image: url(<?php echo $menuImage['sizes']['hero-image']; ?>)">
                <? wp_nav_menu(array(
                            'theme_location' => 'off-menu',
                            'container' => '',
                        )); ?>
            </div>
        </nav>
    </header>