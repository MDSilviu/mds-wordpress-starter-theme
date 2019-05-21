<?php
/**
 * Init composer packages
 */
add_action('after_setup_theme', 'mds_composer_packages_init');
function mds_composer_packages_init() {
	if (file_exists( __DIR__ . '/vendor/autoload.php')) {
		require( __DIR__ . '/vendor/autoload.php' );

		\Carbon_Fields\Carbon_Fields::boot();
		new \Carbon_Fields_Yoast\Carbon_Fields_Yoast;
		$timber = new \Timber\Timber();
	}
}
