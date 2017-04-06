<?php
if ( ! function_exists( 'backyard_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own backyard_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @return void
 */
function backyard_comment( $comment, $args, $depth ) {
    //$GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
        // Display trackbacks differently than normal comments.
    ?>
    <li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
        <p><?php esc_html_e( 'Pingback:', 'backyard' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'backyard' ), '<span class="edit-link">', '</span>' ); ?></p>
    <?php
            break;
        default :
        // Proceed with normal comments.
        global $post;
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <article id="comment-<?php comment_ID(); ?>" class="comment clearfix">

            <?php echo get_avatar( $comment, 60 ); ?>

            <div class="comment-wrapper">

                <header class="comment-meta comment-author vcard">
                    <?php
                        printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
                            get_comment_author_link(),
                            // If current post author is also comment author, make it known visually.
                            ( $comment->user_id === $post->post_author ) ? '<span>' .wp_kses_post( esc_html_e('Post author', 'backyard' )) . '</span>' : ''
                        );
                        printf( wp_kses_post( esc_html( '%1$s at %2$s', 'backyard' )), get_comment_date(), get_comment_time() ); ?><?php edit_comment_link( wp_kses_post( esc_html_e( 'Edit', 'backyard' )), '  ', '' );
                        comment_reply_link( array_merge( $args, array( 'reply_text' => wp_kses_post( esc_html_e( 'Reply', 'backyard' )), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
                        edit_comment_link( wp_kses_post( esc_html_e( 'Edit', 'backyard' )), '<span class="edit-link">', '</span>' );
                    ?>
                </header><!-- .comment-meta -->

                <?php if ( '0' == $comment->comment_approved ) : ?>
                    <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'backyard' ); ?></p>
                <?php endif; ?>

                <div class="comment-content entry-content">
                    <?php comment_text(); ?>
                    <?php  ?>
                </div><!-- .comment-content -->

            </div><!--/comment-wrapper-->

        </article><!-- #comment-## -->
    <?php
        break;
    endswitch; // end comment_type check
}
endif;