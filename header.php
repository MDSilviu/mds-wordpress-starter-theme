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
    <header>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" title="mds_starter_theme">
            <img src="" alt="mds_starter_theme">
        </a>
        <div class="nav-wrap">
            <nav class="menu">
                <ul>
                    <?php
                    if ( has_nav_menu( 'primary' ) ) {
                        wp_nav_menu(array('theme_location' => 'primary', 'depth' => 2, 'container' => false,  'items_wrap' => '%3$s'));
                    }
                    else
                    {
                        echo "Create a menu and assign it to Primary location";
                    }
                    ?>
                </ul>
            </nav><!-- end .menu -->
        </div>
    </header><!-- end .header -->

