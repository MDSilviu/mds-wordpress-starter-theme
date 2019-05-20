<?php
/**
 * File that sets all the filters and functions to disable/remove some feature for WordPress
 * Remove scripts and meta from header, disable rest api, xml-rpc, x-pingback
 */

/**
 * Disable WordPress Admin Bar for all users but admins.
 */
show_admin_bar(false);

/**
 * Disable the emoji's, remove all scripts related to emoji's
 */
add_action( 'init', 'mds_disable_emojis' );
function mds_disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'mds_disable_emojis_tinymce' );
}

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param    array  $plugins
 * @return   array
 */
function mds_disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

/**
 * Remove the wp-embed script
 */
add_action( 'wp_footer', 'mds_remove_wp_embed' );
function mds_remove_wp_embed(){
    wp_deregister_script( 'wp-embed' );
}

// Remove the REST API endpoint.
remove_action( 'rest_api_init', 'wp_oembed_register_route' );

// Turn off oEmbed auto discovery.
add_filter( 'embed_oembed_discover', '__return_false' );

// Don't filter oEmbed results.
remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

// Remove oEmbed discovery links.
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

// Remove oEmbed-specific JavaScript from the front-end and back-end.
remove_action( 'wp_head', 'wp_oembed_add_host_js' );

/**
 * Remove wlwmanifest link from header
 */
remove_action('wp_head', 'wlwmanifest_link');

/**
 * Remove rsd link from header
 */
remove_action('wp_head', 'rsd_link');

/**
 * Remove generator meta from header
 */
remove_action('wp_head', 'wp_generator');

/**
 * Disable XML-RPC
 */
add_filter( 'xmlrpc_enabled', '__return_false' );

/**
 * Disable x-pingback
 */
add_filter( 'wp_headers', 'mds_remove_x_pingback' );
function mds_remove_x_pingback($headers) {
    unset($headers['X-Pingback']);
    return $headers;
}

/**
 * Disable WP-API version 1.x
 */
add_filter('json_enabled', '__return_false');
add_filter('json_jsonp_enabled', '__return_false');

/**
 * Remove REST API info from head and headers
 */
remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links');
remove_action( 'template_redirect', 'rest_output_link_header', 11 );

/**
 * Remove excerpt textarea on posts
 */
add_action('admin_menu', 'mds_remove_default_excerpt_metabox');
function mds_remove_default_excerpt_metabox() {
	remove_meta_box('postexcerpt', 'post', 'normal');
	remove_meta_box('postexcerpt', 'page', 'normal');
}

/**
 * Disable registered taxonomies
 */
add_action('init', 'mds_unregister_taxonomies');
function mds_unregister_taxonomies() {
//    unregister_taxonomy_for_object_type('post_tag', 'post');
}

/**
 * Remove wordpress default widgets
 */
add_action('widgets_init', 'mds_disable_widget');
function mds_disable_widget() {
	unregister_widget('WP_Widget_Pages');
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_Links');
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Text');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Tag_Cloud');
	unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Nav_Menu_Widget');
	unregister_widget('WP_Widget_Search');
	unregister_widget('WP_Widget_Media_Audio');
	unregister_widget('WP_Widget_Media');
	unregister_widget('WP_Widget_Media_Image');
	unregister_widget('WP_Widget_Media_Video');
	unregister_widget('WP_Widget_Media_Gallery');
	unregister_widget('WP_Widget_Custom_HTML');
}