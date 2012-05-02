<?php
/**
 * The template for displaying posts in the Status Post Format on index and archive pages
 *
 * Learn more: http://codex.wordpress.org/Post_Formats
 *
 * @D5 Creation
 * @Modified on Twenty_Eleven
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<hgroup>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'd5smartia' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<h3 class="entry-format"><?php _e( 'Status', 'd5smartia' ); ?></h3>
			</hgroup>

			<?php if ( comments_open() && ! post_password_required() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Reply', 'd5smartia' ) . '</span>', _x( '1', 'comments number', 'd5smartia' ), _x( '%', 'comments number', 'd5smartia' ) ); ?>
			</div>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<div class="avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), apply_filters( 'd5smartia_status_avatar', '65' ) ); ?></div>

			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'd5smartia' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'd5smartia' ) . '</span>', 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-meta">
			<?php d5smartia_posted_on(); ?>
			<?php if ( comments_open() ) : ?>
			<span class="sep"> | </span>
			<span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'd5smartia' ) . '</span>', __( '<b>1</b> Reply', 'd5smartia' ), __( '<b>%</b> Replies', 'd5smartia' ) ); ?></span>
			<?php endif; ?>
			<?php edit_post_link( __( 'Edit', 'd5smartia' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- #entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->
