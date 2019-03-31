<?php

/**
 * Custom comments walker class
 */
class MDS_Walker_Comment extends Walker_Comment {

    /**
     * Starts the list before the elements are added.
     *
     * @since 2.7.0
     * @access public
     *
     * @see Walker::start_lvl()
     * @global int $comment_depth
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Optional. Depth of the current comment. Default 0.
     * @param array  $args   Optional. Uses 'style' argument for type of HTML list. Default empty array.
     */
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 1;

        switch ( $args['style'] ) {
            case 'div':
                break;
            case 'ol':
                $output .= '<ol class="mds-custom-list mds-comment-replays">' . "\n";
                break;
            case 'ul':
            default:
                $output .= '<ul class="mds-custom-list mds-comment-replays">' . "\n";
                break;
        }
    }

    /**
     * Ends the list of items after the elements are added.
     *
     * @since 2.7.0
     * @access public
     *
     * @see Walker::end_lvl()
     * @global int $comment_depth
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Optional. Depth of the current comment. Default 0.
     * @param array  $args   Optional. Will only append content if style argument value is 'ol' or 'ul'.
     *                       Default empty array.
     */
    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 1;

        switch ( $args['style'] ) {
            case 'div':
                break;
            case 'ol':
                $output .= "</ol><!-- /.mds-comment-replays -->\n";
                break;
            case 'ul':
            default:
                $output .= "</ul><!-- /.mds-comment-replays -->\n";
                break;
        }
    }

    /**
     * Outputs a comment in the HTML5 format.
     *
     * @since 3.6.0
     * @access protected
     *
     * @see wp_list_comments()
     *
     * @param WP_Comment $comment Comment to display.
     * @param int        $depth   Depth of the current comment.
     * @param array      $args    An array of arguments.
     */
    protected function html5_comment( $comment, $depth, $args ) {
        $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
        ?>
        <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
        <div class="mds-comment">
            <?php if (0 != $args['avatar_size']) :?>
                <div class="mds-comment-avatar">
                    <?php echo get_avatar($comment, $args['avatar_size']); ?>
                </div>
                <!-- /.mds-comment-avatar -->
            <?php endif; ?>

            <div class="mds-comment-content-wrapper">
                <div class="mds-comment-author">
                    <?php echo get_comment_author($comment); ?>
                </div>
                <!-- /.mds-comment-author -->

                <div class="mds-comment-content">
                    <?php comment_text(); ?>
                </div>
                <!-- /.mds-comment-content -->

                <div class="mds-comment-meta">
                    <span class="mds-comment-date">
                        <?php printf( __( '%1$s at %2$s' ), get_comment_date( '', $comment ), get_comment_time() ); ?>
                    </span>
                    <!-- /.mds-comment-date -->

                    <?php edit_comment_link( __( 'Edit' ), ' - <span class="mds-edit-link">', ' </span>' ); ?>

                    <?php
                    comment_reply_link( array_merge( $args, array(
                        'add_below' => 'div-comment',
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth'],
                        'before'    => ' - <span class="mds-comment-replay">',
                        'after'     => '</span>'
                    ) ) );
                    ?>

                </div><!-- mds-comment-meta -->
                <?php if ( '0' == $comment->comment_approved ) : ?>
                    <div class="mds-comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></>
                <?php endif; ?>
            </div>
            <!-- /.mds-comment-content-wrapper -->

        </div>
        <!-- /.mds-comment -->
        <?php
    }
}
