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
  <?php if ( have_comments() ) : ?>
  <h2 class="comments-title">
    <?php
	    printf( // WPCS: XSS OK.
                    /* translators: 1: comment count number, 2: title. */
                    esc_html( _nx( '%1$s Comment', '%1$s Comments', get_comments_number(), 'comments title', 'multishop' ) ),
                    number_format_i18n(get_comments_number() ),
                     get_the_title()
                );
		?>
  </h2>
  <ol class="comment-list">
	<?php
		wp_list_comments( array(
			'style'       => 'ol',
			'short_ping'  => true,
			'avatar_size' => 56,
		) ); ?>
	</ol><!-- .comment-list -->
  <?php paginate_comments_links();
  	endif; // have_comments()
  	comment_form(); ?>
</div>
