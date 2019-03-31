<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package mds_starter_theme
 */
?>

        </main>
        <!-- /.mds-main -->

        <footer class="mds-footer">
            &copy; <?php echo date('Y'); ?>
            <?php echo carbon_get_theme_option('footer_copyright'); ?>

            <a href="" target="_blank">
                <i class="mds-icon mds-*-icon">
                    <svg class="mds-svg-icon"><use xlink:href="<?php echo mds_get_icons_file_uri().'#icon-*';?>"></use></svg>
                </i>
                <!-- /.mds-icon -->
            </a>
        </footer>
        <!-- /.mds-footer -->

    <?php wp_footer(); ?>

    </body>
</html>
