<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything
 *
 * @package mds_starter_theme
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="mds-body-wrapper">

    <header class="mds-header">

        <div class="mds-logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="mds_starter_theme">
                <img src="<?php echo carbon_get_theme_option('header_logo'); ?>" alt="mds_starter_theme">
            </a>
        </div>
        <!-- /.mds-logo -->

        <nav class="mds-main-nav">
            <div class="mds-hamburger-wrapper">
                <div class="mds-hamburger"></div>
                <!-- /.mds-hamburger -->
            </div>
            <!-- /.mds-hamburger-wrapper -->

            <ul class="mds-custom-list mds-main-menu">
                <?php if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'depth' => 1,
                        'container' => false,
                        'items_wrap' => '%3$s'
                    ));
                } ?>
            </ul>
        </nav>
        <!-- /.mds-main-nav -->

    </header>
    <!-- /.mds-header -->
    <main class="mds-main">


