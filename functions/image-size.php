<?php
/**
 * File that sets all the custom image sizes for your theme
 */

//add_image_size('cropped', 90, 90, true);//crop  the picture
//add_image_size('resize', 700, 9999);//resize the width of the picture

add_image_size('mds-size-2560', 2560, 9999);//resize the width of the picture
add_image_size('mds-size-1920', 1920, 9999);//resize the width of the picture
//add_image_size('mds-size-1440', 1440, 9999);//resize the width of the picture
add_image_size('mds-size-1280', 1280, 9999);//resize the width of the picture
//add_image_size('mds-size-1024', 1024, 9999);//resize the width of the picture
add_image_size('mds-size-768', 768, 9999);//resize the width of the picture
//add_image_size('mds-size-480', 480, 9999);//resize the width of the picture

/**
 *
 * Remove default image sizes
 * @param $sizes
 * @return mixed
 */
add_filter('intermediate_image_sizes_advanced', 'mds_remove_default_image_sizes');
function mds_remove_default_image_sizes($sizes) {
    unset($sizes['medium']);
    unset($sizes['medium_large']);
    unset($sizes['large']);

    return $sizes;
}

/**
 * Add new custom image sizes to admin area
 *
 * @param $sizes
 *
 * @return array
 */
add_filter( 'image_size_names_choose', 'mds_admin_custom_sizes' );
function mds_admin_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'mds-size-2560' => __( '2560px Width' ),
        'mds-size-1920' => __( '1920 Width' ),
//        'mds-size-1440' => __( '1440 Width' ),
        'mds-size-1280' => __( '1280 Width' ),
//        'mds-size-1024' => __( '1024 Width' ),
        'mds-size-768' => __( '768 Width' ),
//        'mds-size-480' => __( '480 Width' ),
    ) );
}


