<?php
/**
 * File for rest api functions and filters
 *
 */

/**
 * Remove initial rest api endpoints
 */
remove_action('rest_api_init', 'create_initial_rest_routes', 99);

/**
 * Change rest api endpoint route
 *
 * @return string
 */
add_filter('rest_url_prefix', 'mds_rest_url_prefix');
function mds_rest_url_prefix() {
	return 'api';
}

/**
 * Get image details
 *
 * @param $attachment_id
 * @param string $size
 *
 * @return array
 */
function mds_get_image($attachment_id = null, $size = 'full', $classes = null) {
	if (!$attachment_id) {
		return array();
	}

	$image_data = array();
	$image      = wp_get_attachment_image_src($attachment_id, $size);
	if ($image) {
		list($src, $width, $height) = $image;

		$attr = array(
			'src'    => $src,
			'width'  => $width,
			'height' => $height,
			'srcSet' => $src,
			'sizes'  => ''
		);

		$image_meta = wp_get_attachment_metadata($attachment_id);

		if (is_array($image_meta)) {
			$size_array = array(absint($width), absint($height));
			$srcset     = wp_calculate_image_srcset($size_array, $src, $image_meta, $attachment_id);

			if ($srcset) {
				$attr['srcSet'] = $srcset;
			}

			if (!$attr['sizes']) {
				$attr['sizes'] = wp_calculate_image_sizes($size_array, $src, $image_meta, $attachment_id);
			}
		}

		if ($classes) {
			$attr['className'] = $classes;
		}

		$image_data = array_map('esc_attr', $attr);
	}

	return $image_data;
}