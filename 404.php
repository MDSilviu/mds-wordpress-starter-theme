
<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package mds_starter_theme
 */
get_header(); ?>

    <section class="mds-section-404">
        <h1 class="mds-page-title">
            <?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'mds_starter_theme' ); ?>
        </h1>

        <div class="mds-page-content">
            <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'mds_starter_theme' ); ?></p>

        </div><!-- .mds-page-content -->
    </section>
    <!-- /.mds-section-404 -->

<?php
get_footer();