<?php
/**
 * File to include theme functions
 *
 * @package mds_starter_theme
 */

/**
 * Include Carbon Fields file
 */
require get_template_directory() . '/includes/carbon-fields/carbon-fields-plugin.php' ;

/**
 * Load theme options file.
 * Export theme options as a file and include it in the theme.
 */
require(get_template_directory()  . '/functions/theme-options.php' );

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
 * Load file for the plugin to remove comments option from theme .
 */
//require get_template_directory() . '/includes/remove-comments-absolute.php';

/**
 * Load file for the plugin to add multiple sidebars
 */
//require get_template_directory() . '/includes/multiple-sidebars.php';

/**
 * Load file for breadcrumbs.
 */
//require get_template_directory() . '/includes/breadcrumbs.php';


/**
 * Load custom post type files
 */
//require get_template_directory() .'/functions/custom-posts/custom-post-type.php';

/**
 * Load custom taxonomy files
 */
//require get_template_directory() .'/functions/custom-taxonomies/custom-taxonomy.php';

/**
 * Load custom metabox files
 */
require get_template_directory() . '/functions/carbon-custom-fields.php';



