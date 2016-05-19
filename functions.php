<?php
/**
 * File to include theme functions
 *
 * @package mds_starter_theme
 */

/**
 * Set Option Tree in theme mode.
 * Needed when it's included in the theme and not as a plugin
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Disable Option Tree admin settings builder
 * Uncomment when theme is ready for production
 */
//add_filter( 'ot_show_pages', '__return_false' );
/**
 * Required: include Option Tree.
 */
require get_template_directory() . '/admin/ot-loader.php' ;

/**
 * Load theme options file.
 * Export theme options as a file and include it in the theme.
 */
//require(get_template_directory()  . '/functions/theme-options.php' );

/**
 * Load file with custom Option Tree types
 */
//require(get_template_directory()  . '/functions/ot-custom-types.php' );

/**
 * Load the file with filters and functions to disable/remove some feature for WordPress
 */
//require get_template_directory() . '/functions/disable.php';

/**
 * Load the file with required plugins
 */
require get_template_directory() . '/functions/plugins-activation.php';

/**
 * Load the file with other theme functions
 */
require get_template_directory() . '/functions/theme-functions.php';

/**
 * Load the file with theme script and styles
 */
require get_template_directory() . '/functions/scripts-styles.php';

/**
 * Load the file with theme custom image sizes
 */
require get_template_directory() . '/functions/image-size.php';

/**
 * Load the file for sidebars init and custom widgets
 */
require get_template_directory() . '/functions/widgets.php';

/**
 * Load the file with theme shortcodes
 */
require get_template_directory() . '/functions/shortcode.php';

/**
 * Load the file for woocomerce compatibility  and functions
 */
//require get_template_directory() . '/functions/woocommerce.php';


/**
 * Load file with custom template tags.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Load file for Jetpack plugin compatibility.
 */
//require get_template_directory() . '/inc/jetpack.php';

/**
 * Load file for the plugin to remove comments option from theme .
 */
//require get_template_directory() . '/inc/remove-comments-absolute.php';

/**
 * Load file for the plugin to add multiple sidebars
 */
//require get_template_directory() . '/inc/multiple-sidebars.php';


/**
 * Load custom post type file
 */
require get_template_directory() .'/functions/customposts/custom-post-type.php';

/**
 * Load custom metabox file.
 */
require get_template_directory() . '/functions/metaboxes/custom-post-type-metabox.php';



