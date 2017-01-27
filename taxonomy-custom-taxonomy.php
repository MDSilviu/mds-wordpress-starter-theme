<?php

get_header(); ?>

    <h1 class="mds-page-title">
        <?php echo single_cat_title();?>
    </h1>
    <!-- /.mds-page-title -->

    <?php echo term_description(get_the_ID(), 'custom-taxonomy'); ?>

    <?php if (have_posts()) :?>
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part( 'template-parts/custom', 'taxonomy' ); ?>
        <?php endwhile; ?>

    <?php endif; ?>

<?php
get_footer();
