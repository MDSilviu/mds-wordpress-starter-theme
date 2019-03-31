<?php
/**
 * File for other theme functions and filters
 *
 */

if (!function_exists( 'mds_setup')) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    add_action('after_setup_theme', 'mds_setup');
    function mds_setup() {

        /**
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on , use a find and replace
         * to change '' to the name of your theme in all the template files
         */
        load_theme_textdomain('mds_starter_theme', get_template_directory() . '/languages');

        /**
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /**
         * Enable support for Post Thumbnails on posts and pages.
         *
         */
        add_theme_support('post-thumbnails');


        /**
         * Register menu locations
         */
        register_nav_menus(array(
            'primary' => __('Primary Menu', ''),
            'footer' => __('Footer Menu', ''),
        ));

        /**
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
    }
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
add_action( 'after_setup_theme', 'mds_content_width', 0 );
function mds_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'mds_content_width', 640 );
}

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
add_filter('body_class', 'mds_body_classes');
function mds_body_classes($classes) {
    if ( ! is_singular() ) {
        $classes[] = '';
    }
    return $classes;
}

/**
 * Get icons file url
 *
 * @return string
 */
function mds_get_icons_file_uri() {
    return get_template_directory_uri() . '/assets/theme/img/icons.svg';
}

/**
 * Get base link for load more
 *
 */
function mds_get_page_link_base() {
    $big = 999999999;
    echo str_replace( $big.'/', '', esc_url(get_pagenum_link($big)));
}

/**
 * Numbered Pagination
 *
 * @param null $the_query
 */
function mds_pagination($the_query = null) {

    if ($the_query) {
        $total = $the_query->max_num_pages;
    } else {
        global $wp_query;
        $total = $wp_query->max_num_pages;
    }

    $big = 999999999;
    if ($total > 1)  {
        if(get_option('permalink_structure')) {
            $format = 'page/%#%/';
        } else {
            $format = '&paged=%#%';
        }
        $pagination_links = paginate_links(array(
            'base'			=> str_replace( $big, '%#%', esc_url(get_pagenum_link($big) ) ),
            'format'		=> $format,
            'current'		=> max( 1, get_query_var('paged') ),
            'total' 		=> $total,
            'mid_size'		=> 1,
            'type' 			=> 'array',
            'prev_text'		=> '&lt;',
            'next_text'		=> '&gt;',
        ));

        foreach ($pagination_links as $link) {
            echo '<li>' . $link . '</li>';
        }
    }
}

