<?php
/**
 * File that sets all the custom srcset sizes for the theme
 */

/**
 * Remove srcset max image width
 *
 * @param $max_width
 * @return bool
 */
add_filter( 'max_srcset_image_width', 'mds_set_max_srcset_image_width' );
function mds_set_max_srcset_image_width($max_width) {
    return 2560;
}

/**
 * Change Image sizes attribute value
 *
 * @param $attr
 * @param $attachment
 * @param $size
 * @return mixed
 */
//add_filter('wp_get_attachment_image_attributes', 'mds_img_sizes_attr', 10 , 3);
function mds_img_sizes_attr($attr, $attachment, $size) {
    if (is_page_template('page-templates/*-template.php')) {
        $attr['sizes'] = '(min-width: 1140px) 1140px, 100vw';
    }

    return $attr;
}

/*
 * Custom sizes attribute values
 */
function mds_get_image_size($type) {
    $image_sizes = '';

    if ($type === '') {
        $image_sizes = '(min-width: 751px) 33.33vw, 100vw';
    }

    return $image_sizes;
}

/**
 * Prepare image for lazy load
 *
 * @param $attr
 * @param $attachment
 * @param $size
 * @return mixed
 */
add_filter('wp_get_attachment_image_attributes', 'mds_image_attr', 10, 3);
function mds_image_attr($attr, $attachment, $size) {
	if (in_array('mds-lazy', explode(' ', $attr['class']))) {
		$image = wp_get_attachment_image_src($attachment->ID, $size);
		$svg_placeholder = base64_encode("<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 ". $image[1] ." ". $image[2] ."\"></svg>");
		if (!isset($attr['srcset']) || empty($attr['srcset'])) {
			$attr['data-srcset'] = $attr['src'];
		} else {
			$attr['data-srcset'] = $attr['srcset'];
		}
		$attr['srcset'] = "data:image/svg+xml;base64,". $svg_placeholder;
	}

	return $attr;
}
