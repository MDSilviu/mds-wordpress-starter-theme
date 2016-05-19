<?php
/**
 * File that sets all the custom option types for Option Tree
 */
if ( ! function_exists( 'ot_type_mds_products_by_category' ) ) {
    /**
     * Custom Post type by categories
     *
     * @param array $args
     */
    function ot_type_mds_products_by_category( $args = array() ) {
        /* turns arguments array into variables */
        extract( $args );
        /* verify a description */
        $has_desc = $field_desc ? true : false;

        /* format setting outer wrapper */
        echo '<div class="format-setting type-custom-post-type-select ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';

        /* description */
        echo $has_desc ? '<div class="description">' . htmlspecialchars_decode( $field_desc ) . '</div>' : '';

        /* format setting inner wrapper */
        echo '<div class="format-setting-inner">';

        /* build category */
        echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="option-tree-ui-select ' . $field_class . '">';

        /* setup the post types */
        $post_type = isset( $field_post_type ) ? explode( ',', $field_post_type ) : array( 'post' );

        $query_args =  array(
            'post_type' => $post_type,
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
            'post_status' => 'any',
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $field_taxonomy
                ),

            )
        );

        /* query posts array */
        $my_posts = get_posts( $query_args  );

        /* has posts */
        if ( is_array( $my_posts ) && ! empty( $my_posts ) ) {
            echo '<option value="">-- ' . __( 'Choose One', 'option-tree' ) . ' --</option>';
            foreach( $my_posts as $my_post ) {
                $post_title = '' != $my_post->post_title ? $my_post->post_title : 'Untitled';
                echo '<option value="' . esc_attr( $my_post->ID ) . '"' . selected( $field_value, $my_post->ID, false ) . '>' . $post_title . '</option>';
            }
        } else {
            echo '<option value="">' . __( 'No Posts Found', 'option-tree' ) . '</option>';
        }

        echo '</select>';

        echo '</div>';

        echo '</div>';

    }

}

if ( ! function_exists( 'ot_type_mds_select_menu' ) ) {
    /**
     * Select a menu option type
     *
     * @param array $args
     */
    function ot_type_mds_select_menu( $args = array() ) {
        /* turns arguments array into variables */
        extract( $args );
        /* verify a description */
        $has_desc = $field_desc ? true : false;

        /* format setting outer wrapper */
        echo '<div class="format-setting type-custom-post-type-select ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';

        /* description */
        echo $has_desc ? '<div class="description">' . htmlspecialchars_decode( $field_desc ) . '</div>' : '';

        /* format setting inner wrapper */
        echo '<div class="format-setting-inner">';

        /* build category */
        echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="option-tree-ui-select ' . $field_class . '">';

        $menus = wp_get_nav_menus();

        /* has posts */
        if ( is_array( $menus ) && ! empty( $menus ) ) {
            echo '<option value="">-- ' . __( 'Choose One', 'option-tree' ) . ' --</option>';
            foreach( $menus as $menu ) {
                echo '<option value="' . esc_attr( $menu->term_id ) . '"' . selected( $field_value, $menu->term_id , false ) . '>' . $menu->name . '</option>';
            }
        } else {
            echo '<option value="">' . __( 'No Menus Found', 'option-tree' ) . '</option>';
        }

        echo '</select>';

        echo '</div>';

        echo '</div>';
    }
}

/**
 * Filter to add custom option types.
 *
 * @param     array     An array of option types.
 * @return    array
 */
function mds_add_custom_option_types($types) {
    $types['mds_products_by_category'] = 'Custom Posts By Category Select';
    $types['mds_select_menu'] = 'MDS Select Menu';

    return $types;
}
add_filter( 'ot_option_types_array', 'mds_add_custom_option_types' );



