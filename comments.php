<?php
/**
 * The template for displaying comments
 *
 * @package Fmi
 */

?>
<div id="comments" class="post-comments">
  <?php

  if ( have_comments() ) {
  ?>
    <div class="comments-area">
    <ol class="comment-list">
      <?php
        wp_list_comments( array(
          'callback'      => 'vs_list_comments'
        ) );
      ?>
    </ol>

    <?php the_comments_navigation(); ?>

    <?php
    if ( ! comments_open() ) : ?>
      <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'fmi' ); ?></p>
    <?php
    endif;
  ?>
    </div>
  <?php
  }

  comment_form(
    array(
      'title_reply_before' => '<h5 id="reply-title" class="comment-reply-title">',
      'title_reply_after'  => '</h5>',
    )
  );
  ?>
</div>
