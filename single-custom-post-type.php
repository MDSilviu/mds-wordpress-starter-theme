<?php
/**
 * The template for displaying all single custom-post-type.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mds_starter_theme
 */
get_header(); ?>

    <?php
    while ( have_posts() ) : the_post();
        get_template_part( 'template-parts/content', get_post_format() );
        the_post_navigation();
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
    endwhile; // End of the loop.
    ?>


<?php
get_sidebar();
get_footer();