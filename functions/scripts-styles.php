<?php
/**
 * File that sets all the scripts and styles enqueued in your theme frontend/admin
 * 
 */

/**
 * Enqueue scripts and styles frontend.
 */
function mds_scripts() {

    /**
     * Include css for all pages
     */
    wp_enqueue_style( 'mds-app', get_template_directory_uri() . '/assets/theme/css/mds-app.min.css', array(), '1.0' );
    wp_enqueue_style( 'mds-custom', get_stylesheet_uri() );
    
    /**
     * Remove jquery from wp_header and include in wp_footer
     */
    wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/theme/js/plugins/jquery.min.js', FALSE, '3.2.1', TRUE );

	wp_enqueue_script( 'mds-theme-js', get_template_directory_uri() . '/assets/theme/js/mds-theme.min.js', array('jquery'), '1.0', TRUE );

	/**
	 * Include social share script
	 */
//	if (is_singular(array('post','project'))) {
//		wp_enqueue_script( 'openshare', get_template_directory_uri() . '/assets/theme/js/plugins/openshare.min.js', array(), '', TRUE );
//	}

	/**
	 * Add scripts attributes
	 */
	add_filter('script_loader_tag', 'mds_add_script_attributes', 10, 2);
	function mds_add_script_attributes($tag, $handle) {
		if ('openshare' === $handle) {
			return str_replace(' src', ' async src', $tag);
		} else {
			return str_replace(' src', ' defer src', $tag);
		}
	}
    
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
//    wp_enqueue_script('ajax-js', get_template_directory_uri() . '/assets/js/*.js', array(), '', TRUE);
//    wp_localize_script( 'ajax-js', 'object_name', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'nonce' => wp_create_nonce('nonce_name') ) );

}
add_action( 'wp_enqueue_scripts', 'mds_scripts' );

/**
 * Enqueue scripts and styles admin.
 */
function mds_admin_scripts() {
    wp_enqueue_style( 'mds-custom-admin', get_template_directory_uri() . '/assets/admin/css/mds-admin.css', false, '1.0.0' );
    
    wp_enqueue_script( 'mds-custom-admin-js', get_template_directory_uri() . '/assets/admin/js/mds-admin.js', array(), '1.0.0', TRUE );
}
add_action( 'admin_enqueue_scripts', 'mds_admin_scripts' );

