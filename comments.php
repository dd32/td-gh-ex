<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package undedicated
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<?php

    function undedicated_comment($comment, $args, $depth) {
    ?>
       
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
                
		<article>
			<header class="comment-meta">

				<?php echo get_avatar( $comment ); ?>
				<strong class="comment-author"><?php comment_author_link(); ?></strong><br />
				<time><a class="comment-permalink" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php echo esc_html(get_comment_date()); ?></a></time>
				<?php edit_comment_link(); ?>
			</header><!-- .comment-meta -->

            <?php if ($comment->comment_approved == '0') : ?>
                <em>
                <?php _e('Your comment is awaiting moderation.', 'undedicated') ?>
                </em><br />
            <?php endif; ?>
            
		<div class="comment-content">
			<?php comment_text(); ?>
			<div class="reply">
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</div>
		</div>
        
<?php } ?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">

			<?php
			$undedicated_comments_number    =   get_comments_number();
			if( 1 === $undedicated_comments_number ) {
				/* translators: %s is post title */
				printf( esc_attr_x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'undedicated' ), esc_attr(get_the_title()) );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					esc_attr(_nx(
						'%1$s Reply to &ldquo;%2$s&rdquo;',
						'%1$s Replies to &ldquo;%2$s&rdquo;',
						$undedicated_comments_number,
						'comments title',
						'undedicated'
					),
					esc_attr(number_format_i18n( $undedicated_comments_number )),
					esc_attr( get_the_title() )
				));
			}
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'undedicated' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'undedicated' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'undedicated' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'callback' => 'undedicated_comment',
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'undedicated' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'undedicated' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'undedicated' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'undedicated' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

</div><!-- #comments -->
