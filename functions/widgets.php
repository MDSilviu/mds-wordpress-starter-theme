<?php
/**
 * File for all the theme custom widgets and widgets areas
 */

/**
 * Register widgets area.
 */
function mds_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'hantor' ),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
}
add_action( 'widgets_init', 'mds_widgets_init' );

/**
 * Disable wordpress widgets
 */
//add_action( 'widgets_init', 'mds_disable_widget' );
//function mds_disable_widget() {
//    unregister_widget('WP_Widget_Calendar');
//}

/**
 * Include Widget class file 
 */
//require get_template_directory() . '/functions/widgets/mds-video-widget.php';
/**
 * Register Custom Widgets
 */
/* Register the widget */
//add_action( 'widgets_init', 'mds_register_widgets');
//function mds_register_widgets(){
//    register_widget( 'MDS_Video_Widget' );
//};