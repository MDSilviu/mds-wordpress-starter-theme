<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package mds_starter_theme
 */

if (!is_active_sidebar( 'sidebar-1')) {
	return;
} ?>

<div class="mds-sidebar" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>
<!-- /.mds-sidebar -->
