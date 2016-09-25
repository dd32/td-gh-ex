<div class="comment-box">

<?php
if( !empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) )
  die ( 'Please do not load this page directly. Thanks!' );
if( post_password_required() ) { ?>
  <p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view comments', 'adelle' ); ?>.</p>
<?php return; } ?>

<!-- You can start editing here. -->
  <?php if( have_comments() ) : ?>

    <section class="comment-pagination">
      <section class="alignleft"><?php previous_comments_link( __( '&ltrif;  Older comments', 'adelle' ) ) ?></section>
      <section class="alignright"><?php next_comments_link( __( 'Newer comments &rtrif;', 'adelle' ) ) ?></section>
    </section>

  <?php if( !empty( $comments_by_type['comment'] ) ) { ?>
    <h4 id="comments"><?php comments_number(__( '0 comment', 'adelle' ), __( '1 Comment', 'adelle' ), __( '% Comments', 'adelle' )); ?> <?php _e( 'on', 'adelle' ); ?> <?php the_title(); ?></h4>
    <ol class="commentlist">
      <?php wp_list_comments( 'type=comment' ); ?>
    </ol>
  <?php } if( !empty( $comments_by_type['pings'] ) ) { ?>
    <h4 id="comments"><?php echo absint( count( $wp_query->comments_by_type['pings'] ) ); ?><?php _e( 'Pingbacks &amp; Trackbacks on', 'adelle' ); ?> <?php the_title(); ?></h4>
    <ol class="commentlist">
      <?php wp_list_comments( 'type=pingback' ); ?>
    </ol>
  <?php } ?>

    <section class="comment-pagination">
      <section class="alignleft"><?php previous_comments_link( __( '&ltrif;  Older comments', 'adelle' ) ) ?></section>
      <section class="alignright"><?php next_comments_link( __( 'Newer comments &rtrif;', 'adelle' ) ) ?></section>
    </section>

  <?php else : // this is displayed if there are no comments so far ?>

    <?php if( 'open' == $post->comment_status ) : ?>

    <?php else : // comments are closed ?>

      <?php if( is_page() ) : else : ?>
        <p class="nocomments"><?php _e( 'Comments are closed', 'adelle' ); ?>.</p>
      <?php endif; ?>

    <?php endif; ?>

  <?php endif; ?>

  <?php if( 'open' == $post->comment_status) : ?>

  <div id="comment-box-respond">

    <?php comment_form(); ?>

  </div>
  <?php endif; // if you delete this the sky will fall on your head ?>
</div>