<?php
/**
 * File with the theme custom options.
 * Replace this file with the one exported from Option Tree settings builder
 */

/**
 * Initialize the custom theme options.
 */
add_action('init', 'custom_theme_options');

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
    /* OptionTree is not loaded yet, or this is not an admin request */
    if (!function_exists('ot_settings_id') || !is_admin())
        return false;

    /**
     * Get a copy of the saved settings array.
     */
    $saved_settings = get_option(ot_settings_id(), array());

    /**
     * Custom settings array that will eventually be
     * passes to the OptionTree Settings API Class.
     */
    $custom_settings = array();

    /* allow settings to be filtered before saving */
    $custom_settings = apply_filters(ot_settings_id() . '_args', $custom_settings);

    /* settings are not the same update the DB */
    if ($saved_settings !== $custom_settings) {
        update_option(ot_settings_id(), $custom_settings);
    }

    /* Lets OptionTree know the UI Builder is being overridden */
    global $ot_has_custom_theme_options;
    $ot_has_custom_theme_options = true;
}