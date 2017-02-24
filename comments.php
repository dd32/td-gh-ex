<?php
/**
 * The template for displaying Comments.
 */

if ( post_password_required() )
    return;
?>
 
<div id="comments" class="comments-area">
 
    <?php if ( have_comments() ) : ?>
      <h4 class="comments-title">
        <?php
            _e( 'Comments', 'avalon' )
        ?>
      </h4>
 
      <ol class="comment-list">
        <?php
          wp_list_comments( array(
            'style'       => 'ol',
            'short_ping'  => true,
            'avatar_size' => 42,
            'callback'    => 'avalon_comment'
          ) );
        ?>
      </ol><!-- .comment-list -->
 
      <?php
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
      ?>
        <nav class="navigation comment-navigation" role="navigation">
          <h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'avalon' ); ?></h1>
          <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'avalon' ) ); ?></div>
          <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'avalon' ) ); ?></div>
        </nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation ?>
 
        <?php if ( ! comments_open() && get_comments_number() ) : ?>
        <p class="no-comments"><?php _e( 'Comments are closed.' , 'avalon' ); ?></p>
        <?php endif; ?>
 
    <?php endif; // have_comments() ?>
 
    <?php comment_form(); ?>
 
</div><!-- #comments -->