<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mds_starter_theme
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}

require get_template_directory() . '/functions/mds-comment-walker.php';
?>

<div class="mds-comments-wrapper">
    <?php
    // You can start editing here -- including this comment!
    if ( have_comments() ) : ?>
        <h3 class="mds-comments-title">
            <?php
            printf( // WPCS: XSS OK.
                esc_html( _nx( '1 Comment', '%1$s Comments', get_comments_number(), 'comments title', 'mds_starter_theme' ) ),
                number_format_i18n( get_comments_number() )
            );
            ?>
        </h3>

        <ul class="mds-custom-list mds-comment-list">
            <?php
            wp_list_comments( array(
                'style'      => 'ul',
                'short_ping' => false,
                'avatar_size'       => 70,
                'walker' => new MDS_Walker_Comment()
            ) );
            ?>
        </ul><!-- .comment-list -->

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
            <nav class="mds-comment-navigation" role="navigation">
                <div class="mds-comment-prev"><?php previous_comments_link( esc_html__( '&#x276e; Older Comments', 'mds_starter_theme' ) ); ?></div>
                <div class="mds-comment-next"><?php next_comments_link( esc_html__( 'Newer Comments &#x276f;', 'mds_starter_theme' ) ); ?></div>
            </nav><!-- #comment-nav-below -->
            <?php
        endif; // Check for comment navigation.

    endif; // Check for have_comments().


    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <div class="mds-no-comments"><?php esc_html_e( 'Comments are closed.', 'mds_starter_theme' ); ?></div>
        <?php
    endif;

    $commenter = wp_get_current_commenter();
    $user = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';
    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html_req = ( $req ? " required='required'" : '' );
    $form_args = array(
        'fields'        =>  array(
            'author' => '<div class="mds-comment-form-row mds-comment-form-row-33 mds-comment-form-author">' .
                '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" maxlength="245" ' . $aria_req . $html_req . ' placeholder="Name"/></div>',
            'email'  => '<div class="mds-comment-form-row mds-comment-form-row-33 mds-comment-form-email">' .
                '<input id="email" name="email" type="email"  value="' . esc_attr(  $commenter['comment_author_email'] ) . '" maxlength="100" aria-describedby="email-notes"' . $aria_req . $html_req  . ' placeholder="Email"/></div>',
            'url'    => '<div class="mds-comment-form-row mds-comment-form-row-33 mds-comment-form-url">' .
                '<input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" maxlength="200" placeholder="Website"/></div>',
        ),
        'comment_field' => '<div class="mds-comment-form-row comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" aria-required="true" required="required" placeholder="Message"></textarea></div>',
        'logged_in_as'         => '<div class="mds-comment-form-row mds-logged-in-as">' . sprintf(
                __( '<a href="%1$s" aria-label="%2$s">Logged in as %3$s</a>. <a href="%4$s">Log out?</a>' ),
                get_edit_user_link(),
                esc_attr( sprintf( __( 'Logged in as %s. Edit your profile.' ), $user_identity ) ),
                $user_identity,
                wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) )
            ) . '</div>',
        'must_log_in'          => '<div class="mds-comment-form-row mds-must-log-in">' . sprintf(
                __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
                wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) )
            ) . '</div>',
        'comment_notes_before' => '',
        'title_reply_before'   => '<h3 class="mds-comment-reply-title">',
        'submit_field'         => '<div class="mds-comment-form-submit form-submit">%1$s %2$s</div>',
        'title_reply'          => __( 'Leave a Comment' ),
        'title_reply_to'       => __( 'Leave a Comment to %s' ),
        'class_form'           => 'mds-comment-form',
        'format'               => 'xhtml',
    );

    comment_form($form_args);
    ?>

</div>
<!-- /.mds-comments-wrapper -->
