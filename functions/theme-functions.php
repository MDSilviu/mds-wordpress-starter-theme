<?php
/**
 * File for other theme functions and filters
 *
 */

if ( ! function_exists( 'mds_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function mds_setup() {

        /**
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on , use a find and replace
         * to change '' to the name of your theme in all the template files
         */
        load_theme_textdomain( '', get_template_directory() . '/languages' );

        /**
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /**
         * Enable support for Post Thumbnails on posts and pages.
         *
         */
        add_theme_support( 'post-thumbnails' );


        /**
         * Register menu locations
         */
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', '' ),
        ) );

        /**
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        /**
         * Enable support for Post Formats.
         */
        add_theme_support( 'post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
        ) );

        /**
         * Set up the WordPress core custom background feature.
         */
        add_theme_support( 'custom-background', apply_filters( '_s_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );
    }
endif;
add_action( 'after_setup_theme', 'mds_setup' );

/**
 * Allow wp-editor in Option Tree Metaboxes
 */
add_filter( 'ot_override_forced_textarea_simple','__return_true' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mds_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'mds_content_width', 640 );
}
add_action( 'after_setup_theme', 'mds_content_width', 0 );


/**
 * Hide default post/pages admin screen options
 *
 * @param $hidden
 * @param $screen
 *
 * @return array
 */
add_filter('default_hidden_meta_boxes', 'mds_default_hidden_meta_boxes', 10, 2);
function mds_default_hidden_meta_boxes($hidden, $screen) {
    if ( 'post' == $screen->base ) {
        $hidden = array(
            'slugdiv',
            'trackbacksdiv',
            'postcustom',
            'commentstatusdiv',
            'commentsdiv',
            'authordiv',
            'revisionsdiv'
        );
    }

    return $hidden;
}

/**
 * Allow svg upload trough media library
 *
 * @param $mimes
 *
 * @return mixed
 */
add_filter('upload_mimes', 'mds_mime_types');
function mds_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    
    return $mimes;
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * 
 * @return array
 */
function mds_body_classes($classes) {
    if ( is_multi_author() ) {
        $classes[] = 'group-blog';
    }
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }
    return $classes;
}
add_filter( 'body_class', 'mds_body_classes' );