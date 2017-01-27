<?php
/**
 * File that sets all the custom image sizes for your theme
 */

//add_image_size('cropped', 90, 90, true);//crop  the picture
//add_image_size('resize', 700, 9999);//resize the width of the picture

/**
 * Add new custom image sizes to admin area
 *
 * @param $sizes
 *
 * @return array
 */
//add_filter( 'image_size_names_choose', 'mds_admin_custom_sizes' );
//function mds_admin_custom_sizes( $sizes ) {
//    return array_merge( $sizes, array(
//        'cropped' => __( 'Cropped' ),
//        'resize' => __( 'Resize' ),
//    ) );
//}


/**
 *
 * Remove default image sizes
 * @param $sizes
 * @return mixed
 */
//add_filter('intermediate_image_sizes_advanced', 'mds_remove_default_image_sizes');
//function mds_remove_default_image_sizes($sizes) {
//    unset($sizes['medium']);
//    unset($sizes['medium_large']);
//    unset($sizes['large']);
//
//    return $sizes;
//}