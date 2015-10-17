<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AcmeBlog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php acmeblog_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<!--post thumbnal options-->
	<div class="post-thumb">
		<?php
		if( has_post_thumbnail() ):
			$thumb_size = 'thumbnail';
			$image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), $thumb_size );
			?>
			<a href="<?php the_permalink(); ?>"><img src="<?php echo $image_url[0]; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" /></a>
			<?php
		endif;
		?>
	</div><!-- .post-thumb-->

	<div class="entry-summary entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php acmeblog_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

