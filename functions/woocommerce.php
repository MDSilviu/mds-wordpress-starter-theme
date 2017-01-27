<?php
/**
 * File to add woocommerce theme support and woocommerce functions
 *
 */

/**
 * Woocommerce content wrapper needed for woocommerce support
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'mds_woocommerce_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'mds_woocommerce_wrapper_end', 10);
function mds_woocommerce_wrapper_start() {
    echo '<section id="mds-woocommerce-main">';
}
function mds_woocommerce_wrapper_end() {
    echo '</section>';
}

/**
 * Add theme support for woocommerce
 */
add_action( 'after_setup_theme', 'mds_woocommerce_support' );
function mds_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}