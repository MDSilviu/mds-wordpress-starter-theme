<?php
/*

Template Name: Custom Post Type
Description: Template to display listings of all custom-post-type
*/

get_header(); ?>
    <div class="wrapper people">
        <div class="sidebar">
            <div class="title-holder">
                <h1>
                    <span><?php the_title(); ?></span>
                </h1>
            </div>
            <div class="left-block">
                <div class=" scroll-enabled">
                    <div class="inner">
                        <ul class="">
                            <?php
                            $args = array(
                                'post_type' => 'custom-post-type',
                                'posts_per_page' => -1,
                            );
                            $the_query = new WP_Query( $args );
                            if(  $the_query->have_posts() ) :?>
                                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                    <li>
                                        <a href="javascript:;" data-name="<?php the_title(); ?>">
                                            <div class="image-wrap">
                                                <?php if ( has_post_thumbnail() ) {
                                                    echo get_the_post_thumbnail($post->ID);
                                                } 
                                                ?>
                                            </div>
                                        </a>
                                    </li>
                                <?php endwhile;?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php wp_reset_postdata(); ?>
    </div><!-- end .wrapper -->
<?php
get_footer();
