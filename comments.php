<?php
/**
 * The template for displaying comments
 *
 * @package Fmi
 */

?>

  <?php
  // You can start editing here -- including this comment!
  if ( have_comments() ) : 
  ?>
    <div id="comments" class="comments-area">
    <ol class="comment-list">
      <?php
        wp_list_comments( array(
          'callback'      => 'vs_list_comments'
        ) );
      ?>
    </ol>

    <?php vs_comments_navigation();

    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() ) : ?>
      <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'fmi' ); ?></p>
    <?php
    endif;
  ?>
    </div>
  <?php
  endif; // Check for have_comments().
  ?>

<?php
comment_form();
