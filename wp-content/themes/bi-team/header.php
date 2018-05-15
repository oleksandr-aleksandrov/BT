<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bi-team
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="main-header">
    <nav class="navbar navbar-expand-lg navbar-light bg-white p-0">
        <div class="container h-100">
            <?php $logo = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'header_logo'); ?>
            <a class="d-block" href="<?php bloginfo('url'); ?>">
                <img class="img-fluid" src="<?php echo $logo[0]; ?>" alt="<?php bloginfo('name'); ?>"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <?php
                wp_nav_menu(array(
                    'theme_location' => 'menu-1',
                    'menu_id' => 'primary-menu',
                    'menu_class' => 'header-main-menu d-flex flex-column flex-lg-row justify-content-end align-items-center navbar-nav ml-auto font-weight-bold',
                    'container' => false
                ));
                ?>
            </div>
        </div>
    </nav>
</header>

<main>
