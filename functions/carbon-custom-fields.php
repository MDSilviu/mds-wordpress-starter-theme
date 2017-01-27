<?php

/**
 * Include theme options and metabox files
 */
add_action('carbon_register_fields', 'mds_register_custom_fields');
function mds_register_custom_fields() {
    require_once(get_template_directory() . '/functions/theme-functions.php');
    require_once(get_template_directory() . '/functions/meta-boxes/custom-post-type-metabox.php');
}