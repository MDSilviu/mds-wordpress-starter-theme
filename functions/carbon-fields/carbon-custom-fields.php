<?php

/**
 * Include theme options and metabox files
 */
add_action('carbon_fields_register_fields', 'mds_register_custom_fields');
function mds_register_custom_fields() {
	require_once get_template_directory() . '/functions/carbon-fields/Serialized_Theme_Options_Datastore.php';
	require_once get_template_directory() . '/functions/carbon-fields/Serialized_Post_Meta_Datastore.php';
    require_once get_template_directory() . '/functions/carbon-fields/options/theme-options.php';
}
