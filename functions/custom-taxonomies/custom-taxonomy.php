<?php

/**
 * Registers custom taxonomy.
 */
add_action( 'init', 'mds_custom_taxonomy', 0 );
function mds_custom_taxonomy() {

    /* Set up the arguments for the taxonomy. */
    $args = array(

        /**
         * Include a description of the taxonomy.
         */
        'description'           => '', // string (default is NONE)

        /**
         * A plural descriptive name for the taxonomy marked for translation.
         * Default: overridden by $labels->name
         */
        'label'                 => __( 'Custom Taxonomies' ), // string (default overridden by $labels->name).

        /**
         * Labels used when displaying the taxonomy in the admin and sometimes on the front end.
         */
        'labels'            => array(
            'name'				            => __( 'Custom Taxonomies', 'mds_starter_theme' ),
            'singular_name'			        => __( 'Custom Taxonomy', 'mds_starter_theme' ),
            'menu_name'			            => __( 'Custom Taxonomy', 'mds_starter_theme' ),
            'all_items'			            => __( 'All Custom Taxonomies', 'mds_starter_theme' ),
            'view_item'                     => __( 'View Custom Taxonomy', 'mds_starter_theme' ),
            'edit_item'			            => __( 'Edit Custom Taxonomy', 'mds_starter_theme' ),
            'update_item'			        => __( 'Update Custom Taxonomy', 'mds_starter_theme' ),
            'add_new_item'			        => __( 'Add New Custom Taxonomy', 'mds_starter_theme' ),
            'new_item_name'			        => __( 'New Single Custom Taxonomy', 'mds_starter_theme' ),
            'parent_item'			        => __( 'Parent Custom Taxonomy', 'mds_starter_theme' ),
            'parent_item_colon'		        => __( 'Parent Custom Taxonomy', 'mds_starter_theme' ),
            'search_items'			        => __( 'Search Custom Taxonomy', 'mds_starter_theme' ),
            'popular_items'			        => __( 'Popular Custom Taxonomy', 'mds_starter_theme' ),
            'separate_items_with_commas'    => __( 'Separate Custom Taxonomy with commas', 'mds_starter_theme' ),
            'add_or_remove_items'	        => __( 'Add or remove Custom Taxonomy', 'mds_starter_theme'),
            'choose_from_most_used'	        => __( 'Choose from most used Custom Taxonomy', 'mds_starter_theme' ),
            'not_found'                     => __( 'No Custom Taxonomy found.', 'mds_starter_theme' )
        ),

        /**
         * If the taxonomy should be publicly queryable. This
         * argument is sort of a catchall for many of the following arguments.
         */
        'public'                => true, // bool (default is TRUE)

        /**
         * Whether to generate a default UI for managing this taxonomy.
         */
        'show_ui'               => true, // bool (defaults to 'public').

        /**
         * Whether taxonomy items are available for selection in navigation menus.
         */
        'show_in_nav_menus'     => true, // bool (defaults to 'public').

        /**
         * Whether to allow the Tag Cloud widget to use this taxonomy.
         */
        'show_tagcloud'         => false,// bool (defaults to 'show_ui').

        /**
         * Whether to show the taxonomy in the quick/bulk edit panel.
         */
        'show_in_quick_edit'    => true, // bool (defaults to 'show_ui').

        /**
         * Whether to allow automatic creation of taxonomy columns on associated post-types table.
         */
        'show_admin_column'     => false,// bool (default is FALSE)

        /**
         * Provide a callback function name for the meta box display.
         * No meta box is shown if set to false
         */
        'meta_box_cb'           => null, //callback function (default is NULL)

        /**
         * Is this taxonomy hierarchical (have descendants) like categories or not hierarchical like tags.
         */
        'hierarchical'          => false,// bool (default is FALSE)

        /**
         * A function name that will be called when the count of an associated $object_type, such as post, is updated.
         * Works much like a hook.
         */

        'update_count_callback' => '', //string (default is NONE)

        /**
         * Sets the query_var key for this taxonomy. If set to TRUE, the post type name will be used.
         * You can also set this to a custom string to control the exact key.
         */
        'query_var'             => 'custom-taxonomy', // bool|string (defaults to TRUE - post type name)


        /**
         * How the URL structure should be handled with this post type.  You can set this to an
         * array of specific arguments or true|false.  If set to FALSE, it will prevent rewrite
         * rules from being created.
         */
        'rewrite'               => array(

            /* The slug to use for individual posts of this type. */
            'slug'          => 'custom-post-type', // string (defaults to taxonomy's name slug)

            /* Allowing permalinks to be prepended with front base*/
            'with_front'    => false, // bool (defaults to TRUE)

            /* true or false allow hierarchical urls*/
            'hierarchical'  => false, // bool (defaults to FALSE)

            /* Assign an endpoint mask to this permalink. */
            'ep_mask'       => EP_PERMALINK, // const (defaults to  EP_NONE)
        ),

        /**
         * Provides more precise control over the capabilities than the defaults.  By default, WordPress
         * will use the 'capability_type' argument to build these capabilities.  More often than not,
         * this results in many extra capabilities that you probably don't need.
         */
        'capabilities'          => array( ),

        /**
         * Whether this taxonomy should remember the order in which terms are added to objects.
         */
        'sort'                  => false, // bool (default is NONE)
    );

    /**
     * Set up the arguments for the post type where taxonomy will be displayed.
     * Can be a custom post type or any of the registered post types: post, page, attachment, revision, nav_menu_item
     */
    $args_post_type = array(
        'custom-post-type'
    );

    register_taxonomy(
        'custom-taxonomy', //Taxonomy name. Max of 32 characters. Uppercase and spaces not allowed.
        $args_post_type, //Name of the post type for the taxonomy,
        $args
    );

}

