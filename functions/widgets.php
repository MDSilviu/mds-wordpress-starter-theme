<?php
/**
 * File for all the theme custom widgets and widgets areas
 */

/**
 * Register widgets area.
 */
add_action('widgets_init', 'mds_widgets_init');
function mds_widgets_init() {
    register_sidebar( array(
        'name'          => __('Sidebar', 'mds_starter_theme'),
        'id'            => 'mds-sidebar-1',
        'description'   => '',
        'before_widget' => '<aside id="mds-%1$s" class="mds-widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="mds-widget-title">',
        'after_title'   => '</h1>',
    ) );
}


/**
 * Disable wordpress widgets
 */
//add_action( widgets_init', 'mds_disable_widget');
//function mds_disable_widget() {
//    unregister_widget('WP_Widget_Pages');
//    unregister_widget('WP_Widget_Calendar');
//    unregister_widget('WP_Widget_Archives');
//    unregister_widget('WP_Widget_Links');
//    unregister_widget('WP_Widget_Meta');
//    unregister_widget('WP_Widget_Text');
//    unregister_widget('WP_Widget_Recent_Posts');
//    unregister_widget('WP_Widget_Recent_Comments');
//    unregister_widget('WP_Widget_RSS');
//    unregister_widget('WP_Widget_Tag_Cloud');
//    unregister_widget('WP_Widget_Categories');
//    unregister_widget('WP_Nav_Menu_Widget');
//    unregister_widget('WP_Widget_Search');
//}

/**
 * Include Widget class file 
 */
//require get_template_directory() . '/functions/widgets/mds-video-widget.php';
/**
 * Register Custom Widgets
 */
/* Register the widget */
//add_action('widgets_init', 'mds_register_widgets');
//function mds_register_widgets(){
//    register_widget('MDS_Video_Widget');
//};