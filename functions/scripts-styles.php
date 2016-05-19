<?php
/**
 * File that sets all the scripts and styles enqueued in your theme frontend/admin
 * 
 */

/**
 * Enqueue scripts and styles frontend.
 */
function mds_starter_theme_scripts() {

    /**
     * Include css for all pages
     */
    wp_enqueue_style( 'mds-app-css', get_template_directory_uri() . '/assets/prod/css/mds-app.min.css', array(), '' );
    wp_enqueue_style( 'mds-custom-css', get_stylesheet_uri() );
    
    /**
     * Remove jquery from wp_header and include in wp_footer
     */
    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), FALSE, '1.11.3', TRUE );

    wp_enqueue_script( 'mds-plugins-js', get_template_directory_uri() . '/assets/prod/js/mds-plugins.min.js', array(), '', TRUE );
    wp_enqueue_script( 'mds-theme-js', get_template_directory_uri() . '/assets/prod/js/mds-app.min.js', array(), '', TRUE );

    
    /**
     * Include scripts for all pages
     */
//    wp_enqueue_script( 'template-js', get_template_directory_uri() . '/assets/js/*.js', array(), '', TRUE );

    /**
     * Include scripts for a specific page template
     */
//    if(is_page_template('page-templates/*.php')  )
//    {
//          wp_enqueue_script( 'template-js', get_template_directory_uri() . '/assets/js/*.js', array(), '', TRUE );
//    }

    /**
     * Include script with ajax and nonce
     */
//    wp_register_script('ajax-js', get_template_directory_uri() . '/assets/js/*.js', array(), '', TRUE);
//    wp_localize_script( 'ajax-js', 'object_name', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'nonce' => wp_create_nonce('nonce_name') ) );
//    wp_enqueue_script( 'ajax-js' );

}
add_action( 'wp_enqueue_scripts', 'mds_starter_theme_scripts' );

/**
 * Enqueue scripts and styles admin.
 */
function mds_starter_theme_admin_scripts() {
    wp_enqueue_style( 'mds-custom-admin-css', get_template_directory_uri() . '/assets/admin/css/mds-admin.css', false, '1.0.0' );
    
    wp_enqueue_script( 'mds-custom-admin-js', get_template_directory_uri() . '/assets/admin/js/mds-admin.js', array(), '1.0.0', TRUE );
}
add_action( 'admin_enqueue_scripts', 'mds_starter_theme_admin_scripts' );

