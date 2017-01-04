<?php
/**
 * The template for displaying Comments.
 *
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return; ?>
<div class="clearfix"></div>
<div id="comments" class="comments-area">
  <?php if ( have_comments() ) : 	?>
  <h1 class="comments-title">
    <?php
			printf( 'One thought on %2$s ', '%1$s COMMENTS ', comments_number( '0', '1', '%' ) , number_format_i18n( get_comments_number() ), get_the_title() ); ?>
  </h1>
  <ul>
    <?php	wp_list_comments( array( 'callback' => 'medics_comment', 'short_ping' => true) ); ?>
  </ul>
  <?php paginate_comments_links();
      endif; // have_comments()
      echo comment_form(); ?> </div>
<!-- #comments .comments-area -->