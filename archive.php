<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mds_starter_theme
 */

get_header(); ?>


    <?php
    if ( have_posts() ) : ?>

        <header class="page-header">
            <?php
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="taxonomy-description">', '</div>' );
            ?>
        </header><!-- .page-header -->

        <?php
        while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content', get_post_format() );
        endwhile;
        the_posts_navigation();

    else :
        get_template_part( 'template-parts/content', 'none' );
    endif; ?>


<?php

get_footer();
