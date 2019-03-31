<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mds_starter_theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mds_starter_theme' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'mds_starter_theme' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->

    <ul class="mds-custom-list mds-post-share">
        <li>
            <a href="javascript:;" class="openshare-list__link--facebook"
               data-open-share="facebook"
               data-open-share-popup="true"
               data-open-share-link="<?php the_permalink();?>"
               data-open-share-caption="<?php echo get_bloginfo('name'); ?>"
               data-open-share-description="<?php echo get_the_excerpt();?>"
               data-open-share-picture="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>">
                <i class="mds-icon mds-facebook-icon">
                    <svg class="mds-svg-icon"><use xlink:href="<?php echo mds_icons_file_uri().'#icon-facebook';?>"></use></svg>
                </i>
            </a>
        </li>

        <li>
            <a href="javascript:;" class="openshare-list__link--twitter" data-open-share="twitter"
               data-open-share-popup="true"
               data-open-share-url="<?php echo file_get_contents("http://tinyurl.com/api-create.php?url=".get_the_permalink());?>"
               data-open-share-text="<?php echo trim(substr(get_the_title(), 0, 110));?>">
                <i class="mds-icon mds-twitter-icon">
                    <svg class="mds-svg-icon"><use xlink:href="<?php echo mds_icons_file_uri().'#icon-twitter';?>"></use></svg>
                </i>
            </a>
        </li>

        <li>
            <a href="javascript:;" class="openshare-list__link--google" data-open-share="google"
               data-open-share-popup="true"
               data-open-share-url="<?php the_permalink();?>">
                <i class="mds-icon mds-google-icon">
                    <svg class="mds-svg-icon"><use xlink:href="<?php echo mds_icons_file_uri().'#icon-google';?>"></use></svg>
                </i>
            </a>
        </li>

        <li>
            <a href="javascript:;" class="openshare-list__link--linkedin" data-open-share="linkedin"
               data-open-share-popup="true"
               data-open-share-url="<?php the_permalink();?>"
               data-open-share-title="<?php echo get_the_title();?>">
                <i class="mds-icon mds-linkedin-icon">
                    <svg class="mds-svg-icon"><use xlink:href="<?php echo mds_icons_file_uri().'#icon-linkedin';?>"></use></svg>
                </i>
            </a>
        </li>

        <li>
            <a href="javascript:;" class="openshare-list__link--pinterest" data-open-share="pinterest"
               data-open-share-popup="true"
               data-open-share-media="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>"
               data-open-share-url="<?php the_permalink();?>"
               data-open-share-description="<?php echo get_the_excerpt();?>">
                <i class="mds-icon mds-pinterest-icon">
                    <svg class="mds-svg-icon"><use xlink:href="<?php echo mds_icons_file_uri().'#icon-pinterest';?>"></use></svg>
                </i>
            </a>
        </li>
    </ul>
    <!-- /.mds-post-share -->
</article><!-- #post-## -->
